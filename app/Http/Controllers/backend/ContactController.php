<?php

namespace App\Http\Controllers\backend;


use App\Models\backend\Contact;
use RealRashid\SweetAlert\Facades\Alert ;

class ContactController extends BackendBaseController
{
    protected $panel = 'Contact';
    protected $base_route = 'backend.contacts.';
    protected $base_view = 'backend.contacts.';
    protected $model;
    function __construct(){
        $this->model = new Contact();
    }

    public function index(){
        $data['records'] = $this->model->orderBy('created_at','desc')->get();
        return view($this->__loadToView($this->base_view.'index'),compact('data'));
    }
    public function show(string $id){
        $data['record']=$this->model->find($id);
        if(!$data['record']){
            Alert::error('No Data','Data Not Found');
            return view($this->__loadToView($this->base_view.'index'));
        }else{
            return view($this->__loadToView($this->base_view.'show'),compact('data'));
        }
    }
    public function destroy(string $id){
        $data=$this->model->find($id);
        $d = $data->delete();
        if($d){
            Alert::error('success',$this->panel.'deleted success');
        }else{
            Alert::error('error','Opps something went wrong');
        }
    }

    public function trash(){
    $data['records']=$this->model->onlyTrashed()->get();
    if(count($data['records'])<1){
        Alert::error('No Data','No Trash Data Found');
        return redirect()->route($this->base_route.'index');
    }
    return view($this->__loadToView($this->base_view.'trash'),compact('data'));
}

public function permanentDelete($id){
    $data['record']=$this->model->where('id',$id)->onlyTrashed()->first();
    if(!$data['record']){
        Alert::error('error','Oops ... record not found');
        return redirect()->route($this->base_route . 'index');
    }
    if($data['record']->forceDelete()){
        Alert::success('success', $this->panel. ' Deleted Permanently');
    } else {
        Alert::error('error','Oops ... error occurred while deleting record');
    }
    return redirect()->route($this->base_route.'index');
}
public function restore($id){
    $data['record']=$this->model->where('id',$id)->onlyTrashed()->first();
    if (!$data['record']){
        Alert::error('error','Oops ... record not found');
        return redirect()->route($this->base_route . 'index');
    }
    if($data['record']->restore()){
        Alert::success('success', $this->panel . ' Recovered Successfully');
    } else {
        Alert::error('error','Oops ... error occurred while recovering record');
    }
    return redirect()->route($this->base_route . 'index');
}
}
