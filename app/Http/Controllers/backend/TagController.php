<?php

namespace App\Http\Controllers\backend;


use App\Http\Requests\backend\TagRequest;
use App\Models\backend\Tag;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends BackendBaseController
{
    protected $panel = 'Tags';
    protected $base_route = 'backend.tags.';
    protected $base_view = 'backend.tags.';
    protected $model;
    function __construct(){
        $this->model = new Tag();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = $this->model->orderBy('created_at','asc')->get();
//        dd($data['records']);
        return view($this->__loadToView($this->base_view . 'index'), compact('data'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->__loadToView($this->base_view . 'create'));
    }
    
    public function checkTitle(Request $request)
    {
        $title = $request->title;

        if ($title) {
            $existingTitles = $this->model->where('name', $title)->get();

            if ($existingTitles->isNotEmpty()) {
                return response()->json(['message' => 'exist']);
            }

            return response()->json(['message' => 'nodata']);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {

        try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $record = $this->model->create($request->all());
            if ($record){
                Alert::success('Success',$this->panel.' Added successfully');
            } else  {
                Alert::error('Error',$this->panel.' creation failed');
            }
        }catch (\Exception $exception){
            Alert::error('error','Oops....Error occur:  ' . $exception->getMessage() );
        }
        return redirect()->route($this->base_route . 'index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['record']=$this->model->findOrFail($id);
        if(!$data['record']){
            Alert::error('No Data','Data Not Found');
            return view($this->__loadToView($this->base_view.'index'));
        }else{
            return view($this->__loadToView($this->base_view.'show'),compact('data'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['record']=$this->model->findOrFail($id);
        if(!$data['record']){
            Alert::error('No Data','No Data Found');
            return redirect()->route($this->base_route.'index');
        }
        return view($this->__loadToView($this->base_view . 'edit'),compact('data'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        try {
            $data['records'] = $this->model->findOrFail($id);
            $request->request->add(['updated_by' => auth()->user()->id]);
            $d=$data['records']->update($request->all());
            if($d){
                Alert::success('success',$this->panel.' updated successfully');
            }else{
                Alert::error('error','Oops... error occurred');
            }
        }
        catch (\PDOException $e){
            Alert::error('error','Duplicate entry');
        }
        catch (\Exception $e){
            Alert::error('error',str($e));
        }
        return redirect()->route($this->base_route.'index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=$this->model->findOrFail($id);
        $d=$data->delete();
        if($d){
            Alert::success('success',$this->panel.' deleted success');
        }else{
            Alert::error('error','Oops... something went wrong');
        }
        return redirect()->route($this->base_route.'index');
    }
    public function trash(){
        $data['records']=$this->model->onlyTrashed()->get();
        if(count($data['records'])<1){
            Alert::error('No Data','No Deleted Items Found');
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
