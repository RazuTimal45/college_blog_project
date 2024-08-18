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
$("#tags").select2();
setupImagePreview('image_file', 'image_preview', 'banner_image');

    $(document).ready(function(){
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#description'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload').'?_token='.csrf_token() }}',
                }
            })
            .catch(error => {
                console.error('CKEditor initialization error:', error);
            });

        // Handle title field input for AJAX check
        $('#title').on('keyup', function(){
            let title = $(this).val().trim();
            if (title !== "") {
                $.ajax({
                    url: "{{ route('backend.posts.ajaxtitle') }}",
                    data: {'title': title},
                    success: function(resp){
                        if (resp === "exist") {
                            $("#title_exist").text('Title already exists').css({'color':'red'});
                            $("#btnsubmit").attr('disabled', true);
                        } else {
                            $("#title_exist").text('');
                            $("#btnsubmit").attr('disabled', false);
                        }
                    },
                    error: function(error){
                        console.error('AJAX error:', error);
                    }
                });
            }
        });

        // Setup image preview
        setupImagePreview('image_file', 'image_preview', 'post_image');

        // Form validation
        $('#myForm').validate({
            rules: {
                title: "required",
                image_file: "required",
                description: "required"
            },
            messages: {
                title: "Title is required",
                image_file: "Upload image",
                description: "Description is required"
            }
        });
    });
</script>
@endsection
