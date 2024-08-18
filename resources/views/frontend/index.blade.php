@extends('frontend.includes.section')
{{-- @section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else RazuBlogg - Best Blogging site @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else RazuBlogg is best blogging site. This sites helps in collection of blogs. @endif
@endsection --}}
@section('title','Home')
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
    <!--/.popup-search-box-->

    <div id="searchbox-overlay"></div>
    <!--/.searchbox-overlay-->
@if($data['blogs']->isNotEmpty() && count($data['blogs'])>0)
    <section class="featured-post">
        <div class="featured-post-wrap">
            <div class="swiper featured-post-carousel">
                <div class="swiper-wrapper">
                @forelse($data['blogs'] as $blog)
                    <div class="swiper-slide slide-size-m dl-drag-cursor">
                        <div class="featured-post-card img-hover-scale">
                            <div class="post-card-inner">
                                <div class="featured-post-thumb media">
                                @foreach($blog->categories as $categorylist)                                        
                                    <a href="{{ route('frontend.blog_detail',$blog->slug) }}" class="featured-post-cat">{{ $categorylist->name }}</a>
                                @endforeach
                                  <a href="{{ route('frontend.blog_detail',$blog->slug) }}"><img src="{{asset('images/posts/'.$blog->image)}}" alt="{{ $blog->title }}"></a>
                                </div>
                                <div class="featured-post-info">
                                    <div class="featured-post-meta">
                                        <ul class="post-meta">
                                            <li><a href="single.html">{{$blog->user->name}}</a></li>
                                            <li class="sep"></li>
                                            <li><a class="date" href="archive.html">{{ \Carbon\Carbon::parse($blog->date)->format("d F, Y") }}</a></li>
                                        </ul>
                                    </div>
                                    <h2><a href="{{ route('frontend.blog_detail',$blog->slug) }}" class="text-hover">{!! Str::limit(($blog->description),100,"...")!!}</a></h2>
                                    <a href="{{ route('frontend.blog_detail',$blog->slug) }}" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="swiper-slide slide-size-xl dl-drag-cursor">
                        <div class="featured-post-card img-hover-scale">
                            <div class="post-card-inner">
                                <div class="featured-post-thumb media">
                                    <a href="category.html" class="featured-post-cat">Studies</a>
                                    <img src="{{asset('assets/frontend/assets/img/post-2.jpg')}}" alt="img">
                                </div>
                                <div class="featured-post-info">
                                    <div class="featured-post-meta">
                                        <div class="author-thumb">
                                            <a href="single.html"><img src="{{asset('assets/frontend/assets/img/author-2.jpg')}}" alt="author"></a>
                                        </div>
                                        <ul class="post-meta">
                                            <li><a href="author.html">Josep Cawford</a></li>
                                            <li class="sep"></li>
                                            <li><a class="date" href="author.html">08.06.2024</a></li>
                                        </ul>
                                    </div>
                                    <h2><a href="single.html" class="text-hover">Examining the impact of COP28's big comforable step</a></h2>
                                    <a href="single.html" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide-size-xs dl-drag-cursor">
                        <div class="featured-post-card img-hover-scale">
                            <div class="post-card-inner">
                                <div class="featured-post-thumb media">
                                    <a href="category.html" class="featured-post-cat">Food</a>
                                    <img src="{{asset('assets/frontend/assets/img/post-4.jpg')}}" alt="img">
                                </div>
                                <div class="featured-post-info">
                                    <div class="featured-post-meta">
                                        <div class="author-thumb">
                                            <a href="single.html"><img src="{{asset('assets/frontend/assets/img/author-3.jpg')}}" alt="author"></a>
                                        </div>
                                        <ul class="post-meta">
                                            <li><a href="author.html">Patsy Hamlin</a></li>
                                            <li class="sep"></li>
                                            <li><a class="date" href="author.html">09.05.2024</a></li>
                                        </ul>
                                    </div>
                                    <h2><a href="single.html" class="text-hover">2023 confirmed as world's hottest year on record</a></h2>
                                    <a href="single.html" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide-size-l dl-drag-cursor">
                        <div class="featured-post-card img-hover-scale">
                            <div class="post-card-inner">
                                <div class="featured-post-thumb media">
                                    <a href="category.html" class="featured-post-cat">Fashion</a>
                                    <img src="{{asset('assets/frontend/assets/img/post-3.jpg')}}" alt="img">
                                </div>
                                <div class="featured-post-info">
                                    <div class="featured-post-meta">
                                        <div class="author-thumb">
                                            <a href="single.html"><img src="{{asset('assets/frontend/assets/img/author-4.jpg')}}" alt="author"></a>
                                        </div>
                                        <ul class="post-meta">
                                            <li><a href="author.html">Dustin Hanks</a></li>
                                            <li class="sep"></li>
                                            <li><a class="date" href="author.html">08.03.2024</a></li>
                                        </ul>
                                    </div>
                                    <h2><a href="author.html" class="text-hover">Four new emperor penguin groups found by satellite</a></h2>
                                    <a href="author.html" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slide-size-s dl-drag-cursor">
                        <div class="featured-post-card img-hover-scale">
                            <div class="post-card-inner">
                                <div class="featured-post-thumb media">
                                    <a href="category.html" class="featured-post-cat">Lifestyle</a>
                                    <img src="{{asset('assets/frontend/assets/img/post-5.jpg')}}" alt="img">
                                </div>
                                <div class="featured-post-info">
                                    <div class="featured-post-meta">
                                        <div class="author-thumb">
                                            <a href="single.html"><img src="{{asset('assets/frontend/assets/img/author-5.jpg')}}" alt="author"></a>
                                        </div>
                                        <ul class="post-meta">
                                            <li><a href="single.html">Robert Duran</a></li>
                                            <li class="sep"></li>
                                            <li><a class="date" href="single.html">05.02.2024</a></li>
                                        </ul>
                                    </div>
                                    <h2><a href="single.html" class="text-hover">European mission approved to detect cosmic ripples</a></h2>
                                    <a href="single.html" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @empty
                    @endforelse
                </div>
            </div>
            <!-- /.featured-carousel  -->
        </div>
    </section>
    @endif
    <!--/.featured-post-->
