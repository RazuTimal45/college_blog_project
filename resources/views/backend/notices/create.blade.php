@extends('backend.layouts.section')
@section('title','Create ' . $panel)
@section('main-section')
    <!-- Content Header (Page header) -->
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card p-5">
            <div class="form-element py-30 multiple-column">
                <div
                    class="d-sm-flex justify-content-between align-items-center"
                >
                    <h4 class="font-20 text-center">Create {{$panel}}</h4><div><a href="{{route($base_route.'index')}}" class="btn btn-info">All {{$panel}}</a><a
                            href="{{route($base_route.'trash')}}" class="btn btn-danger ml-2">Deleted {{$panel}}</a></div>
                </div>
                {!! Form::open(['route'=>$base_route.'store','method'=>'post','files'=>true,'id'=>'myForm']) !!}
                @include($base_view.'includes.__form')
                <div class="form-row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Publish</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('js')
@endsection
@section("css")
<style>
.error{
    color:red;
}
</style>
@endsection