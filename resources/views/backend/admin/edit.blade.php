@extends('backend.layouts.section')
@section('title','Update Admin Profile')
@section('main-section')
    <div class="row">
        <div class="col-lg-12">
            @include('sweetalert::alert')
            <div class="form-element py-30 multiple-column">
                <h4 class="font-30 mb-20 text-center">Update Admin Panel</h4>
                <h4 class="font-20 text-right"><a href="{{route('backend.admin.show')}}" class="btn btn-info">View Profile</a></h4>
                <form action="{{route('backend.admin.update')}}" method="post">
                    @csrf
                    @method('put')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                           <label for="name" class="font-14 bold mb-2">Name</label>
                            <input type="text" class="theme-input-style" name="name" value="{{$data['admin']->name}}">
                            @include('backend.includes.field_validation',['input'=>'name'])
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-14 bold mb-2">Email</label>
                            <input type="email" class="theme-input-style" name="email" value="{{$data['admin']->email}}">
                            @include('backend.includes.field_validation',['input'=>'email'])
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-14 bold mb-2">Password</label>
                            <input type="password" class="theme-input-style" name="password">
                            @include('backend.includes.field_validation',['input'=>'password'])
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="save" value="Update" class="btn btn-success"/>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
