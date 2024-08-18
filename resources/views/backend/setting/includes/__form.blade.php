<div class="row">
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('site_name','Enter site name') !!}
        {!! Form::text('site_name', null, ['class' => 'form-control', 'placeholder' => 'Enter site name*']) !!}
        @include('backend.includes.field_validation',['input'=>'site_name'])
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('email','Enter email') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email*']) !!}
        @include('backend.includes.field_validation',['input'=>'email'])
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('address','Enter address') !!}
        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter address*']) !!}
        @include('backend.includes.field_validation',['input'=>'address'])
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('phone','Enter Phone') !!}
        {!! Form::number('phone',null,['class'=>'form-control','placeholder'=>'Enter phone*']) !!}
        @include('backend.includes.field_validation',['input'=>'phone'])
    </div>
    <div class="col-lg-6 col-12 mb-30"  id="image_section">
        {!! Form::label("fav_icon_file",'Upload Fav Icon Image') !!}
        {!! Form::file('fav_icon_file',['class'=>'form-control','id'=>'fav_icon_file']) !!}
        @include('backend.includes.field_validation',['input'=>'fav_icon_file'])
        <div class="form-group">
            <img id="fav_icon_preview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;">
        </div>
        @if(isset($data['record']) && $data['record']->fav_icon)
            <div class="image_fav_icon">
                <img id="fav_icon_image"  src="{{asset('images/settings/'.$data['record']->fav_icon)}}" alt="" width="150px" height="100px">
            </div>
        @endif
    </div>
    <div class="col-lg-6 col-12 mb-30"  id="image_section">
        {!! Form::label("logo_header_file",'Upload Logo Header Image') !!}
        {!! Form::file('logo_header_file',['class'=>'form-control','id'=>'logo_header_file']) !!}
        @include('backend.includes.field_validation',['input'=>'logo_header_file'])
        <div class="form-group">
            <img id="logo_header_preview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;">
        </div>
        @if(isset($data['record']) && $data['record']->logo_header)
            <div class="image_logo_header">
                <img id="logo_header_image"  src="{{asset('images/settings/'.$data['record']->logo_header)}}" alt="" width="150px" height="100px">
            </div>
        @endif
    </div>
    <div class="col-lg-6 col-12 mb-30"  id="image_section">
        {!! Form::label("logo_footer_file",'Upload Logo footer Image') !!}
        {!! Form::file('logo_footer_file',['class'=>'form-control','id'=>'logo_footer_file']) !!}
        @include('backend.includes.field_validation',['input'=>'logo_footer_file'])
        <div class="form-group">
            <img id="logo_footer_preview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;">
        </div>
        @if(isset($data['record']) && $data['record']->logo_footer)
            <div class="image_logo_footer">
                <img id="logo_footer_image"  src="{{asset('images/settings/'.$data['record']->logo_footer)}}" alt="" width="150px" height="100px">
            </div>
        @endif
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('slogan','Enter slogan') !!}
        {!! Form::text('slogan', null, ['class' => 'form-control', 'placeholder' => 'Enter slogan*']) !!}
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('facebook','Enter facebook link') !!}
        {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Enter Facebook Link*']) !!}
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('whatsapp','Enter whatsapp link') !!}
        {!! Form::text('whatsapp', null, ['class' => 'form-control', 'placeholder' => 'Enter Whatsapp Link*']) !!}
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('linked_in','Enter linkedin link') !!}
        {!! Form::text('linked_in', null, ['class' => 'form-control', 'placeholder' => 'Enter Linkedin Link*']) !!}
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('youtube','Enter youtube link') !!}
        {!! Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'Enter Youtube Link*']) !!}
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('meta_title','Enter meta title') !!}
        {!! Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Meta Title*']) !!}
    </div>
    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('meta_keyword','Enter meta keyword') !!}
        {!! Form::text('meta_keyword', null, ['class' => 'form-control', 'placeholder' => 'Meta Keyword*']) !!}
        @include('backend.includes.field_validation',['input'=>'meta_keyword'])
    </div>

    <div class="col-lg-6 col-12 mb-30">
        {!! Form::label('meta_description','Enter meta description') !!}
        {!! Form::textarea('meta_description', null, ['class' => 'form-control textarea', 'placeholder' => 'Meta Description*']) !!}
        @include('backend.includes.field_validation',['input'=>'meta_description'])
    </div>
</div>
