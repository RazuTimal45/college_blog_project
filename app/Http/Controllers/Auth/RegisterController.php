<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\UserRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/mediaman_home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
                        'role' => 'required|in:admin,blogger',
            'bio' => 'nullable|string'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $request->role,
            'bio' => $request->bio
        ]);
    }

    public function registerPage()
    {
        return view('backend.register');
    }

    protected function adminRegister(UserRequest $request)
    {
        $data = $request->validated();

        $user = $this->create($data);

        if ($user) {
            Auth::guard('web')->login($user);
            return response()->json(['message' => 'Registration successful'], 201);
        }

        return response()->json(['message' => 'Registration failed'], 400);
    }
}
