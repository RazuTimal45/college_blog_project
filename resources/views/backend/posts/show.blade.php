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
            <div class="table table-borderless">
                <table class="bg-white dh-table">
                    <tr>
                        <th>Title</th>
                        <td>{{ucfirst($data['record']->title)}}</td>
                    </tr>
                  
                    <tr>
                        <th>Display Order</th>
                        <td>{{$data['record']->rank}}</td>
                    </tr>
                    <tr>
                    <th>Tags</th>
                     <td class="">
                        @if (!empty($data['tags']))
                            @foreach ($data['tags'] as $tag => $count)
                                <p class="fs-4">{{ $tag }} - {{ $count }}</p>
                            @endforeach
                        @else
                            <p>No tags found.</p>
                        @endif
                    </td>
                    </tr>
                 <tr>
    
   <tr>
    <th>Categories</th>
    <td>
       
        @if ($data['record']->categories->isNotEmpty())
            @foreach ($data['record']->categories as $category)
                {{ $category->name }}@if (!$loop->last), @endif
            @endforeach
        @else
            No categories available
        @endif
    </td>
</tr>

</tr>

                    <tr>
                        <th>Image</th>
                        @if($data['record']->image)
                            <td><img src="{{asset('images/posts/'.$data['record']->image)}}" alt="{{$data['record']->name}}" width="150px" height="100px"></td>
                        @else
                            @include('backend.includes.noimage')
                        @endif
                    </tr>
                    <tr>
                    <th>Description</th>
                    <td>{!! $data['record']->description !!}</td>
                    </tr>
                      <tr>
                        <th>Status</th>
                        <td>@include('backend.includes.display_status',['status'=>$data['record']->status])</td>
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
