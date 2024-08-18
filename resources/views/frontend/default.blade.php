@extends('frontend.includes.section')
@section('title','Default')
@section('main-section')   
    <div id="searchbox-overlay"></div>    
    <section class="page-header">
        <div class="container p-5">
            <div class="page-content-wrap">
                <div class="page-content">
                    <h4>RazuBlogg</h4>
                    <h2>Blogs Collection</h2>
                    <p>Embark on a journey through the vibrant world of sustainable blogs, where your thoughts,knowledge meets other hunger of knowledge.</p>
                    <div class="flex mt-3">
                        <a href="{{ route('frontend.login') }}" class="default-btn text-anim" data-text="Login">Login</a>
                        <a href="{{ route('frontend.register') }}" class="default-btn text-anim" data-text="Register">Register</a>
                        </div>
                </div>
            </div>
        </div>
    </section>
    @endsection