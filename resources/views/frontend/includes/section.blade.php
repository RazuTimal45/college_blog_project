<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="description" content="@yield('meta-description')">
    {{-- <title>@if(isset($data['settings']) && $data['settings']->site_name){{$data['settings']->site_name}} @else RazuBlogg @endif | @yield('title')</title> --}}
    <title>RazuBlogg</title>
    {{-- <link rel="icon" type="image/x-icon" href="@if($data['settings'] && $data['settings']->fav_icon) {{asset('images/settings/'.$data['settings']->fav_icon)}} @endif"> --}}
    <!-- Font Awesome Css -->
    <meta property="og:image" content="{{ asset('assets/frontend/assets/img/author-1.jpg') }}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/bootstrap.min.css')}}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/venobox.min.css')}}">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/swiper.min.css')}}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/main.css')}}">
   
</head>

<body data-scroll-animation="true">

<!-- Header Section -->
@include('frontend.includes.menu')
<!-- Header Section -->

@yield('main-section')

    <footer class="footer-section bg-light-red">
        <div class="container">
            <div class="row gy-lg-0 gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget widget">
                        <div class="about-widget">
                            <a href="index-2.html" class="logo"><span class="site-title">RazuBlogg</span></a>
                            <p>Fouder of this blog mr Razu Timalsina is a Web Developer, Cyber Security Enthusiast, Blogger and Investor.</p>
                            <a href="subscribe.html" class="default-btn text-anim" data-text="Subscribe">Subscribe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget widget">
                        <div class="category-widget">
                            <h3 class="widget-title">Category</h3>
                            <ul>
                                <li><a href="category.html">Travel</a></li>
                                <li><a href="category.html">Photos</a></li>
                                <li><a href="category.html">Lifestyle</a></li>
                                <li><a href="category.html">Fashion</a></li>
                                <li><a href="category.html">Studies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget widget">
                        <div class="widget-post-items">
                            <h3 class="widget-title">Recent Blogs</h3>
                            <div class="widget-post-item img-hover-move">
                                <div class="widget-post-thumb media">
                                    <a href="single.html"><img src="{{asset('assets/frontend/assets/img/post-1.jpg')}}" alt="thumb"></a>
                                </div>
                                <div class="widget-post-content">
                                    <h3><a href="single.html" class="text-hover">title</a></h3>
                                    <ul class="post-meta">  
                                        <li><a href="category.html">travel</a></li>
                                        <li class="sep"></li>
                                        <li><a href="category.html" class="date">02.08.2024</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget widget">
                        <div class="contact-widget">
                            <h3 class="widget-title">Contact Info</h3>
                            <ul class="contact-info">
                                <li><span>Address:</span>Imadol, Lalitpur</li>
                                <li><span>Phone:</span><a href="tel:7045550127">+123 456 789</a></li>
                                <li><span>Mail Us:</span><a href="#">razublogg@info.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="copyright-text">
                © <span id="currentYear"></span> RazuBlogg, All Rights Reserved. Design By <a href="http://rajutimalsina.com.np" target="_blank">Raju Timalsina</a>
                </div>
                <ul class="footer-social">
                    <li>Follow:</li>
                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg></a>
                    </li>
                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg></a></li>
                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a>
                    </li>
                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"></path></svg></a>
                    </li>
                </ul>
            </div>
            <!--/.copyright-area-->
        </div>
    </footer>
  

    <div id="scrollup">
        <button id="scroll-top" class="scroll-to-top"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor"><path d="M450.001-180.001v-485.077L222.154-437.232 180.001-480 480-779.999 779.999-480l-42.153 42.768-227.847-227.846v485.077h-59.998Z"/></svg></button>
    </div>


    <button class="theme-toggle" id="theme-toggle" title="Toggles light & dark" aria-label="auto" aria-live="polite">
        <svg class="sun-and-moon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
            <mask class="moon" id="moon-mask">
                <rect x="0" y="0" width="100%" height="100%" fill="white" />
                <circle cx="24" cy="10" r="6" fill="black" />
            </mask>
            <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="currentColor" />
            <g class="sun-beams" stroke="currentColor">
                <line x1="12" y1="1" x2="12" y2="3" />
                <line x1="12" y1="21" x2="12" y2="23" />
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                <line x1="1" y1="12" x2="3" y2="12" />
                <line x1="21" y1="12" x2="23" y2="12" />
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
            </g>
        </svg>
    </button>



<!-- jQuery Library -->
<script src="{{asset('assets/frontend/assets/js/vendor/jquary-3.6.0.min.js')}}"></script>
<!-- Popper - Js For Bootstrap -->
<script src="{{asset('assets/frontend/assets/js/vendor/bootstrap.min.js')}}"></script>
<!-- Bootstrap - jS  -->
<script src="{{asset('assets/frontend/assets/js/vendor/popper.min.js')}}"></script>
<!-- Waypoints Js For Counter Up -->
<script src="{{asset('assets/frontend/assets/js/vendor/venobox.min.js')}}"></script>
<!-- Counter Up - Js -->
<script src="{{asset('assets/frontend/assets/js/vendor/swiper.min.js')}}"></script>
<!-- Magnific Popup -Js -->
<script src="{{asset('assets/frontend/assets/js/vendor/smooth-scroll.js')}}"></script>
<!-- Wow - Js -->
<script src="{{asset('assets/frontend/assets/js/mailchimp.js')}}"></script>
<!-- Parallax - Js -->
<script src="{{asset('assets/frontend/assets/js/main.js')}}"></script>
@yield('js')
</body>

</html>
