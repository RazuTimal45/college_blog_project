@extends('frontend.includes.section')

@section('title', 'Home')
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
            <div class="search-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M256-213.847 213.847-256l224-224-224-224L256-746.153l224 224 224-224L746.153-704l-224 224 224 224L704-213.847l-224-224-224 224Z" />
                </svg>
            </div>
        </div>
    </div>
    <!-- /.popup-search-box -->
    
    <div id="searchbox-overlay"></div>


    @if($data['blogs']->isNotEmpty())
        <section class="featured-post">
            <div class="featured-post-wrap">
                <div class="swiper featured-post-carousel">
                    <div class="swiper-wrapper" id="blogPosts">
                        @foreach($data['blogs'] as $blog)
                            <div class="swiper-slide slide-size-m dl-drag-cursor">
                                <div class="featured-post-card img-hover-scale">
                                    <div class="post-card-inner">
                                        <div class="featured-post-thumb media">
                                            @foreach($blog->categories as $categorylist)
                                                <a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="featured-post-cat">{{ $categorylist->name }}</a>
                                            @endforeach
                                            <a href="{{ route('frontend.blog_detail', $blog->slug) }}">
                                                <img src="{{ asset('images/posts/' . $blog->image) }}" alt="{{ $blog->title }}">
                                            </a>
                                        </div>
                                        <div class="featured-post-info">
                                            <div class="featured-post-meta">
                                                <ul class="post-meta">
                                                    <li><a href="single.html">{{ $blog->user->name }}</a></li>
                                                    <li class="sep"></li>
                                                    <li><a class="date" href="{{ route('frontend.blog_detail', $blog->slug) }}">{{ \Carbon\Carbon::parse($blog->date)->format("d F, Y") }}</a></li>
                                                </ul>
                                            </div>
                                            <h2>
                                                <a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="text-hover">
                                                    {!!  Str::limit(strip_tags($blog->description),100) !!}
                                                </a>
                                            </h2>
                                            <a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="read-more">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.featured-carousel -->
            </div>
        </section>
    @endif
    <!-- /.featured-post -->
    @if($data['categories']->isNotEmpty())
        <section class="category-section padding">
            <div class="container">
                <div class="section-heading mb-40 text-center">
                    <h2>Featured Categories</h2>
                    <p>Discover tips, insights, and inspiration to embrace impact on the planet.</p>
                </div>
                <div class="row">
                    <div class="featured-category">
                        @foreach($data['categories'] as $category)
                            <div class="category-card img-hover-move">
                                <a href="#" class="cat-thumb media">
                                    <img src="{{ asset('/images/categories/' . $category->image) }}" alt="{{ $category->name }}">
                                    <div class="cat-text">{{ $category->name }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
  
    <div class="post-layout bg-light-red padding">
        <div class="container">
            <div class="post-wrap-heading">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                        <path d="M420.001-143.082v-276.919H307.694v-439.998H653.46l-73.461 255.768h158.076L420.001-143.082Z"></path>
                    </svg>
                    <span>Popular Stories</span>
                </h3>
            </div>
            @if($data['popular']->isNotEmpty())
                <div class="post-layout-1">
                    @foreach($data['popular']->take(5) as $blogp)
                        <article class="post-layout-item img-hover-move">
                            <a href="{{ route('frontend.blog_detail', $blogp->slug) }}" class="post-thumb media">
                                <img src="{{ asset('images/posts/' . $blogp->image) }}" alt="thumb">
                            </a>
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li class="reading-time">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                            <path d="m618.924-298.924 42.152-42.152-151.077-151.087V-680h-59.998v212.154l168.923 168.922ZM480.067-100.001q-78.836 0-148.204-29.92-69.369-29.92-120.682-81.21-51.314-51.291-81.247-120.629-29.933-69.337-29.933-148.173t29.92-148.204q29.92-69.369 81.21-120.682 51.291-51.314 120.629-81.247 69.337-29.933 148.173-29.933t148.204 29.92q69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173t-29.92 148.204q-29.92 69.369-81.21 120.682-51.291 51.314-120.629 81.247-69.337 29.933-148.173 29.933ZM480-480Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                                        </svg>
                                        <span class="post-meta-text">10 Minutes</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                            <path d="M488.768-117.847Q470.922-100.001 446-100.001t-42.768-17.846l-286-286q-17.231-17.231-17.038-42.653.192-25.422 17.807-43.037l352-352.616q8.317-8.179 19.658-13.012 11.341-4.834 23.726-4.834h286q24.537 0 42.268 17.731 17.73 17.73 17.73 42.268v286q0 12.826-4.961 24.143-4.962 11.318-13.654 20.01l-352 352Zm210.571-532.154q20.815 0 35.43-14.57 14.615-14.57 14.615-35.384t-14.57-35.429q-14.57-14.615-35.384-14.615t-35.429 14.57q-14.616 14.57-14.616 35.429t14.616 35.384q14.57 14.57 35.429 14.57Z" />
                                        </svg>
                                        <span class="post-meta-text">{{ $blogp->read_time }} Minutes</span>
                                    </li>
                                </ul>
                                <h4>
                                    <a href="{{ route('frontend.blog_detail', $blogp->slug) }}" class="post-title">{{ $blogp->title }}</a>
                                </h4>
                                <p>{!! Str::limit(strip_tags($blogp->description), 150) !!}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

