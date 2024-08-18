@extends('backend.layouts.section')
@section('title','All Trash '.$panel)
@section('main-section')
    @include('sweetalert::alert')
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body">
                <div
                    class="d-sm-flex justify-content-between align-items-center"
                >
                    <h4 class="font-20 text-center">All Trash {{$panel}}</h4>
                    <div class="d-flex flex-wrap">
                        <div class="dropdown-button mt-3 mt-sm-0">
                            <a href="{{route($base_route.'create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;{{$panel}}</a>
                            <a href="{{route($base_route.'index')}}" class="btn btn-info ml-2">All {{$panel}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="text-nowrap bg-white dh-table" id="myTable">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data['records'] as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucfirst($data->title)}}</td>
                            <td>{{ucfirst($data->category)}}</td>
                            @if($data->image)
                                <td><img src="{{asset('images/clients_partners/'.$data->image)}}" alt="{{$data->title}}" width="100px" height="100px"></td>
                            @else
                                @include('backend.includes.noimage')
                            @endif
                            <td class="d-flex">
                                <a href="{{route($base_route.'restore',$data->id)}}" class="btn btn-secondary mr-1"><i class="fas fa-share-square"></i></a>
                                <form action="{{route($base_route.'permanentDelete',$data->id)}}"  method="post" class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="text-danger">No {{$panel}} Found</div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // $('#myTable').DataTable()
        @include('backend.includes.sweetalert_trash')
    </script>
@endsection
@include('backend.includes.datatablecss')
