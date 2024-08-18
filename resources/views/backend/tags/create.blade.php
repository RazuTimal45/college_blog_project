@extends('backend.layouts.section')
@section('title','Create '.$panel)
@section('main-section')
<div class="row">
    <div class="col-lg-12">
        @include('sweetalert::alert')
        <div class="form-element py-30 multiple-column">
            <div
                class="d-sm-flex justify-content-between align-items-center"
            >
                <h4 class="font-20 text-center">Create {{$panel}}</h4><div><a href="{{route($base_route.'index')}}" class="btn btn-info">All {{$panel}}</a><a
                        href="{{route($base_route.'trash')}}" class="btn btn-danger ml-2">Deleted {{$panel}}</a></div>
            </div>
            {!! Form::open(['route'=>$base_route.'store','method'=>'post','id'=>'myForm']) !!}
            @include($base_view.'includes.__form')
            <div class="form-row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success" id="btnsubmit">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('js')
<script>


        $(document).ready(function (){
            $('#title').on('keyup',function(){
                let title = $(this).val();
                console.log(title)
                if(title.trim() !== ""){
                $.ajax({
                    url:"{{route('backend.tags.ajaxtitle')}}",
                    data:{'title':title},
                    success:function(resp){
                        // console.log(resp)
                        if(resp === "exist"){
                            // console.log('true')
                            $("#title_exist").text('Title already exists').css({'color':'red'});
                            $("#btnsubmit").attr('disabled',true);
                        }else{
                            $("#title_exist").text('');
                            $("#btnsubmit").attr('disabled',false);
                        }
                    },
                    error:function(error){
                        console.log(error)
                    }
                })
            }
            })
        })
    </script>
@endsection