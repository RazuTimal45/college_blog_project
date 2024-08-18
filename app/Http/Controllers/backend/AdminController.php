<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends BackendBaseController
{
    protected $panel = 'Backend';
    protected $base_route = 'backend.admin.';
    protected $base_view = 'backend.admin.';

    public function index(Request $request){
        $data['admin']=Auth::user()->find(\auth()->user()->id);
        return view($this->__loadToView($this->base_view . 'show'), compact('data'));
    }
    public function edit(Request $request,$id){
        $data['admin']=Auth::user()->find($id);
        return view($this->__loadToView($this->base_view . 'edit'), compact('data'));        
    }
    public function update(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|min:8',
        ]);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        if($user->update($data)){
            Alert::success('success','Profile Updated Successfully');
        }
        return redirect()->route($this->base_route . 'show',compact('data'));
    }
}