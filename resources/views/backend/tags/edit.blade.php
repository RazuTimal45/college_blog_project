@extends('backend.layouts.section')
@section('title','Update '.$panel)
@section('main-section')
    <div class="row">
        <div class="col-lg-12">
            @include('sweetalert::alert')
            <div class="form-element py-30 multiple-column">
                <h4 class="font-30 mb-20 text-center">Update {{$panel}}</h4>
                <h4 class="font-20 text-right"><a href="{{route($base_route.'index')}}" class="btn btn-info">List {{$panel}}</a></h4>
                {!! Form::model($data['record'],['route'=>[$base_route.'update',$data['record']->id],'method'=>'put','files'=>true]) !!}
                @include($base_route.'.includes.__form')
                <div class="form-group">
                    <input type="submit" name="save" value="Update {{$panel}} " class="btn btn-success"/>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@include('backend.includes.imagepreviewer')
@section('js')
    <script>
        $(document).ready(function(){
            ClassicEditor
                .create( document.querySelector( '#description' ),{
                    ckfinder: {
                        uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                    },
                    allowedContent: true,
                    elements: true,
                    attributes: true,
                    classes: true,
                } )
                .catch( error => {
                    console.error( error );
                } );
        });
        $( function() {
        $("#published_date").datepicker({
            changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-m-d'
        });
        });
        setupImagePreview('image_file', 'image_preview', 'thumbnail_image');
        setupImagePreview('logo_file', 'logo_preview', 'logo_image');
    </script>
@endsection
