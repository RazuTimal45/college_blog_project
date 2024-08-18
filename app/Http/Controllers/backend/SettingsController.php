<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\SettingRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\backend\Setting;
use App\Models\User;

class  SettingsController extends BackendBaseController
{
    protected $panel = 'Setting';
    protected $base_route = 'backend.setting.';
    protected $base_view = 'backend.setting.';
    protected $model;

    function __construct(){
        $this->model = new Setting();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return redirect()->route($this->base_route.'create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id=$this->model->query()->select('id')->limit(1)->pluck('id')->first();
        if($id!==null){
            return redirect()->route($this->base_route.'show',$id);
        }else{
            return view($this->__loadToView($this->base_view . 'create'),compact('id'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        try{
            $request->request->add(['created_by'=>auth()->user()->id]);
            if ($request->hasFile('logo_header_file')) {
                $logoHeader = $request->file('logo_header_file');
                $logoHeaderFilename = uniqid() . '.' . $logoHeader->getClientOriginalExtension();
                $logoHeader->move('images/settings/', $logoHeaderFilename);
                $request->request->add(['logo_header' => $logoHeaderFilename]);
            }
            if ($request->hasFile('logo_footer_file')) {
                $logoFooter = $request->file('logo_footer_file');
                $logoFooterFilename = uniqid() . '.' . $logoFooter->getClientOriginalExtension();
                $logoFooter->move('images/settings/', $logoFooterFilename);
                $request->request->add(['logo_footer' => $logoFooterFilename]);
            }
            if ($request->hasFile('fav_icon_file')) {
                $favIcon = $request->file('fav_icon_file');
                $favIconFilename = uniqid() . '.' . $favIcon->getClientOriginalExtension();
                $favIcon->move('images/settings/', $favIconFilename);
                $request->request->add(['fav_icon' => $favIconFilename]);
            }
            $record = $this->model->create($request->all());
            if ($record){
                Alert::success('success',$this->panel.' created successfully');
            } else  {
                Alert::error('error',$this->panel.' creation failed');
            }
        }catch (\Exception $exception){
            Alert::error('error','Oops....Error occur:  ' . $exception->getMessage() );
        }
        return redirect()->route($this->base_route . 'create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['record']=$this->model->find($id);
        if($data['record']==null){
            return redirect()->route($this->base_route.'create');
        }
        return view($this->__loadToView($this->base_view.'show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['record']=$this->model->find($id);
        return view($this->__loadToView($this->base_view . 'edit'),compact('data'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, string $id)
    {
        $data['records']=$this->model->find($id);
        if ($request->hasFile('logo_header_file')) {
            $logoHeader = $request->file('logo_header_file');
            $logoHeaderFilename = uniqid() . '.' . $logoHeader->getClientOriginalExtension();
            $logoHeader->move('images/settings/', $logoHeaderFilename);
            // Delete the old logo header file if it exists
            if ($data['records']->logo_header && file_exists(public_path('images/settings/' . $data['records']->logo_header))) {
                unlink(public_path('images/settings/' . $data['records']->logo_header));
            }
            $request->request->add(['logo_header' => $logoHeaderFilename]);
        }
        if ($request->hasFile('logo_footer_file')) {
            $logoFooter = $request->file('logo_footer_file');
            $logoFooterFilename = uniqid() . '.' . $logoFooter->getClientOriginalExtension();
            $logoFooter->move('images/settings/', $logoFooterFilename);
            // Delete the old logo header file if it exists
            if ($data['records']->logo_footer && file_exists(public_path('images/settings/' . $data['records']->logo_footer))) {
                unlink(public_path('images/settings/' . $data['records']->logo_footer));
            }
            $request->request->add(['logo_footer' => $logoFooterFilename]);
        }
        if ($request->hasFile('fav_icon_file')) {
            $favIcon = $request->file('fav_icon_file');
            $favIconFilename = uniqid() . '.' . $favIcon->getClientOriginalExtension();
            $favIcon->move('images/settings/', $favIconFilename);

            // Delete the old fav_icon file if it exists
            if ($data['records']->fav_icon && file_exists(public_path('images/settings/' . $data['records']->fav_icon))) {
                unlink(public_path('images/settings/' . $data['records']->fav_icon));
            }
            $request->request->add(['fav_icon' => $favIconFilename]);
        }
        $request->request->add(['updated_by'=>auth()->user()->id]);
        $d=$data['records']->update($request->all());
        if($d){
            Alert::success('success',$this->panel.' updated successfully');
        }else{
            Alert::error('error',$this->panel.' update process failed');
        }
        return redirect()->route($this->base_route.'show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['records']=$this->model->find($id);
        if ($data['records']->fav_icon && file_exists(public_path('images/settings/' . $data['records']->fav_icon))) {
            unlink(public_path('images/settings/' . $data['records']->fav_icon));
        }
        if ($data['records']->logo_header && file_exists(public_path('images/settings/' . $data['records']->logo_header))) {
            unlink(public_path('images/settings/' . $data['records']->logo_header));
        }
        $d=$data['records']->delete();
        if($d){
            Alert::success('success',$this->panel.' deleted successfully');
        }else{
            Alert::error('error','Oops... something went wrong');
        }
        return redirect()->route($this->base_route.'create');
    }
}

