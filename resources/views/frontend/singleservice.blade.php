@extends('frontend.includes.section')
@section('meta-keywords')
   @if($data['singleservice']->meta_keyword) {{$data['singleservice']->meta_keyword}} @endif
@endsection
@section('meta-description')
    @if($data['singleservice']->meta_description) {{$data['singleservice']->meta_description}} @endif
@endsection
@section('title','SingleOffering')
@section('main-section')
    @include('frontend.includes.breadcrumbs',['headtitle'=>'Our Offerings','title'=>'Our Offerings','subtitle'=>$data['singleservice']->title])
    <!-- Single Service -->
<section class="single_service_with_sidebar">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="single_service_content" style="margin-bottom:50px;">
                    <div class="content_top">
                        <img src="{{asset('images/offerings/'.$data['singleservice']->thumbnail_image)}}" alt="{{$data['singleservice']->title}}">
                        <h4>{{ucfirst($data['singleservice']->title)}}</h4>
                        <p>{{$data['singleservice']->slogan}}</p>
                       <p>
                           {!! $data['singleservice']->description !!}
                       </p>
                    </div>
                </div>
                <hr style="color:#524FA2;width:100%;height:3px;">
                <div class="min_contact_area service-single" id="contactform">
                    @include('frontend.includes.successmessage')
                    <div class="section_title">
                        <h4>Let's Work Together</h4>
                    </div>
                  @include('frontend.includes.__form')
                </div>
            </div>
            @if(count($data['otherservices']))
            <div class="col-xl-3">
                <div class="service_sidebar">
                    <h3 style="color:#000;" class="mb-4"><b>Other Offerings</b></h3>
                    <div class="service_sidebar_list list-unstyled">
                        @foreach($data['otherservices'] as $otherservices)
                        <a href="{{route('frontend.service_detail',$otherservices->slug)}}">
                            <p>{{ucfirst($otherservices->title)}}</p> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        @endforeach
                    </div>
                    <div class="service_sidebar_post" data-bg-color="#A6D8B5">
                        <img src="{{asset('assets/frontend/assets/img/logo/logo_small.png')}}" alt="">
                        <h6><a href="{{route('frontend.service_detail',$data['singleservice']->slug.'#contactform')}}">Have a project in mind? Let’s work together</a></h6>
                        <i class="fa-solid fa-arrow-right"></i>
                        <div class="shape_img">
                            <img src="{{asset('assets/frontend/assets/img/shape1.png')}}" alt="" class="one">
                            <img src="{{asset('assets/frontend/assets/img/shape2.png')}}" alt="" class="two">
                            <img src="{{asset('assets/frontend/assets/img/shape3.png')}}" alt="" class="three">
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- Single Service -->
@endsection
