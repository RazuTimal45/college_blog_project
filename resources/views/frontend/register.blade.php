@extends('frontend.includes.section')
@section('title','Home')
@section('main-section')   
    <section class="contact-section padding">
        <div class="map-pattern"></div>
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading mb-30">
                        <h2>Register</h2>
                    </div>
                    <ul class="contact-info">
                        <li><span>Address:</span>3770 Hidden meadow <br> drive venturia, ND 58489</li>
                        <li><span>Phone:</span><a href="tel:7045550127">+123 555-0127</a></li>
                        <li><span>Mail Us:</span><a href="#">raju@example.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form action="{{  route('frontend.register.submit')  }}" method="post" id="ajax_contact" class="form-horizontal">
                                @csrf
                                <div class="contact-form-group">
                                    <div class="form-field">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="">
                                    </div>
                                    <div class="form-field">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    <div class="form-field">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <div class="form-field">
                                        <input type="password" id="c-password" name="c-password" class="form-control" placeholder="Confirm Password" required="">
                                    </div>
                                    <div class="form-field">
                                        <textarea id="bio" name="bio" cols="30" rows="4" class="form-control" placeholder="Your Bio" required=""></textarea>
                                    </div>
                                    <div class="form-field submit-btn">
                                        <button id="submit" class="default-btn text-anim" type="submit" data-text="Register">Register</button>
                                        <a href="{{route('frontend.login')}}" class="default-btn text-anim" type="submit" data-text="Already have account">Already Have An account</a>
                                    </div>
                                </div>
                                <div id="form-messages" class="alert" role="alert"></div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/.contact-section-->
    
@endsection