@if($data['categories']->isNotEmpty() && count($data['categories'])>0)
    <section class="category-section padding">
        <div class="container">
            <div class="section-heading mb-40 text-center">
                <h2>Featured Categories</h2>
                <p>Discover tips, insights, and inspiration to embrace impact on the planet.</p>
            </div>
            <div class="row">
                <div class="featured-category">
                @forelse($data['categories'] as $category)
                    <div class="category-card img-hover-move">
                        <a href="#" class="cat-thumb media">
                            <img src="{{asset('/images/categories/'.$category->image)}}" alt="{{$category->name}}">
                            <div class="cat-text">{{ $category->name }}</div>
                        </a>
                    </div>
                    @empty
                    @endforelse
                    {{-- <div class="category-card img-hover-move">
                        <a href="category.html" class="cat-thumb media">
                            <img src="{{asset('assets/frontend/assets/img/post-2.jpg')}}" alt="cat">
                            <div class="cat-text">Studies</div>
                        </a>
                    </div>
                    <div class="category-card img-hover-move">
                        <a href="category.html" class="cat-thumb media">
                            <img src="{{asset('assets/frontend/assets/img/post-3.jpg')}}" alt="cat">
                            <div class="cat-text">Food</div>
                        </a>
                    </div>
                    <div class="category-card img-hover-move">
                        <a href="category.html" class="cat-thumb media">
                            <img src="{{asset('assets/frontend/assets/img/post-4.jpg')}}" alt="cat">
                            <div class="cat-text">Fashion</div>
                        </a>
                    </div>
                    <div class="category-card img-hover-move">
                        <a href="category.html" class="cat-thumb media">
                            <img src="{{asset('assets/frontend/assets/img/post-5.jpg')}}" alt="cat">
                            <div class="cat-text">Photos</div>
                        </a>
                    </div>
                    <div class="category-card img-hover-move">
                        <a href="category.html" class="cat-thumb media">
                            <img src="{{asset('assets/frontend/assets/img/post-6.jpg')}}" alt="cat">
                            <div class="cat-text">Lifestyle</div>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--/.category-section-->

    <div class="post-layout bg-light-red padding">
        <div class="container">
            <div class="post-layout-1">
                <article class="post-layout-item img-hover-move">
                    <a href="single.html" class="post-thumb media"><img src="{{asset('assets/frontend/assets/img/post-1.jpg')}}" alt="thumb"></a>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li class="reading-time">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="m618.924-298.924 42.152-42.152-151.077-151.087V-680h-59.998v212.154l168.923 168.922ZM480.067-100.001q-78.836 0-148.204-29.92-69.369-29.92-120.682-81.21-51.314-51.291-81.247-120.629-29.933-69.337-29.933-148.173t29.92-148.204q29.92-69.369 81.21-120.682 51.291-51.314 120.629-81.247 69.337-29.933 148.173-29.933t148.204 29.92q69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173t-29.92 148.204q-29.92 69.369-81.21 120.682-51.291 51.314-120.629 81.247-69.337 29.933-148.173 29.933ZM480-480Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                    />
                                </svg>
                                <span class="post-meta-text">10 Minutes</span>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="M488.768-117.847Q470.922-100.001 446-100.001t-42.768-17.846l-286-286q-17.231-17.231-17.038-42.653.192-25.422 17.807-43.037l352-352.616q8.317-8.179 19.658-13.012 11.341-4.834 23.726-4.834h286q24.537 0 42.268 17.731 17.73 17.73 17.73 42.268v286q0 12.826-4.961 24.143-4.962 11.318-13.654 20.01l-352 352Zm210.571-532.154q20.815 0 35.43-14.57 14.615-14.57 14.615-35.384t-14.57-35.429q-14.57-14.615-35.384-14.615t-35.429 14.57q-14.616 14.57-14.616 35.384t14.57 35.429q14.57 14.615 35.384 14.615ZM446.172-160l353.213-354v-286H513.212L160-446l286.172 286Zm353.213-640Z"
                                    />
                                </svg>
                                <a href="category.html" class="post-meta-text">Studies</a>
                            </li>
                        </ul>
                        <h3><a href="single.html" class="text-hover">Enter the dragon crowds roar in lunar new year 2024</a></h3>
                        <ul class="author-info">
                            <li>
                                <a href="#"><img src="{{asset('assets/frontend/assets/img/author-1.jpg')}}" alt="thumb"></a>
                            </li>
                            <li>
                                <a href="#">Félix Lengyel</a>
                                <a href="#">01.05.2024</a>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="post-layout-item img-hover-move">
                    <a href="single.html" class="post-thumb media"><img src="{{asset('assets/frontend/assets/img/post-2.jpg')}}" alt="thumb"></a>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li class="reading-time">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="m618.924-298.924 42.152-42.152-151.077-151.087V-680h-59.998v212.154l168.923 168.922ZM480.067-100.001q-78.836 0-148.204-29.92-69.369-29.92-120.682-81.21-51.314-51.291-81.247-120.629-29.933-69.337-29.933-148.173t29.92-148.204q29.92-69.369 81.21-120.682 51.291-51.314 120.629-81.247 69.337-29.933 148.173-29.933t148.204 29.92q69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173t-29.92 148.204q-29.92 69.369-81.21 120.682-51.291 51.314-120.629 81.247-69.337 29.933-148.173 29.933ZM480-480Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                    />
                                </svg>
                                <span class="post-meta-text">15 Minutes</span>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="M488.768-117.847Q470.922-100.001 446-100.001t-42.768-17.846l-286-286q-17.231-17.231-17.038-42.653.192-25.422 17.807-43.037l352-352.616q8.317-8.179 19.658-13.012 11.341-4.834 23.726-4.834h286q24.537 0 42.268 17.731 17.73 17.73 17.73 42.268v286q0 12.826-4.961 24.143-4.962 11.318-13.654 20.01l-352 352Zm210.571-532.154q20.815 0 35.43-14.57 14.615-14.57 14.615-35.384t-14.57-35.429q-14.57-14.615-35.384-14.615t-35.429 14.57q-14.616 14.57-14.616 35.384t14.57 35.429q14.57 14.615 35.384 14.615ZM446.172-160l353.213-354v-286H513.212L160-446l286.172 286Zm353.213-640Z"
                                    />
                                </svg>
                                <a href="category.html" class="post-meta-text">Fashion</a>
                            </li>
                        </ul>
                        <h3><a href="single.html" class="text-hover">Stake in michael jackson catalogue sells $600m</a></h3>
                        <ul class="author-info">
                            <li>
                                <a href="#"><img src="{{asset('assets/frontend/assets/img/author-2.jpg')}}" alt="thumb"></a>
                            </li>
                            <li>
                                <a href="#">Joseph Crawford</a>
                                <a href="#">01.05.2024</a>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="post-layout-item img-hover-move">
                    <a href="single.html" class="post-thumb media"><img src="{{asset('assets/frontend/assets/img/post-3.jpg')}}" alt="thumb"></a>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li class="reading-time">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="m618.924-298.924 42.152-42.152-151.077-151.087V-680h-59.998v212.154l168.923 168.922ZM480.067-100.001q-78.836 0-148.204-29.92-69.369-29.92-120.682-81.21-51.314-51.291-81.247-120.629-29.933-69.337-29.933-148.173t29.92-148.204q29.92-69.369 81.21-120.682 51.291-51.314 120.629-81.247 69.337-29.933 148.173-29.933t148.204 29.92q69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173t-29.92 148.204q-29.92 69.369-81.21 120.682-51.291 51.314-120.629 81.247-69.337 29.933-148.173 29.933ZM480-480Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                    />
                                </svg>
                                <span class="post-meta-text">20 Minutes</span>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="M488.768-117.847Q470.922-100.001 446-100.001t-42.768-17.846l-286-286q-17.231-17.231-17.038-42.653.192-25.422 17.807-43.037l352-352.616q8.317-8.179 19.658-13.012 11.341-4.834 23.726-4.834h286q24.537 0 42.268 17.731 17.73 17.73 17.73 42.268v286q0 12.826-4.961 24.143-4.962 11.318-13.654 20.01l-352 352Zm210.571-532.154q20.815 0 35.43-14.57 14.615-14.57 14.615-35.384t-14.57-35.429q-14.57-14.615-35.384-14.615t-35.429 14.57q-14.616 14.57-14.616 35.384t14.57 35.429q14.57 14.615 35.384 14.615ZM446.172-160l353.213-354v-286H513.212L160-446l286.172 286Zm353.213-640Z"
                                    />
                                </svg>
                                <a href="category.html" class="post-meta-text">Travel</a>
                            </li>
                        </ul>
                        <h3><a href="single.html" class="text-hover">Fireball blazes across hawaii as object falls to earth</a></h3>
                        <p>Mr Trump, the favourite to run again as the Republican candidate in this year presidential election, has long been critical of Nato and what he sees as an excessive financial burden on the united states nations.</p>
                        <ul class="author-info">
                            <li>
                                <a href="#"><img src="{{asset('assets/frontend/assets/img/author-3.jpg')}}" alt="thumb"></a>
                            </li>
                            <li>
                                <a href="#">Patsy Hamlin</a>
                                <a href="#">01.05.2024</a>
                            </li>
                            <li class="share-icon">
                                <div class="share">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                        <path d="M720.045-90q-45.814 0-77.929-32.084-32.115-32.083-32.115-77.916 0-7.49 1.192-15.514 1.192-8.025 3.577-14.794L318.923-403.539q-15.846 15.769-36.077 24.654-20.231 8.884-42.846 8.884-45.833 0-77.916-32.07t-32.083-77.884q0-45.814 32.083-77.929T240-589.999q22.615 0 42.846 8.884 20.231 8.885 36.077 24.654L614.77-729.692q-2.385-6.769-3.577-14.794-1.192-8.024-1.192-15.514 0-45.833 32.07-77.916t77.884-32.083q45.814 0 77.929 32.07t32.115 77.884q0 45.814-32.083 77.929T720-650.001q-22.615 0-42.846-8.884-20.231-8.885-36.077-24.654L345.23-510.308q2.385 6.769 3.577 14.767 1.192 7.997 1.192 15.461 0 7.465-1.192 15.542t-3.577 14.846l295.847 173.231q15.846-15.769 36.077-24.654 20.231-8.884 42.846-8.884 45.833 0 77.916 32.07t32.083 77.884q0 45.814-32.07 77.929t-77.884 32.115ZM720-710q20.846 0 35.424-14.577 14.577-14.578 14.577-35.424t-14.577-35.424Q740.846-810.001 720-810.001t-35.424 14.577Q669.999-780.846 669.999-760t14.577 35.424q14.578 14.577 35.424 14.577Zm-480 280q20.846 0 35.424-14.577 14.577-14.578 14.577-35.424t-14.577-35.424Q260.846-530.001 240-530.001t-35.424 14.577Q189.999-500.846 189.999-480t14.577 35.424q14.578 14.577 35.424 14.577Zm480 280q20.846 0 35.424-14.577 14.577-14.578 14.577-35.424t-14.577-35.424Q740.846-250.001 720-250.001t-35.424 14.577Q669.999-220.846 669.999-200t14.577 35.424q14.578 14.577 35.424 14.577ZM720-760ZM240-480Zm480 280Z"
                                        />
                                    </svg>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor">
                                                    <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" fill="currentColor">
                                                    <path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"
                                                    />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                                                    <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
                                                    />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--/.social-share-->
                                </div>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="post-layout-item format-gallary">
                    <div class="post-slider-wrap">
                        <div class="swiper gallary-post-slider carousel-pagination">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="{{asset('assets/frontend/assets/img/post-4.jpg')}}" alt="img"></div>
                                <div class="swiper-slide"><img src="{{asset('assets/frontend/assets/img/post-12.jpg')}}" alt="img"></div>
                                <div class="swiper-slide"><img src="{{asset('assets/frontend/assets/img/post-13.jpg')}}" alt="img"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li class="reading-time">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="m618.924-298.924 42.152-42.152-151.077-151.087V-680h-59.998v212.154l168.923 168.922ZM480.067-100.001q-78.836 0-148.204-29.92-69.369-29.92-120.682-81.21-51.314-51.291-81.247-120.629-29.933-69.337-29.933-148.173t29.92-148.204q29.92-69.369 81.21-120.682 51.291-51.314 120.629-81.247 69.337-29.933 148.173-29.933t148.204 29.92q69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173t-29.92 148.204q-29.92 69.369-81.21 120.682-51.291 51.314-120.629 81.247-69.337 29.933-148.173 29.933ZM480-480Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                    />
                                </svg>
                                <span class="post-meta-text">25 Minutes</span>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="M488.768-117.847Q470.922-100.001 446-100.001t-42.768-17.846l-286-286q-17.231-17.231-17.038-42.653.192-25.422 17.807-43.037l352-352.616q8.317-8.179 19.658-13.012 11.341-4.834 23.726-4.834h286q24.537 0 42.268 17.731 17.73 17.73 17.73 42.268v286q0 12.826-4.961 24.143-4.962 11.318-13.654 20.01l-352 352Zm210.571-532.154q20.815 0 35.43-14.57 14.615-14.57 14.615-35.384t-14.57-35.429q-14.57-14.615-35.384-14.615t-35.429 14.57q-14.616 14.57-14.616 35.384t14.57 35.429q14.57 14.615 35.384 14.615ZM446.172-160l353.213-354v-286H513.212L160-446l286.172 286Zm353.213-640Z"
                                    />
                                </svg>
                                <a href="category.html" class="post-meta-text">Photos</a>
                            </li>
                        </ul>
                        <h3><a href="single.html" class="text-hover">The scuzzy new york club that gave birth to punk</a></h3>
                        <ul class="author-info">
                            <li>
                                <a href="#"><img src="{{asset('assets/frontend/assets/img/author-4.jpg')}}" alt="thumb"></a>
                            </li>
                            <li>
                                <a href="#">Dustin Hanks</a>
                                <a href="#">01.05.2024</a>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="post-layout-item img-hover-move">
                    <a href="single.html" class="post-thumb media"><img src="{{asset('assets/frontend/assets/img/post-5.jpg')}}" alt="thumb"></a>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li class="reading-time">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="m618.924-298.924 42.152-42.152-151.077-151.087V-680h-59.998v212.154l168.923 168.922ZM480.067-100.001q-78.836 0-148.204-29.92-69.369-29.92-120.682-81.21-51.314-51.291-81.247-120.629-29.933-69.337-29.933-148.173t29.92-148.204q29.92-69.369 81.21-120.682 51.291-51.314 120.629-81.247 69.337-29.933 148.173-29.933t148.204 29.92q69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173t-29.92 148.204q-29.92 69.369-81.21 120.682-51.291 51.314-120.629 81.247-69.337 29.933-148.173 29.933ZM480-480Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                    />
                                </svg>
                                <span class="post-meta-text">30 Minutes</span>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="M488.768-117.847Q470.922-100.001 446-100.001t-42.768-17.846l-286-286q-17.231-17.231-17.038-42.653.192-25.422 17.807-43.037l352-352.616q8.317-8.179 19.658-13.012 11.341-4.834 23.726-4.834h286q24.537 0 42.268 17.731 17.73 17.73 17.73 42.268v286q0 12.826-4.961 24.143-4.962 11.318-13.654 20.01l-352 352Zm210.571-532.154q20.815 0 35.43-14.57 14.615-14.57 14.615-35.384t-14.57-35.429q-14.57-14.615-35.384-14.615t-35.429 14.57q-14.616 14.57-14.616 35.384t14.57 35.429q14.57 14.615 35.384 14.615ZM446.172-160l353.213-354v-286H513.212L160-446l286.172 286Zm353.213-640Z"
                                    />
                                </svg>
                                <a href="category.html" class="post-meta-text">Lifestyle</a>
                            </li>
                        </ul>
                        <h3><a href="single.html" class="text-hover">The planespotter angering taylor swift and elon</a></h3>
                        <ul class="author-info">
                            <li>
                                <a href="#"><img src="{{asset('assets/frontend/assets/img/author-5.jpg')}}" alt="thumb"></a>
                            </li>
                            <li>
                                <a href="#">Robert Duran</a>
                                <a href="#">01.05.2024</a>
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <!--/.post-layout-->

    <section class="main-post-area padding">
        <div class="container">
            <div class="row gy-5 gy-lg-0 main-area">
                <div class="col-lg-8">
                    <div class="main-post-wrap">
                        <div class="post-wrap-heading">
                            <h3><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                    <path d="M420.001-143.082v-276.919H307.694v-439.998H653.46l-73.461 255.768h158.076L420.001-143.082Z"></path>
                                </svg><span>Latest Stories</span>
                            </h3>
                        </div>
                        <div class="row gy-4">
                            <article class="col-md-6 position-relative">
                                <div class="post-card image-post img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="single.html">
                                            <img src="{{asset('assets/frontend/assets/img/post-7.jpg')}}" alt="thumb">
                                        </a>
                                        <div class="image-post-content">
                                            <ul class="post-meta">
                                                <li><a href="category.html">Fashion</a></li>
                                                <li class="sep"></li>
                                                <li><a href="category.html" class="date">04.02.2024</a></li>
                                            </ul>
                                            <h3><a href="single.html" class="text-hover">Haller gives Ivory Coast victory in Afcon final</a></h3>
                                            <a href="single.html" class="read-more">Continue Reading</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="col-md-6">
                                <div class="post-card format-video img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="single.html">
                                            <video autoplay="autoplay" loop="loop" muted="muted" playsinline="">
                                                <source src="{{asset('assets/frontend/assets/video/travel.mp4')}}">
                                            </video>
                                        </a>
                                        <a class="video-popup venobox" data-vbtype="video" href="https://www.youtube.com/watch?v=ZLaG1migE00">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                <path d="M181.925-180.001q-30.308 0-51.308-21-20.999-21-20.999-51.308v-455.382q0-30.308 20.999-51.308 21-21 51.308-21h455.382q30.308 0 51.308 21t21 51.308v183.077l140.767-140.768v370.764L709.615-435.386v183.077q0 30.308-21 51.308t-51.308 21H181.925Zm0-59.999h455.382q5.386 0 8.847-3.462 3.462-3.462 3.462-8.847v-455.382q0-5.385-3.462-8.847-3.461-3.462-8.847-3.462H181.925q-5.385 0-8.847 3.462-3.462 3.462-3.462 8.847v455.382q0 5.385 3.462 8.847Q176.54-240 181.925-240Zm-12.309 0v-480 480Z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><a href="category.html">Travel</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">02.08.2024</a></li>
                                        </ul>
                                        <h3><a href="single.html" class="text-hover">Enjoy the best afternoon at Canggu, Bali, Indonesia.</a></h3>
                                        <p>Explore the world journey through captivating stories insightful and inspiring your experience.</p>
                                        <ul class="post-card-footer">
                                            <li><a href="single.html" class="read-more">Continue Reading</a></li>
                                            <li>
                                                <a href="#" class="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                        <path d="M250.001-410.001h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm609.998 531.537L718.461-260.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v669.227ZM172.309-320h571.69L800-264.615v-523.076q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846H172.309q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846ZM160-320V-800v480Z"
                                                        />
                                                    </svg><span>02</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="col-md-6">
                                <div class="post-card format-audio img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="single.html">
                                            <img src="{{asset('assets/frontend/assets/img/post-9.jpg')}}" alt="thumb">
                                        </a>
                                        <div class="audio-player">
                                            <audio controls>
                                                <source src="{{asset('assets/frontend/assets/audio/music.mp3')}}">
                                            </audio>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><a href="category.html">Lifestyle</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">05.07.2024</a></li>
                                        </ul>
                                        <h3><a href="single.html" class="text-hover">In this Austrian town, extreme sports are king</a></h3>
                                        <p>Explore the world journey through captivating stories insightful and inspiring your experience.</p>
                                        <ul class="post-card-footer">
                                            <li><a href="single.html" class="read-more">Continue Reading</a></li>
                                            <li>
                                                <a href="#" class="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                        <path d="M250.001-410.001h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm609.998 531.537L718.461-260.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v669.227ZM172.309-320h571.69L800-264.615v-523.076q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846H172.309q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846ZM160-320V-800v480Z"
                                                        />
                                                    </svg><span>04</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="col-md-6">
                                <div class="post-card img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="single.html">
                                            <img src="{{asset('assets/frontend/assets/img/post-10.jpg')}}" alt="thumb">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><a href="category.html">Sports</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">01.09.2024</a></li>
                                        </ul>
                                        <h3><a href="single.html" class="text-hover">Mexico's controversial new $28.5bn tourist train</a></h3>
                                        <p>Explore the world journey through captivating stories insightful and inspiring your experience.</p>
                                        <ul class="post-card-footer">
                                            <li><a href="single.html" class="read-more">Continue Reading</a></li>
                                            <li>
                                                <a href="#" class="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                        <path d="M250.001-410.001h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm609.998 531.537L718.461-260.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v669.227ZM172.309-320h571.69L800-264.615v-523.076q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846H172.309q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846ZM160-320V-800v480Z"
                                                        />
                                                    </svg><span>05</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="col-md-12">
                                <div class="post-card full-width-post img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="single.html">
                                            <img src="{{asset('assets/frontend/assets/img/post-11.jpg')}}" alt="thumb">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><a href="category.html">Fashion</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">01.09.2024</a></li>
                                        </ul>
                                        <h3><a href="single.html" class="text-hover">Fast fashion helps fuel blazing.</a></h3>
                                        <p>Embark on a journey through the vibrant world of sustainable fashion, where innovation meets ethics and style. Delve into the realm of eco-conscious textiles, ethical production practices, and the evolving landscape
                                            of sustainable design.</p>
                                        <ul class="post-card-footer">
                                            <li><a href="single.html" class="read-more">Continue Reading</a></li>
                                            <li>
                                                <a href="#" class="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                        <path d="M250.001-410.001h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm609.998 531.537L718.461-260.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v669.227ZM172.309-320h571.69L800-264.615v-523.076q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846H172.309q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846ZM160-320V-800v480Z"
                                                        />
                                                    </svg><span>05</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="col-md-6">
                                <div class="post-card img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="single.html">
                                            <img src="{{asset('assets/frontend/assets/img/post-12.jpg')}}" alt="thumb">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><a href="category.html">Lifestyle</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">08.02.2024</a></li>
                                        </ul>
                                        <h3><a href="single.html" class="text-hover">French migration row engulfs island in Indian Ocean</a></h3>
                                        <p>Explore the world journey through captivating stories insightful and inspiring your experience.</p>
                                        <ul class="post-card-footer">
                                            <li><a href="single.html" class="read-more">Continue Reading</a></li>
                                            <li>
                                                <a href="#" class="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                        <path d="M250.001-410.001h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm609.998 531.537L718.461-260.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v669.227ZM172.309-320h571.69L800-264.615v-523.076q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846H172.309q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846ZM160-320V-800v480Z"
                                                        />
                                                    </svg><span>04</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="col-md-6">
                                <div class="post-card img-hover-move">
                                    <div class="post-thumb media">
                                        <a href="single.html">
                                            <img src="{{asset('assets/frontend/assets/img/post-13.jpg')}}" alt="thumb">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><a href="category.html">Fashion</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">05.03.2024</a></li>
                                        </ul>
                                        <h3><a href="single.html" class="text-hover">SpaceX blasts private company lunar lander into orbit</a></h3>
                                        <p>Explore the world journey through captivating stories insightful and inspiring your experience.</p>
                                        <ul class="post-card-footer">
                                            <li><a href="single.html" class="read-more">Continue Reading</a></li>
                                            <li>
                                                <a href="#" class="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                                        <path d="M250.001-410.001h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm0-120h459.998v-59.998H250.001v59.998Zm609.998 531.537L718.461-260.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v669.227ZM172.309-320h571.69L800-264.615v-523.076q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846H172.309q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846ZM160-320V-800v480Z"
                                                        />
                                                    </svg><span>05</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <ul class="pagination-wrap">
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                        <path d="m553.846-253.847-42.153-43.384 152.77-152.77H180.001v-59.998h484.462l-152.77-152.77 42.153-43.384L779.999-480 553.846-253.847Z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="sidebar-widget widget">
                            <div class="author-widget">
                                <img class="author-thumb" src="{{asset('assets/frontend/assets/img/author-widget.jpg')}}" alt="author">
                                <div class="author-content">
                                    <h3><a href="#">RazuBlogg</a><span>Blogger</span></h3>
                                    <p>Author of this blog RazuBlogg is a travel enthusiast, writer and photographer.</p>
                                </div>
                            </div>
                        </div>
                        <!--Author Widget-->
                        <div class="sidebar-widget widget">
                            <div class="widget-heading">
                                <h3><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor"><path d="M632.307-140.001q-24.538 0-42.268-17.731-17.73-17.73-17.73-42.268v-167.693q0-24.538 17.73-42.268t42.268-17.73H800q24.538 0 42.268 17.73 17.731 17.73 17.731 42.268V-200q0 24.538-17.731 42.268-17.73 17.731-42.268 17.731H632.307Zm0-59.999H800v-167.693H632.307V-200Zm-532.306-53.847v-59.999h344.615v59.999H100.001Zm532.306-278.462q-24.538 0-42.268-17.73t-17.73-42.268V-760q0-24.538 17.73-42.268 17.73-17.731 42.268-17.731H800q24.538 0 42.268 17.731 17.731 17.73 17.731 42.268v167.693q0 24.538-17.731 42.268-17.73 17.73-42.268 17.73H632.307Zm0-59.998H800V-760H632.307v167.693Zm-532.306-53.847v-59.999h344.615v59.999H100.001Zm616.153 362.308Zm0-392.308Z"/></svg><span>Categories</span></h3>
                                <ul class="widget-category-list">
                                @forelse($data['categories'] as $category)
                                    <li class="img-hover-move">
                                        <a href="#" class="media"><img src="{{asset('/images/categories/'.$category->image)}}" alt="thumb">{{ $category->title }} <span>{{ count($data['categories']) }}</span></a>
                                    </li>
                                    @empty
                                    @endforelse
                                    {{-- <li class="img-hover-move">
                                        <a href="category.html" class="media"><img src="{{asset('assets/frontend/assets/img/post-7.jpg')}}" alt="thumb">Fashion <span>15</span></a>
                                    </li>
                                    <li class="img-hover-move">
                                        <a href="category.html" class="media"><img src="{{asset('assets/frontend/assets/img/post-9.jpg')}}" alt="thumb">Photos <span>85</span></a>
                                    </li>
                                    <li class="img-hover-move">
                                        <a href="category.html" class="media"><img src="{{asset('assets/frontend/assets/img/post-4.jpg')}}" alt="thumb">Lifestyle <span>24</span></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <!--Sidebar Category-->
                        <div class="sidebar-widget widget">
                            <div class="widget-heading">
                                <h3><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor"><path d="M212.309-140.001q-30.308 0-51.308-21t-21-51.308v-535.382q0-30.308 21-51.308t51.308-21h419.229l188.461 188.461v419.229q0 30.308-21 51.308t-51.308 21H212.309Zm0-59.999h535.382q5.385 0 8.847-3.462 3.462-3.462 3.462-8.847V-600H600v-160H212.309q-5.385 0-8.847 3.462-3.462 3.462-3.462 8.847v535.382q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462Zm77.692-100.001h379.998V-360H290.001v59.999Zm0-299.999H480v-59.999H290.001V-600Zm0 149.999h379.998v-59.998H290.001v59.998ZM200-760v160-160 560V-760Z"/></svg><span>Top Stories</span></h3>
                            </div>
                            <div class="widget-post-items">
                                <div class="widget-post-item img-hover-move">
                                    <div class="widget-post-thumb media">
                                        <a href="single.html"><img src="{{asset('assets/frontend/assets/img/post-2.jpg')}}" alt="thumb"></a>
                                    </div>
                                    <div class="widget-post-content">
                                        <h3><a href="single.html" class="text-hover">In this Austrian town, extreme sports king</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="category.html">Fashion</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">04.07.2024</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-post-item img-hover-move">
                                    <div class="widget-post-thumb media">
                                        <a href="single.html"><img src="{{asset('assets/frontend/assets/img/post-2.jpg')}}" alt="thumb"></a>
                                    </div>
                                    <div class="widget-post-content">
                                        <h3><a href="single.html" class="text-hover">In this Austrian town, extreme sports king</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="category.html">Fashion</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">04.07.2024</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-post-item img-hover-move">
                                    <div class="widget-post-thumb media">
                                        <a href="single.html"><img src="{{asset('assets/frontend/assets/img/post-3.jpg')}}" alt="thumb"></a>
                                    </div>
                                    <div class="widget-post-content">
                                        <h3><a href="single.html" class="text-hover">The angering taylor swift and elonsk</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="category.html">Studies</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">06.01.2024</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-post-item img-hover-move">
                                    <div class="widget-post-thumb media">
                                        <a href="single.html"><img src="{{asset('assets/frontend/assets/img/post-4.jpg')}}" alt="thumb"></a>
                                    </div>
                                    <div class="widget-post-content">
                                        <h3><a href="single.html" class="text-hover">How air changes your body and mind</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="category.html">Lifestyle</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">08.05.2024</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-post-item img-hover-move">
                                    <div class="widget-post-thumb media">
                                        <a href="single.html"><img src="{{asset('assets/frontend/assets/img/post-5.jpg')}}" alt="thumb"></a>
                                    </div>
                                    <div class="widget-post-content">
                                        <h3><a href="single.html" class="text-hover">TikTok duo replaces Lin-Manuel Miranda</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="category.html">Photos</a></li>
                                            <li class="sep"></li>
                                            <li><a href="category.html" class="date">01.06.2024</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--List Posts-->
                        <div class="sidebar-widget widget">
                            <div class="widget-subscribe">
                                <div class="subscribe-heading">
                                    <div class="subscribe-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                            <path d="M480-457.694 160-662.309v410q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462h357.692V-180.001H172.309q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h615.382q30.308 0 51.308 21t21 51.308v277.692H800v-232.31L480-457.694ZM480-520l313.846-200H166.154L480-520ZM752.307-64.233 710.539-106l72.616-74H602.308V-240H783.54l-74.001-74.001 42.768-41.768 145.768 145.768L752.307-64.232ZM160-662.309v455.77V-429.999v4.923V-720v57.691Z"
                                            />
                                        </svg>
                                    </div>
                                    <h3>Subscribe to Our blog</h3>
                                </div>
                                <form action="https://html.dynamiclayers.net/dl/vixto/php/mailchimp-subscribe.php" id="ajax_mc_form" class="subscribe-form">
                                    <div class="mc-fields">
                                        <input id="mc_email" class="form-control" type="email" name="mc_email" placeholder="Your Email" required>
                                        <button class="default-btn text-anim" data-text="Subscribe">Subscribe</button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="mc-form-messages" class="alert" role="alert"></div>
                                </form>
                            </div>
                        </div>
                        <!--Subscribe Widget-->
                        <div class="sidebar-widget widget">
                            <div class="widget-banner">
                                <a href="#"><img src="{{asset('assets/frontend/assets/img/sidebar-banner.jpg')}}" alt="banner"></a>
                            </div>
                        </div>
                        <!--Banner Widget-->
                    </div>
                    <!--/.sidebar-area-->
                </div>
            </div>
        </div>
    </section>

@endsection
