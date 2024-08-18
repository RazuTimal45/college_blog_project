@extends('frontend.includes.section')
@section('meta-keywords')
   @if($data['single_news_press']->meta_keyword) {{$data['single_news_press']->meta_keyword}} @endif
@endsection
@section('meta-description')
    @if($data['single_news_press']->meta_description) {{$data['single_news_press']->meta_description}} @endif
@endsection
@section('title','Single News & Press')
@section('main-section')
    @include('frontend.includes.breadcrumbs',['headtitle'=>'Our News','title'=>'Our News','subtitle'=>$data['single_news_press']->title])
    <!-- Single Service -->
<section class="single_service_with_sidebar">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="single_service_content" style="margin-bottom:50px">
                    <div class="content_top">
                        <img src="{{asset('images/new_press/'.$data['single_news_press']->thumbnail_image)}}" alt="{{$data['single_news_press']->title}}">
                        <h4>{{ucfirst($data['single_news_press']->title)}}</h4>
                        <p>{{$data['single_news_press']->slogan}}</p>
                       <p>
                           {!! $data['single_news_press']->description !!}
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
            @if(count($data['other_news_press']))
            <div class="col-xl-3">
                <div class="service_sidebar">
                    <h3 style="color:#000;" class="mb-4"><b>Recent News/PRs</b></h3>
                    <div class="service_sidebar_list list-unstyled">
                        @foreach($data['other_news_press'] as $other_news_press)
                        <a href="{{route('frontend.single_news_press',$other_news_press->slug)}}">
                            <p>{{ucfirst($other_news_press->title)}}</p> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        @endforeach
                    </div>
                    <div class="service_sidebar_post" data-bg-color="#A6D8B5">
                        <img src="{{asset('assets/frontend/assets/img/logo/logo_small.png')}}" alt="">
                        <h6><a href="{{route('frontend.single_news_press',$data['single_news_press']->slug.'#contactform')}}">Have a project in mind? Let’s work together</a></h6>
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
