@extends('frontend.includes.section')
@section('title','Aboutus')
@section('main-section')
    @include('frontend.includes.breadcrumbs',['headtitle'=>'About Us','title'=>'About Us'])

    <!-- Creative Agency -->
    <section class="creative_agency about_us" style="background:#F0F8FF;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="{{asset('assets/frontend/assets/img/about_desc.png')}}" style="max-width:650px;" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        <div class="section_title wow fadeInLeft" data-wow-delay="0.3s">
                            <h2>When you think of PR in Nepal, think of us.</h2>
                        </div>
                        <p class="wow fadeInLeft" data-wow-delay="0.5s">Mediaman is a PR firm that embodies innovation, professionalism and dedication
                            to excellence. Rooted in the legacy of Nepal’s early agencies like JWT, Mediaman
                            champions the essence of PR and media by prioritizing relationships. Recognizing
                            Nepal’s critical need for PR services, we aim to bridge the gap between ad
                            agencies and PR firms, emphasizing the importance of tailored solutions beyond
                            press releases.</p>
                            <p class="wow fadeInLeft" data-wow-delay="0.5s">With years of expertise, we ensure your brand’s presence across traditional and
                                digital platforms. We create insight-driven campaigns to forge connections
                                between your brand and target audience. Our integrated PR services include brand
                                campaigns, events, exhibitions, press releases, media interviews and interactive
                                programs like media round tables and discussion series. Based in Kathmandu,
                                Nepal, our expertise includes special regional media management while the reach
                                extends to key markets like Delhi, Mumbai, and other regions in India.</p>
                        <ul class="agency_contact_list list-unstyled">
                            <li class="mail wow fadeInLeft" data-wow-delay="0.7s"><a style="color:black;" href="mailto:@if(isset($data['settings']) && $data['settings']->email) {{$data['settings']->email}} @endif">@if(isset($data['settings']) && $data['settings']->email) {{$data['settings']->email}} @endif</a></li>
                            <li class="wow fadeInLeft" data-wow-delay="0.9s">@if(isset($data['settings']) && $data['settings']->phone){{$data['settings']->phone}}@endif</li>
                        </ul>
                        <a href="#" class="bg_btn_color wow fadeInLeft" data-wow-delay="1.1s">more about</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Creative Agency -->
     <!-- mission,vision,guiding priciple -->
     <section style="overflow-x:hidden;">
        <div class="row">
            <div class="col-md-6 col-image" style="background-image: url('{{asset('assets/frontend/assets/img/mission.jpg')}}');">
            </div>
            <div class="col-md-6 col-text" style="background-color:#2E5090;color:#fff;">
            <div class="Aligner-item">
                <h2>Our mission</h2>
                <p>
                    <ul>
                    <li>Be the leading PR agency in Nepal</li>
                    <li>Pioneer the transformation of PR and Media Relations in Nepal</li>
                    <li>Set new standards of excellence in the industry</li>
                    </ul>
                </p>
            </div>
            </div>
            <div class="col-md-6 col-text col-left" style="background-color:#90a7e7;color:#fff;">
            <div class="Aligner-item">
                <h2>Our vision</h2>
                <p>
                    <ul>
                    <li>Navigate from 'Print to Pixel' media seamlessly</li>
                    <li>Craft customized PR communication</li>
                    </ul>
                </p>
            </div>
            </div>
            <div class="col-md-6 col-image" style="background-image:url('{{asset('assets/frontend/assets/img/vision.jpg')}}');">
            &nbsp;
            </div>
            <div class="col-md-6 col-image" style="background-image: url('{{asset('assets/frontend/assets/img/guiding.jpg')}}');">
            &nbsp;
            </div>
            <div class="col-md-6 col-text" style="background-color:#004D66;color:#fff;">
            <div class="Aligner-item">
                <h2>Our guiding principles</h2>
                <p>
                    <ul>
                        <li >Integrity</li>
                        <li>Accountability</li>
                        <li>Client-centricity</li>
                        <li>Adaptability</li>
                    </ul>
                </p>
            </div>
        </div>
    </section>
     <!-- mission,vision,guiding priciple end-->
    <!-- Contact -->
    <section class="contact h_5" style="background-color:#fff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="map_area wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="min_map">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe id="gmap_canvas"
                                                                 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14134.790692792505!2d85.30655411856293!3d27.664823969308998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb17abd80a5925%3A0x7eb8499528680c09!2sJamana%20Studio!5e0!3m2!1sen!2snp!4v1711098112421!5m2!1sen!2snp"></iframe><a
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