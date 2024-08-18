@extends('backend.layouts.section')
@section('title','List ' . $panel)
@section('main-section')
    <!-- Content Header (Page header) -->
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content w-100">
        <!-- Default box -->
        <div class="card w-100">
            <div class="card-body">
                <h2 class="text-center my-2">List {{$panel}}</h2>
                <table class="table table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data['records'] as $data)
                        <tr>
                            <td><b>{{$loop->iteration}}.</b></td>
                            <td>{{$data->name}}</td>
                             @if($data->image)
                                <td><img src="{{asset('images/categories/'.$data->image)}}" alt="{{$data->name}}" width="100px" height="100px"></td>
                            @else
                                @include('backend.includes.noimage')
                            @endif
                            <td>{!! $data->description !!}</td>
                            <td>@include('backend.includes.display_status',['status'=>$data->status])</td>
                            <td class="d-flex">
                                <a href="{{route($base_route.'show',$data->id)}}" class="btn btn-secondary mr-1"><i class="fas fa-eye"></i></a>
                                <form action="{{route($base_route.'destroy',$data->id)}}" method="post" class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-danger">No Data Found</tr>
                    @endforelse
                    </tbody>
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
        $('#myTable').DataTable();
        @include('backend.includes.sweetalert')
    </script>
@endsection
@section('css')
    <style>
        .dataTables_filter {
            float: right;
            text-align: right;
        }

        /* Adjust the margin for better spacing */
        .dataTables_filter label {
            margin-right: 10px; /* Adjust the value as needed */
        }

        /* If you want to align the search input and button horizontally */
        .dataTables_filter input[type="search"] {
            display: inline-block;
            width: auto; /* Adjust the width as needed */
        }
    </style>
@endsection
