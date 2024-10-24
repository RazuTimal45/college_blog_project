@extends('backend.layouts.section')
@section('title','Show '.$panel)
@section('main-section')
    @include('sweetalert::alert')
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body">
                <div
                    class="d-sm-flex justify-content-between align-items-center"
                >
                    <h4 class="font-20 text-center">Show {{$panel}}</h4><a href="{{route($base_route.'index')}}" class="btn btn-info">All {{$panel}}</a>
                </div>
            </div>
            <div class="table table-responsive">
                <table class="bg-white dh-table">
                    <tr>
                        <th>Display Order</th>
                        <td>{{$data['record']->display_order}}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ucfirst($data['record']->title)}}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ucfirst($data['record']->category)}}</td>
                    </tr>
                    <tr>
                        <th>Thumbnail Image</th>
                        @if($data['record']->image)
                            <td><img src="{{asset('images/clients_partners/'.$data['record']->image)}}" alt="{{$data['record']->title}}" width="150px" height="100px"></td>
                        @else
                            @include('backend.includes.noimage')
                        @endif
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $data['record']->description !!}</td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td class="d-flex">
                            <a href="{{route($base_route.'edit',$data['record']->id)}}" class="btn btn-warning mr-1"><i class="fas fa-edit"></i></a>
                            <form action="{{route($base_route.'destroy',$data['record']->id)}}"  method="post" class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @include('backend.includes.sweetalert')
    </script>
@endsection
