@extends('backend.layouts.section')
@section('title','Update ' . $panel)
@section('main-section')
    <!-- Content Header (Page header) -->
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@include('backend.includes.imagepreviewer')
@section('js')
    <script>
        $(document).ready(function(){
            function ckeditorfunc(elementId) {
                ClassicEditor
                    .create(document.querySelector(elementId), {
                        ckfinder: {
                            uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                        },
                        allowedContent: true,
                        elements: true,
                        attributes: true,
                        classes: true,
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
            ckeditorfunc('#meta_description');
            setupImagePreview('fav_icon_file', 'fav_icon_preview', 'fav_icon_image');
            setupImagePreview('logo_header_file', 'logo_header_preview', 'logo_header_image');
        });
    </script>
@endsection

