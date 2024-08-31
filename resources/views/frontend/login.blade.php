@extends('frontend.includes.section')
@section('title','Home')
@section('main-section')
   <section class="contact-section padding">
        <div class="map-pattern"></div>
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading mb-30">
                        <h2>Login</h2>
                    </div>
                    <ul class="contact-info">
                        <li><span>Address:</span>3770 Hidden meadow <br> drive venturia, ND 58489</li>
                        <li><span>Phone:</span><a href="tel:7045550127">+123 555-0127</a></li>
                        <li><span>Mail Us:</span><a href="#">raju@example.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form action="" method="" id="ajax_contact" class="form-horizontal">
                            <div class="contact-form-group d-block">
                                <div class="form-field my-2">
                                    <input type="email" id="email" name="email" class="form-control w-50" placeholder="Email">
                                </div>
                                 <div class="form-field my-2">
                                    <input type="password" id="password" name="password" class="form-control w-50" placeholder="********">
                                </div>
                                <div class="form-field submit-btn">
                                    <button id="submit" class="default-btn text-anim" type="submit" data-text="Login"><a href="/home">Login</a></button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection