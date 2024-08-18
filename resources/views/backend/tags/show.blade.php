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
                        <th>Title</th>
                        <td>{{ucfirst($data['record']->title)}}</td>
                    </tr>
                    <tr>
                        <th>Slogan</th>
                        <td>{{$data['record']->slogan}}</td>
                    </tr>
                    <tr>
                        <th>Thumbnail Image</th>
                        @if($data['record']->thumbnail_image)
                            <td><img src="{{asset('images/new_press/'.$data['record']->thumbnail_image)}}" alt="{{$data['record']->title}}" width="150px" height="100px"></td>
                        @else
                            @include('backend.includes.noimage')
                        @endif
                    </tr>
                    <tr>
                        <th>Published Date</th>
                        <td>{{ \Carbon\Carbon::parse($data['record']->date)->format('F j, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $data['record']->description !!}</td>
                    </tr>
                    @if($data['record']->meta_keyword)
                        <tr>
                            <th>Meta Keyword</th>
                            <td>{{$data['record']->meta_keyword}}</td>
                        </tr>
                    @endif
                    @if($data['record']->meta_description)
                        <tr>
                            <th>Meta Description</th>
                            <td>{{$data['record']->meta_description}}</td>
                        </tr>
                    @endif
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
