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
    <!--/.popup-search-box-->
    
    <div id="searchbox-overlay"></div>
    <!--/.searchbox-overlay-->
    
    <section class="single-page no-sidebar padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="single-post-thumb">
                        <img src="{{asset('/images/posts/'.$data['blog_detail']->image)}}" alt="{{ $data['blog_detail']->title }}">
                    </div>
                    <header class="entry-header">
                       <ul class="post-meta">
                            <li><a href="category.html">{{ $data['blog_detail']->title }}</a></li>
                            <li class="sep"></li>
                            <li><a href="category.html" class="date">{{ \Carbon\Carbon::parse($data['blog_detail']->date)->format("d F, Y") }}</a></li>
                        </ul>
                        <h2 class="post-title">{{ $data['blog_detail']->sub_title }}</h2>
                    </header>
                    <div class="single-post-content">
                       {!! $data['blog_detail']->description !!}
                    </div
                    
                </div>
                    <div class="single-post-item">
                        <h3>Related Articles</h3>
                        <div class="related-post-wrap">
                         @forelse($data['relatedBlogs'] as $relatedblogs)
                            <article>
                                <div class="post-card horizontal-card img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="{{ route('frontend.blog_detail',$relatedblogs->slug) }}">
                                            <img src="{{asset('images/posts/'.$relatedblogs->image)}}" alt="thumb">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><a href="category.html">{{ $relatedblogs->categories->pluck('name')->first()}}</a></li>
                                            <li class="sep"></li>
                                            <li><a href="{{ route('frontend.blog_detail',$relatedblogs->slug) }}" class="date">{{ $relatedblogs->created_at->format('d F, Y') }}</a></li>
                                        </ul>
                                        <h3><a href="single.html" class="text-hover">{{ $relatedblogs->title }}</a></h3>
                                        <ul class="post-card-footer">
                                            <li><a href="single.html" class="read-more">Continue Reading</a></li>
                                            <li>
                                                <a href="#" class="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                        <path d="M250.001-410.001h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm609.998 531.537L718.461-260.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v669.227ZM172.309-320h571.69L800-264.615v-523.076q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846H172.309q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846ZM160-320V-800v480Z" />
                                                    </svg><span>04</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    
                    <div class="single-post-item">
                        <ul class="single-post-navigation">
                            <li><a href="single.html"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor"><path d="M366.924-213.463 100.001-480.385l266.923-266.922 41.768 41.768-194.54 195.155h646.231v59.999H214.537l195.155 195.154-42.768 41.768Z"/></svg>Prev Posts</a></li>
                            <li><a href="single.html">Next Posts<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor"><path d="m593.461-213.463-42.768-41.768 195.155-195.154H100.001v-59.999h646.231L551.693-705.539l41.768-41.768 266.922 266.922-266.922 266.922Z"/></svg></a></li>
                        </ul>
                    </div>
                    <!--/.post-navigation-->
                    
                    <div class="single-post-item">
                        <div class="single-post-author">
                            <div class="author-thumb"><a href="author.html"><img src="{{asset('assets/frontend/assets/img/author-widget.jpg')}}" alt="thumb"></a></div>
                            <div class="author-info">
                                <h3><a href="author.html">Raju Timalsina</a> <span>Founder - Editor</span></h3>
                                <p>Meet Raju, the passionate mind behind our blog. With a heart woven with words and a penchant for storytelling, Emily is a dedicated writer who crafts narratives. </p>
                                <ul class="post-social-share">
                                <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"></path></svg></a>
                                </li>
                                <li class="twitter"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg></a></li>
                                <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a>
                                </li>
                                <li class="pinterest"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" fill="currentColor"><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path></svg></a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <!--/.post-author-->
                    
                    <div class="single-post-item">
                       <h3>Post Comments</h3>
                        <ul class="comments-box">
                            <li class="comment">
                                <div class="comment-inner">
                                    <div class="comment-thumb"><img src="{{asset('assets/frontend/assets/img/author-1.jpg')}}" alt="img"></div>
                                    <div class="comment-wrap">
                                        <div class="comments-meta">
                                            <h4>Félix Lengyel <span>01.01.2024 at 8:00</span></h4>
                                        </div>
                                        <div class="comment-area">
                                            <p>You guys have put so much work, effort, and time while designing this awesome theme I can see that passion when I incorporated it into my website.</p>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="comment-inner">
                                            <div class="comment-thumb"><img src="{{asset('assets/frontend/assets/img/author-2.jpg')}}" alt="img"></div>
                                            <div class="comment-wrap">
                                                <div class="comments-meta">
                                                    <h4>Joseph Crawford <span>01.01.2024 at 8:00</span></h4>
                                                </div>
                                                <div class="comment-area">
                                                    <p>The only thing I LOVE more than this theme and it’s incredible options is the support team! They are freaking amazable!</p>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <div class="comment-inner">
                                    <div class="comment-thumb"><img src="{{asset('assets/frontend/assets/img/author-3.jpg')}}" alt="img"></div>
                                    <div class="comment-wrap">
                                        <div class="comments-meta">
                                            <h4>Patsy Hamlin <span>01.01.2024 at 8:00</span></h4>
                                        </div>
                                        <div class="comment-area">
                                            <p>Outstanding quality in this theme, brilliant Effects and perfect crafted Code. We absolutely love it and can highly recommend DynamicLayers!</p>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
                        <div class="comment-form-wrap">
                            <h3>Leave a Comment</h3>
                           <form action="{{ route('frontend.store_comment', ['slug' => $blog_detail->slug]) }}" method="post" class="comment-form form-horizontal">
        @csrf
        <input value="1" name="user_id" type="hidden" />
        <div class="comment-form-group">
            <div class="form-field message">
                <textarea id="comment" name="content" cols="30" rows="5" class="form-control comment" placeholder="Your Comment*" required></textarea>
            </div>
            <div class="form-field submit-btn">
                <button id="submit" class="default-btn text-anim" type="submit" data-text="Submit Comment">Submit Comment</button>
            </div>
        </div>
    </form>
                        </div>
                    </div>
                    <!--/.post-comments-->
                </div>
            </div>
        </div>
    </section>
    <!--/.single-page-->
    
@endsection
