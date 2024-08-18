@extends('backend.layouts.section')
@section('title','Show ' . $panel)
@section('main-section')
    <!-- Content Header (Page header) -->
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <div
                        class="d-sm-flex justify-content-between align-items-center"
                    >
                        <h4 class="font-20 text-center">Show {{$panel}}</h4><a href="{{route($base_route.'index')}}" class="btn btn-info">All {{$panel}}</a>
                    </div>
                </div>                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ucfirst($data['record']->name)}}</td>
                    </tr>
                    <tr>
                    <th>Email</th>
                    <td>{{ $data['record']->email}}</td>
                    </tr>
                    <tr>
                    <th>Phone</th>
                    <td>{{ $data['record']->phone}}</td>
                    </tr>
                    <tr>
                    <th>Address</th>
                    <td>{{ $data['record']->Address}}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{!! $data['record']->message !!}</td>
                    </tr>
                    <tr>
                        <th>
                            <form action="{{route($base_route.'destroy',$data['record']->id)}}" method="post"
                                  class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                </table>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script>
        @include('backend.includes.sweetalert')
    </script>
@endsection