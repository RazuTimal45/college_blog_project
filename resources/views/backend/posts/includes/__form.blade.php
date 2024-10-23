<div class="row">
    <!-- Title Field -->
    <div class="col-12 col-lg-6">
        <div class="form-group">
            {!! Form::label('title', 'Enter Title', ['for' => 'title']) !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title', 'id' => 'title']) !!}
            <span id="title_exist"></span>
            @include('backend.includes.field_validation', ['input' => 'title'])
        </div>
    </div>

    <!-- Sub Title Field -->
    <div class="col-12 col-lg-6">
        <div class="form-group">
            {!! Form::label('sub_title', 'Enter Sub Title', ['for' => 'sub_title']) !!}
            {!! Form::text('sub_title', null, ['class' => 'form-control', 'placeholder' => 'Enter sub title', 'id' => 'sub_title']) !!}
            @include('backend.includes.field_validation', ['input' => 'sub_title'])
        </div>
    </div>

    <!-- Categories Field -->
     @if(isset($data['record']))
      <div class="col-12 col-lg-6 mb-30">
        <div class="form-group">
            {!! Form::label('categories', 'Select Categories', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::select('categories[]', $data['categories'], old('categories', $data['record']->categories->pluck('id')->toArray() ?? []), [
                'class' => 'form-control select2',
                'id' => 'categories',
                'multiple' => 'multiple',
                'placeholder' => 'Select categories'
            ]) !!}
            @include('backend.includes.field_validation', ['input' => 'categories'])
        </div>
    </div>
    @endif
    <!-- Tags Field -->
    @if(isset($data['record']))
    <div class="col-12 col-lg-6 mb-30">
        <div class="form-group">
            {!! Form::label('tags', 'Select Tags', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::select('tag_id[]', $data['tags'], old('tag_id', $data['assigned_tags'] ?? []), [
                'class' => 'form-control select2',
                'id' => 'tags',
                'multiple' => 'multiple'
            ]) !!}
            <br>
            @if($data['tags']->isEmpty())
                <p class="text-danger">No tags available</p>
            @endif
            @include('backend.includes.field_validation', ['input' => 'tags'])
        </div>
    </div>
    @endif

    <!-- Image Upload Field -->
    <div class="col-12 col-lg-6 mb-30">
        <div class="form-group">
            {!! Form::label('image_file', 'Upload Image', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::file('image_file', ['class' => 'form-control', 'id' => 'image_file']) !!}
            @include('backend.includes.field_validation', ['input' => 'image_file'])
        </div>
        @if(isset($data['record']) && $data['record']->image)
            <div class="image">
                <img id="post_image" style="max-width: 200px; max-height: 200px;" src="{{ asset('images/posts/' . $data['record']->image) }}" alt="Banner Image">
            </div>
        @endif
        <div class="form-group">
            <img id="image_preview" src="#" alt="Image Preview" style="display:none; max-width: 200px; max-height: 200px;">
        </div>
    </div>

    <!-- Description Field -->
    <div class="col-lg-6 col-12">
        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::textarea('description', null, ['class' => 'theme-input-style textarea', 'id' => 'description']) !!}
            @include('backend.includes.field_validation', ['input' => 'description'])
        </div>
    </div>

    <!-- Status Field -->
    <div class="col-lg-6 col-12">
        <div class="form-group">
            {!! Form::label('status', 'Status', ['class' => 'font-14 bold mb-2']) !!}
            <br />
            {!! Form::radio('status', 1, null, ['id' => 'status_active']) !!} {!! Form::label('status_active', 'Active') !!}
            {!! Form::radio('status', 0, true, ['id' => 'status_inactive']) !!} {!! Form::label('status_inactive', 'Inactive') !!}
        </div>
    </div>
</div>

<script>
    // JavaScript for image preview
    document.getElementById('image_file').addEventListener('change', function(event) {
        var output = document.getElementById('image_preview');
        output.style.display = 'block';
        output.src = URL.createObjectURL(event.target.files[0]);
    });
</script>
