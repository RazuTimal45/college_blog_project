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
                           <a href="{{route($base_route.'trash')}}" class="btn btn-danger ml-2">Deleted {{$panel}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="text-nowrap bg-white dh-table" id="myTable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @forelse($data['records'] as $data)
                        <tr class="ui-state-default clients_partners" id="{{$data->id}}">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
        {{-- $( function() {
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
        } ); --}}
    </script>
@endsection
@include('backend.includes.datatablecss')
