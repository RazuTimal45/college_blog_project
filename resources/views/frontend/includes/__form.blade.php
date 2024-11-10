{!! Form::open(['url' => route('frontend.contact_store'), 'method' => 'POST', 'class' => 'contact_form form-horizontal','id'=>'contactUSForm']) !!}
<div class="contact-form-group">
    <div class="form-field name">
        {!! Form::text('name', old('name'), ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.5s', 'placeholder' => 'Enter Name']) !!}
        @include('backend.includes.field_validation',['input'=>'name'])
    </div>
    <div class="form-field">
        {!! Form::email('email', old('email'), ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.7s', 'placeholder' => 'Enter email address']) !!}
        @include('backend.includes.field_validation',['input'=>'email'])
    </div>
    <div class="form-field">
        {!! Form::number('phone', old('phone'), ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.7s', 'placeholder' => 'Enter your phone']) !!}
        @include('backend.includes.field_validation',['input'=>'phone'])
    </div>
    <div class="form-field">
        {!! Form::text('address', old('address'), ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.7s', 'placeholder' => 'Enter your Address']) !!}
        @include('backend.includes.field_validation',['input'=>'address'])
    </div>
    <div class="form-field message">
        {!! Form::textarea('message', old('message'), ['class' => 'form-control input textarea wow fadeInLeft', 'data-wow-delay' => '0.9s', 'placeholder' => 'Write your message']) !!}
        @include('backend.includes.field_validation',['input'=>'message'])
    </div>
    <div class="form-group form-field submit-btn text-center">
        <button class="bg_btn_color wow fadeInLeft default-btn text-anim" data-wow-delay="1.1s" data-text="Submit" type="submit">Submit</button>
    </div>
</div>
{!! Form::close() !!}
