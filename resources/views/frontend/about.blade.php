@extends('frontend.includes.section')
{{-- @section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else RazuBlogg - Best Blogging site @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else RazuBlogg is best blogging site. This sites helps in collection of blogs. @endif
@endsection --}}
@section('title','Home')
@section('main-section')

   <section class="page-header">
        <div class="container">
            <div class="page-content-wrap">
                <div class="page-content">
                    <h4>Archives</h4>
                    <h2>About Razu Blogs<span>15 Posts</span></h2>
                    <p>Embark on a journey through the vibrant world of sustainable fashion, where innovation meets ethics and style.</p>
                </div>
            </div>
        </div>
    </section>
  
    
<section class="main-post-area padding-bottom py-5">
        <div class="container">
            <div class="row gy-5 gy-lg-0 main-area">
                <div class="col-lg-8">
                    <div class="blog-standard">
                        <article>
                            <div class="post-card full-width-post img-hover-move">
                                <div class="post-thumb media">
                                    <a href="single.html">
                                        <img src="{{ asset('assets/frontend/assets/img/about_banner.jpg') }}" alt="thumb">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3><a href="single.html" class="text-hover">About Razublog</a></h3>
                                    <p>RazuBlogg website project is a comprehensive full-stack application designed to offer a robust platform for users to create, manage, and engage with blog content. The front-end of the application is built using modern web technologies like HTML, CSS, JS and other JS plugins, ensuring a responsive and user-friendly interface. This interface allows users to easily navigate through blog posts, view categories, and interact with features such as comment sections and user profiles. The design is crafted to provide a seamless experience across different devices, leveraging Laravel's Blade templating engine to dynamically render content and handle user interactions effectively.</p>
                                    <p>On the back-end, Laravel serves as the powerful framework driving the application's core functionality. It facilitates the management of user authentication, authorization, and data handling through its elegant ORM (Eloquent) and robust routing capabilities. Laravel's built-in features like migrations, seeding, and artisan commands streamline the database management process, ensuring data integrity and ease of maintenance. The application includes essential CRUD operations for blog posts, user profiles, and comments, all supported by Laravel's secure and scalable architecture.</p>
                                    <p>In addition to these core features, your project likely integrates various advanced functionalities such as search capabilities, tagging, and possibly an admin dashboard for content moderation and analytics. The use of Laravel’s ecosystem tools like Laravel Mix for asset compilation and Laravel Nova for administrative interfaces further enhances the development and management experience. Overall, this project demonstrates a full-stack approach that combines Laravel’s back-end prowess with a polished front-end, delivering a complete and engaging blogging platform.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <ul class="pagination-wrap">
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor"><path d="m553.846-253.847-42.153-43.384 152.77-152.77H180.001v-59.998h484.462l-152.77-152.77 42.153-43.384L779.999-480 553.846-253.847Z"/></svg></a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="sidebar-widget widget">
                            <div class="author-widget">
                                <img class="author-thumb" src="{{ asset('assets/frontend/assets/img/raju.jpeg') }}" alt="author">
                                <div class="author-content">
                                    <h3><a href="#">Raju Timalsina</a><span>Blogger</span></h3>
                                    <p>Author of this blog Raju Timalsina is a Investor, writer and webdeveloper.</p>
                                </div>
                            </div>
                        </div>
                        <!--Sidebar Category-->
                          @if(isset($data['popular']) && $data['popular']->isNotEmpty())
                        <div class="sidebar-widget widget">
                            <div class="widget-post-items">
                            @forelse($data['popular'] as $popular)                            
                                <div class="widget-post-item img-hover-move">
                                    <div class="widget-post-thumb media">
                                        <a href="single.html"><img src={{ asset('images/posts/'.$popular->image) }} alt="thumb"></a>
                                    </div>
                                    <div class="widget-post-content">
                                        <h3><a href="single.html" class="text-hover">{{ $popular->title }}</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="category.html">Studies</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">{{ \Carbon\Carbon::parse($popular->date)->format("d F, y") }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        @endif
                        <!--List Posts-->
                        <div class="sidebar-widget widget">
                            <ul class="social-widget">
                                <li class="facebook"><a href="#"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"></path></svg></div><span>Facebook</span></a></li>
                                <li class="twitter"><a href="#"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg></div><span>Twitter</span></a></li>
                                <li class="instagram"><a href="#"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></div><span>Instagram</span></a></li>
                                <li class="youtube"><a href="#"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"></path></svg></div><span>Youtube</span></a></li>
                            </ul>
                        </div>
                        <!--/.social-widget-->
                        <!--Subscribe Widget-->
                        <!--Banner Widget-->
                    </div>
                    <!--/.sidebar-area-->
                </div>
            </div>
        </div>
    </section>

@endsection