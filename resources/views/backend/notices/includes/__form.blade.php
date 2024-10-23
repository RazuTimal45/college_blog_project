<div class="row">
    <!-- Description Field -->
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('title', 'Title', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
            @include('backend.includes.field_validation', ['input' => 'title'])
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('message', 'Message', ['class' => 'font-14 bold mb-2']) !!}
            {!! Form::textarea('message', null, ['class' => 'theme-input-style', 'id' => 'message']) !!}
            @include('backend.includes.field_validation', ['input' => 'message'])
        </div>
    </div>

    <!-- Status Field -->
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('status', 'Status', ['class' => 'font-14 bold mb-2']) !!}
            <br />
            {!! Form::radio('status', 1, null, ['id' => 'status_active']) !!} {!! Form::label('status_active', 'Active') !!}
            {!! Form::radio('status', 0, true, ['id' => 'status_inactive']) !!} {!! Form::label('status_inactive', 'Inactive') !!}
        </div>
    </div>
</div>
