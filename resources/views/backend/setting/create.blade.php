@extends('backend.layouts.section')
@section('title','Create ' . $panel)
@section('main-section')
    <!-- Content Header (Page header) -->
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="form-element py-30 multiple-column">
                <div
                    class="d-sm-flex justify-content-between align-items-center"
                >
                    <h4 class="font-20 text-center">Create {{$panel}}</h4><a href="{{route($base_route.'index')}}" class="btn btn-info">All {{$panel}}</a>
                </div>
                {!! Form::open(['route'=>$base_route.'store','method'=>'post','files'=>true,'id'=>'myForm']) !!}
                @include($base_view.'includes.__form')
                <div class="form-row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
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
        setupImagePreview('logo_footer_file', 'logo_footer_preview', 'logo_footer_image');
    });
</script>
@endsection
