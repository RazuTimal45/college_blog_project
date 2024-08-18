@extends('frontend.includes.section')
@section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else Mediaman,Agency,NepalTopAgency @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else Mediaman is one of the best agency in nepal. This is the Best agency.One of the best agency for your service @endif
@endsection
@section('title','Offerings')
@section('main-section')
@include('frontend.includes.breadcrumbs',['headtitle'=>'News & Press','title'=>'News & Press Release'])

<!-- Service Box -->
@if(count($data['all_news_pr'])>0)
<section class="service_box">
    <div class="container">
        <div class="min_service_box_area">
            <div class="row justify-content-center">
                @foreach($data['all_news_pr'] as $newsprs)
                <div class="col-xl-4 service-div mb-5">
                <a href="{{route('frontend.single_news_press',$newsprs->slug)}}">
                    <div class="single_service_box wow fadeInLeft" data-wow-delay="0.3s">
                        <img src="{{asset('images/new_press/'.$newsprs->thumbnail_image)}}" style="min-width:100%;" alt="">
                        <h4>{{$newsprs->title}}</h4>
                        <p>{{$newsprs->slogan}}</p>
                        <a href="{{route('frontend.single_news_press',$newsprs->slug)}}" class="text_btn">Learn more <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    </a>
                </div>
               @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- Service Box -->
<!-- <ul class="paginations list-unstyled justify-content-center">
                        <li class="active"><a href="blog-single.html">1</a></li>
                        <li><a href="blog-single.html">2</a></li>
                        <li><a href="blog-single.html">3</a></li>
                        <li><a href="blog-single.html"><i class="fa-solid fa-chevron-right"></i></a></li>
                    </ul> -->

<!-- Progress -->
<!-- <section class="progress_area service">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="section_img wow fadeInLeft" data-wow-delay="0.1s">
                    <img src="@if($data['offerings'] && $data['offerings']->isNotEmpty() && $data['offerings']->first()->thumbnail_image != null) {{asset('images/offerings/'.$data['offerings']->first()->thumbnail_image)}} @else @include('frontend.includes.defaultimage') @endif" alt="">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="min_progress_area">
                    <div class="content">
                        <div class="section_title wow fadeInLeft" data-wow-delay="0.3s">
                            <h2>We maximize to <br> achieve your goal</h2>
                        </div>
                        <p class="wow fadeInLeft" data-wow-delay="0.5s">This is the main factor that sets us apart
                            from our competition and allows us deliver a
                            specialist business consultancy service. Our team applies its ranging experience to
                            determining the strategies that</p>
                    </div>
                    <div class="line_progress_bar">
                        <div class="single_items wow fadeInLeft" data-wow-delay="0.7s">
                            <div class="progress_content">
                                <h5>Increase product sales</h5>
                                <span>64%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="64" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="single_items wow fadeInLeft" data-wow-delay="0.9s">
                            <div class="progress_content">
                                <h5>Client satisfaction</h5>
                                <span>82%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="82" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="single_items wow fadeInLeft" data-wow-delay="1.1s">
                            <div class="progress_content">
                                <h5>Growth net income</h5>
                                <span>40%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Progress -->
<!-- Cta -->
<section class="cta about_us" data-bg-color="rgb(140 167 187)">
    <div class="container">
        <div class="min_cta_area" data-bg-img="{{asset('assets/frontend/assets/img/cta/bg.png')}}">
            <h3 class="wow fadeInLeft" data-wow-delay="0.1s">Are you ready to grow?</h3>
            <p class="wow fadeInLeft" data-wow-delay="0.3s">This is the main factor that sets us apart from our
                competition and allows us deliver a specialist
                business <br> consultancy service. Our team applies its ranging experience to determining</p>
            <a class="mail wow fadeInLeft" data-wow-delay="0.5s"
               href="mailto:@if(isset($data['settings']) && $data['settings']->email) {{$data['settings']->email}} @endif">@if(isset($data['settings']) && $data['settings']->email) {{$data['settings']->email}} @endif</a>
        </div>
    </div>
</section>
@endsection
