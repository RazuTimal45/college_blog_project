@extends('frontend.includes.section')
@php
    $blog_detail = $data['blog_detail'] ?? null;
@endphp
{{-- @section('meta-keywords')
    @if($data['singleblog']->meta_keyword) {{$data['singleblog']->meta_keyword}} @endif
@endsection
@section('meta-description')
    @if($data['singleblog']->meta_description) {{$data['singleblog']->meta_description}} @endif
@endsection --}}
@section('title','SingleBlog')
@section('main-section')

    <div id="popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
                <button id="popup-search-button" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14.811 14.811">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(-2.25 -2.25)">
                            <circle cx="5.5" cy="5.5" r="5.5" data-name="Ellipse 7" transform="translate(3 3)"></circle>
                            <path d="m16 16-3.142-3.142"></path>
                        </g>
                    </svg>
                </button>
            </form>
            <div class="search-close"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M256-213.847 213.847-256l224-224-224-224L256-746.153l224 224 224-224L746.153-704l-224 224 224 224L704-213.847l-224-224-224 224Z" /></svg>
            </div>
        </div>
    </div>

    
    <div id="searchbox-overlay"></div>

    
    <section class="single-page no-sidebar padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="single-post-thumb">
                        <img src="{{asset('assets/frontend/assets/img/raju_dashain.jpg')}}" alt="Raju Dashain">
                    </div>
                    {{-- <header class="entry-header">
                       <ul class="post-meta">
                            <li><a href="category.html">{{ $data['blog_detail']->title }}</a></li>
                            <li class="sep"></li>
                            <li><a href="category.html" class="date">{{ \Carbon\Carbon::parse($data['blog_detail']->date)->format("d F, Y") }}</a></li>
                        </ul>
                        <h2 class="post-title">{{ $data['blog_detail']->sub_title }}</h2>
                    </header>
                    <div class="single-post-content">
                       {!! $data['blog_detail']->description !!}
                    </div --}}
                </div>
         

                 
                  
        
            
           


                        <!--/.post-comments-->
                    </div>
                </div>
            </div>
        </section>   
@endsection

