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
                <h2 class="text-center my-2">Show {{$panel}}</h2>
                <table class="table table-borderless">
                    <tr>
                        <th>Site Name</th>
                        <td>{{ucfirst($data['record']->site_name)}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ucfirst($data['record']->address)}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data['record']->email}}</td>
                    </tr>
                    @if($data['record']->slogan)
                        <tr>
                            <th>Slogan</th>
                            <td>{{$data['record']->slogan}}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Phone</th>
                        <td>{{$data['record']->phone}}</td>
                    </tr>
                    @if($data['record']->mobile)
                        <tr>
                            <th>Mobile</th>
                            <td>{{$data['record']->mobile}}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Logo Header</th>
                        <td><img src="{{asset('images/settings/'.$data['record']->logo_header)}}" width="100px" height="100px" alt=""></td>
                    </tr>
                    <tr>
                        <th>Fav Icon</th>
                        <td><img src="{{asset('images/settings/'.$data['record']->fav_icon)}}" width="100px" height="100px" alt=""></td>
                    </tr>
                    @if($data['record']->facebook)
                    <tr>
                        <th>Facebook Link</th>
                        <td>{{$data['record']->facebook}}</td>
                    </tr>
                    @endif
                    @if($data['record']->instagram)
                    <tr>
                        <th>Instagram Link</th>
                        <td>{{$data['record']->instagram}}</td>
                    </tr>
                    @endif
                    @if($data['record']->youtube)
                    <tr>
                        <th>Youtube Link</th>
                        <td>{{$data['record']->youtube}}</td>
                    </tr>
                    @endif
                    @if($data['record']->twitter)
                    <tr>
                        <th>Twitter Link</th>
                        <td>{{$data['record']->twitter}}</td>
                    </tr>
                    @endif
                    @if($data['record']->whatsapp)
                        <tr>
                            <th>Whatsapp Link</th>
                            <td>{{$data['record']->whatsapp}}</td>
                        </tr>
                    @endif
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
                        <th>Created At</th>
                        <td>{{$data['record']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['record']->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{$data['record']->createdBy->name}}</td>
                    </tr>
                    <tr>
                        <th>Updated By</th>
                        @if($data['record']->updated_by !=null)
                            <td>{{$data['record']->updatedBy->name}}</td>
                        @else
                            <td class="text-info">Not Updated Yet</td>
                        @endif
                    </tr>
                    @if($data['record']->meta_title)
                        <tr>
                            <th>Meta Title</th>
                            <td>{{$data['record']->meta_title}}</td>
                        </tr>
                    @endif
                    @if($data['record']->meta_keyword)
                        <tr>
                            <th>Meta Keyword</th>
                            <td>{{$data['record']->meta_keyword}}</td>
                        </tr>
                    @endif
                    @if($data['record']->meta_description)
                        <tr>
                            <th>Meta Description</th>
                            <td>{!! $data['record']->meta_description !!}</td>
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
