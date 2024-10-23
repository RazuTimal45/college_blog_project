@extends('frontend.includes.section')
@section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else Mediaman,Agency,NepalTopAgency @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else Mediaman is one of the best agency in nepal. This is the Best agency.One of the best agency for your service @endif
@endsection
@section('title','Contact')
@section('main-section')
    {{-- @include('frontend.includes.breadcrumbs',['headtitle'=>'Contact us','title'=>'Contact us']) --}}

     <section class="page-header">
        <div class="container">
            <div class="page-content-wrap">
                <div class="page-content">
                    <h2>Contact</h2>
                    {{-- <p>Embark on a journey through the vibrant world of sustainable fashion, where innovation meets ethics and style.</p> --}}
                </div>
            </div>
        </div>
    </section>
 <section class="contact-section padding">
        <div class="map-pattern"></div>
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading mb-30">
                        <h2>Get in touch</h2>
                        <p>For all business and collaboration enquiries <br> please contact with me.</p>
                    </div>
                    <ul class="contact-info">
                        <li><span>Address:</span>Imadol, Lalitpur</li>
                        <li><span>Phone:</span><a href="tel:7045550127">(704) 555-0127</a></li>
                        <li><span>Mail Us:</span><a href="#">razublogg@info.com</a></li>
                    </ul>
            </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                      @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                     @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @include('frontend.includes.__form')
                        {{-- <form action="" method="post" id="ajax_contact" class="form-horizontal">
                            <div class="contact-form-group">
                                <div class="form-field">
                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name" required="">
                                </div>
                                <div class="form-field">
                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" required="">
                                </div>
                                <div class="form-field">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="">
                                </div>
                                <div class="form-field">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" required="">
                                </div>
                                <div class="form-field message">
                                    <textarea id="message" name="message" cols="30" rows="4" class="form-control" placeholder="Message" required=""></textarea>
                                </div>
                                <div class="form-field submit-btn">
                                    <button id="submit" class="default-btn text-anim" type="submit" data-text="Submit">Submit</button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/.contact-section-->
    <!-- Contact -->
@endsection

