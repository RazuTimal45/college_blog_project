<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\backend\NoticeRequest;
use App\Models\backend\Notice;
use RealRashid\SweetAlert\Facades\Alert;

class NoticeController extends BackendBaseController
{
    protected $panel = 'Notice';
    protected $base_route = 'backend.notices.';
    protected $base_view = 'backend.notices.';
    protected $model;

    public function __construct()
    {
        $this->model = new Notice();
    }

    public function index()
    {
        $data['notices'] = $this->model->all();
        if ($data['notices']->isEmpty()) {
            Alert::error('No Data', 'No Data Found');
            return redirect()->route($this->base_route . 'create');
        }
        return view($this->__loadToView($this->base_view . 'index'), compact('data'));
    }

    public function create()
    {
        return view($this->__loadToView($this->base_view . 'create'));
    }

    public function store(NoticeRequest $request)
    {
        $notice = new Notice();
        $notice->title = $request->input('title');
        $notice->message = $request->input('message'); // Simplified input fetching
        $notice->status = $request->input('status');

        if ($notice->save()) {
            Alert::success('Success', 'Notice created successfully.');
            return redirect()->route($this->base_route . 'index');
        } else {
            Alert::error('Error', 'Failed to create notice. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function show(string $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']) {
            Alert::error('No Data', 'Data Not Found');
            return redirect()->route($this->base_route . 'index');
        }
        return view($this->__loadToView($this->base_view . 'show'), compact('data'));
    }

    public function edit(string $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']) {
            Alert::error('No Data', 'No Data Found');
            return redirect()->route($this->base_route . 'index');
        }
        return view($this->__loadToView($this->base_view . 'edit'), compact('data'));
    }

    public function update(NoticeRequest $request, string $id)
    {
        $notice = $this->model->find($id);
        if (!$notice) {
            Alert::error('Error', 'Notice Not Found');
            return redirect()->route($this->base_route . 'index');
        }

        // Update notice fields
        $notice->title = $request->input('title');
        $notice->message = $request->input('message');
        $notice->status = $request->input('status');

        if ($notice->save()) {
            Alert::success('Success', 'Notice updated successfully.');
            return redirect()->route($this->base_route . 'index');
        } else {
            Alert::error('Error', 'Failed to update notice. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        $notice = $this->model->find($id);
        if (!$notice) {
            Alert::error('Error', 'Notice Not Found');
            return redirect()->route($this->base_route . 'index');
        }

        if ($notice->delete()) {
            Alert::success('Success', $this->panel . ' deleted successfully.');
        } else {
            Alert::error('Error', 'Oops... something went wrong');
        }
        return redirect()->route($this->base_route . 'index');
    }

    public function trash()
    {
        $data['records'] = $this->model->onlyTrashed()->get();
        if ($data['records']->isEmpty()) {
            Alert::error('No Data', 'No Trash Data Found');
            return redirect()->route($this->base_route . 'index');
        }
        return view($this->__loadToView($this->base_view . 'trash'), compact('data'));
    }

    public function permanentDelete($id)
    {
        $notice = $this->model->onlyTrashed()->find($id);
        if (!$notice) {
            Alert::error('Error', 'Oops... record not found');
            return redirect()->route($this->base_route . 'index');
        }

        if ($notice->forceDelete()) {
            Alert::success('Success', $this->panel . ' Deleted Permanently');
        } else {
            Alert::error('Error', 'Oops... error occurred while deleting record');
        }
        return redirect()->route($this->base_route . 'index');
    }

    public function restore($id)
    {
        $notice = $this->model->onlyTrashed()->find($id);
        if (!$notice) {
            Alert::error('Error', 'Oops... record not found');
            return redirect()->route($this->base_route . 'index');
        }

        if ($notice->restore()) {
            Alert::success('Success', $this->panel . ' Recovered Successfully');
        } else {
            Alert::error('Error', 'Oops... error occurred while recovering record');
        }
        return redirect()->route($this->base_route . 'index');
    }
}
