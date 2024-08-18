<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('name', 'Title', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::text('name', null, ['class' => 'theme-input-style', 'placeholder' => 'Enter category title*']) !!}
            <span id="name_exist"></span>
            @include('backend.includes.field_validation',['input'=>'name'])
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::textarea('description', null, ['class' => 'theme-input-style']) !!}
            @include('backend.includes.field_validation',['input'=>'description'])
        </div>
    </div>
    <div class="col-lg-6 col-12">
    <div class="form-group">
    {!!  Form::label('image_file', 'Upload Category Image') !!}
    {!! Form::file('image_file', ['class'=>'form-control']) !!}
    @include('backend.includes.field_validation',['input'=>'image_file'])
    </div>
    @if(isset($data['record']) && $data['record']->image)
            <div class="image">
                <img id="category_image" style="max-width: 200px; max-height: 200px;" src="{{ asset('images/category/' . $data['record']->image) }}" alt="{{ $data['record']->title }} Image">
            </div>
        @endif
        <div class="form-group">
            <img id="image_preview" src="#" alt="Fav Icon Preview" style="display:none; max-width: 200px; max-height: 200px;">
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::radio('status', 1) !!} Active
            {!! Form::radio('status', 0, true) !!} Inactive
        </div>
    </div>
</div>
