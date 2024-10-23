@extends('backend.layouts.section')
@section('title','Create ' . $panel)
@section('main-section')
    <!-- Content Header (Page header) -->
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card p-5">
            <div class="form-element py-30 multiple-column">
                <div
                    class="d-sm-flex justify-content-between align-items-center"
                >
                    <h4 class="font-20 text-center">Create {{$panel}}</h4><div><a href="{{route($base_route.'index')}}" class="btn btn-info">All {{$panel}}</a><a
                            href="{{route($base_route.'trash')}}" class="btn btn-danger ml-2">Deleted {{$panel}}</a></div>
                </div>
                {!! Form::open(['route'=>$base_route.'store','method'=>'post','files'=>true,'id'=>'myForm']) !!}
                @include($base_view.'includes.__form')
                <div class="form-row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Publish</button>
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
    $(function(){
       $("#tags").select2({
                tags: true,
                allowClear: true
            });

            $("#categories").select2({
                placeholder: 'Select categories',
                allowClear: true
            });
        });
</script>

@endsection
@section("css")
<style>

.error{
    color:red;
}
</style>
@endsection