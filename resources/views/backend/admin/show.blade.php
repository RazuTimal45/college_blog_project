@extends('backend.layouts.section')
@section('title','Admin Profile')
@section('main-section')
    @include('sweetalert::alert')
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body">
                <div
                    class="d-sm-flex justify-content-between align-items-center"
                >
                    <h4 class="font-20 text-center">Admin Profile</h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="text-nowrap bg-white dh-table" id="myTable">
                    <tr>
                        <th>Name</th>
                        <td>{{ucfirst($data['admin']->name)}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data['admin']->email}}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('backend.admin.edit',$data['admin']->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection