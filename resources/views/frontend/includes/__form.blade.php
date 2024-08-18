{!! Form::open(['url'=> route('frontend.contact_store').'#contactform', 'class' => 'contact_form']) !!}
<div class="row">
    <div class="col-lg-6">
        {!! Form::text('name', null, ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.5s', 'placeholder' => 'Your full name']) !!}
        @include('backend.includes.field_validation',['input'=>'name'])
    </div>
    <div class="col-lg-6">
        {!! Form::email('email', null, ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.7s', 'placeholder' => 'Enter email address']) !!}
        @include('backend.includes.field_validation',['input'=>'email'])
    </div>
    <div class="col-lg-6">
        {!! Form::number('phone', null, ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.7s', 'placeholder' => 'Enter your phone']) !!}
        @include('backend.includes.field_validation',['input'=>'phone'])
    </div>
    <div class="col-lg-6">
        {!! Form::select('services', $data['offerings']->pluck('title', 'id')->toArray(), $data['singleservice']->id ?? null, ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.7s', 'placeholder' => 'Select services']) !!}
        @include('backend.includes.field_validation',['input'=>'services'])
    </div>
    <div class="col-lg-12">
        {!! Form::textarea('message', null, ['class' => 'form-control input textarea wow fadeInLeft', 'data-wow-delay' => '0.9s', 'placeholder' => 'Write your message']) !!}
        @include('backend.includes.field_validation',['input'=>'message'])
    </div>
    <div class="col-lg-12">
    {!! Form::submit('Send message', ['class' => 'bg_btn_color wow fadeInLeft', 'data-wow-delay' => '1.1s']) !!}
    </div>
</div>
{!! Form::close() !!}
