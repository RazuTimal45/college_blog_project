<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('name', 'Title', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::text('name', null, ['class' => 'theme-input-style', 'placeholder' => 'Enter title*']) !!}
            <span id="title_exist"></span>
            @include('backend.includes.field_validation',['input'=>'name'])
        </div>
    </div>
    <div class="col-lg-6 col-12 my-4">
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::radio('status', 1) !!} Active
            {!! Form::radio('status', 0, true) !!} Inactive
        </div>
    </div>
</div>