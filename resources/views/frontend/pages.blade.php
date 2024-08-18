@extends('frontend.includes.section')
@section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else Mediaman,Agency,NepalTopAgency @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else Mediaman is one of the best agency in nepal. This is the Best agency.One of the best agency for your service @endif
@endsection
@section('title','Teams')
@section('main-section')
    @include('frontend.includes.breadcrumbs',['headtitle'=>ucfirst($data['single_page']->title),'title'=>ucfirst($data['single_page']->title)])

    <!-- Creative Agency -->
    <section class="creative_agency about_us" style="background-color:#efdfdf;">
        <div class="container">
                    <div class="section_img wow fadeInLeft" data-wow-delay="0.1s">
                    <img src="{{asset('images/page_managers/'.$data['single_page']->thumbnail_image)}}" alt="{{$data['single_page']->title}}">
                    </div>
                    <div class="content">
                        <div class="section_title wow fadeInLeft" data-wow-delay="0.3s">
                            <h3>When you think of PR in Nepal, think of us.</h3>
                        </div>
                        <p class="wow fadeInLeft" data-wow-delay="0.5s">
                        @if(isset($data['single_page']) && $data['single_page']->description) {!! $data['single_page']->description !!} @endif
                        </p>
                        <ul class="agency_contact_list list-unstyled">
                            <li class="mail wow fadeInLeft" data-wow-delay="0.7s"><a class="mail wow fadeInLeft" data-wow-delay="0.5s"
               href="mailto:@if(isset($data['settings']) && $data['settings']->email) {{$data['settings']->email}} @endif">@if(isset($data['settings']) && $data['settings']->email) {{$data['settings']->email}} @endif</a></li>
                            <li class="wow fadeInLeft" data-wow-delay="0.9s">+44 1793 123 456</li>
                        </ul>
                        <a href="about-us.html" class="bg_btn_color wow fadeInLeft" data-wow-delay="1.1s">more about</a>
                    </div>
                </div>
           </div>
    </section>
    <!-- Creative Agency -->


    <!-- Contact -->
    <section class="contact h_5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="map_area wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="min_map">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe id="gmap_canvas"
                                                                 src="https://maps.google.com/maps?q=mirpur%2012&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe><a
                                        href="https://2piratebay.org">pirate bay</a><br>
                                    <a href="https://www.embedgooglemap.net"></a>
                                </div>
                            </div>
                            <div class="map_icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6" id="contactform">
                    @include('frontend.includes.successmessage')
                    <div class="min_contact_area">
                        <div class="section_title wow fadeInLeft" data-wow-delay="0.3s">
                            <h2>Have any project in <br> mind? Let’s work <br> together</h2>
                        </div>
                        @include('frontend.includes.__form')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact -->

    <!-- Cta -->
    <section class="cta about_us" data-bg-color="rgb(140, 167, 187)" >
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
    <!-- Cta -->