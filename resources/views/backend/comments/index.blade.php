@extends('backend.layouts.section')
@section('title','List '.$panel)
@section('main-section')
    @include('sweetalert::alert')
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body">
                <div
                    class="d-sm-flex justify-content-between align-items-center"
                >
                    <h4 class="font-20 text-center">All {{$panel}}</h4>
                    <div class="d-flex flex-wrap">
                       <div class="dropdown-button mt-3 mt-sm-0">
                           <a href="{{route($base_route.'create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;{{$panel}}</a>
                           <a href="{{route($base_route.'trash')}}" class="btn btn-danger ml-2">Deleted {{$panel}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="text-nowrap bg-white dh-table" id="myTable">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @forelse($data['records'] as $data)
                        <tr class="ui-state-default clients_partners" id="{{$data->id}}">
                            <td><i class="fas fa-arrow-up mr-1"></i>{{ucfirst($data->title)}}</td>
                            <td>{{ucfirst($data->category)}}</td>
                            @if($data->image)
                                <td><img src="{{asset('images/clients_partners/'.$data->image)}}" alt="{{$data->title}}" width="100px" height="100px"></td>
                            @else
                                @include('backend.includes.noimage')
                            @endif
                            <td class="">
                                <a href="{{route($base_route.'show',$data->id)}}" class="btn btn-success mr-1 float-lg-left"><i class="fas fa-eye"></i></a>
                                <a href="{{route($base_route.'edit',$data->id)}}" class="btn btn-warning mr-1 float-lg-left"><i class="fas fa-edit"></i></a>
                                <form action="{{route($base_route.'destroy',$data->id)}}"  method="post" class="delete-form float-lg-left">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
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
        @include('backend.includes.sweetalert')
        $( function() {
            if($('#sortable').length)
                $( "#sortable" ).sortable({
                    stop: function( event, ui ) {
                        var str = '';
                        $('.clients_partners').each(function(){
                            if(str == '')
                                str = str+$(this).attr('id');
                            else
                                str = str+','+$(this).attr('id');
                        }).promise().done(function(){
                            $.ajax({
                                url:'{{ route("saveclients_partnersOrder") }}',
                                data: "ids="+str,
                                success:function(){
                                    //ok
                                }
                            })
                        });

                    }
                });
        } );
    </script>
@endsection
@include('backend.includes.datatablecss')
