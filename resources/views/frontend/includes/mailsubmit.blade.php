{!! Form::open(['url'=> route('frontend.mail_store').'#mailsubmit', 'class' => 'subscribe_form']) !!}
    <div> 
        {!! Form::email('email', null, ['class' => 'form-control input wow fadeInLeft', 'data-wow-delay' => '0.7s', 'placeholder' => 'Enter email address']) !!}
        @include('backend.includes.field_validation',['input'=>'email'])
   </div>
   <div>
    {!! Form::submit('Subscribe', ['class' => 'bg_btn_color wow fadeInLeft', 'data-wow-delay' => '1.1s']) !!}
    </div>
{!! Form::close() !!}