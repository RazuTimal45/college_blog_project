    <div class="site-preloader">
        <div class="loader-text" data-text="RazuBlogg">RazuBlogg</div>
    </div>
   

    <header class="main-header">
        <div class="top-header">
            <div class="container">
                <div class="top-header-inner">
                    <div class="top-left">
                        <div class="ticker-wrap">
                            <div class="ticker-title">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path d="M420.001-143.082v-276.919H307.694v-439.998H653.46l-73.461 255.768h158.076L420.001-143.082Z" />
                                </svg><span>Trending:</span></div>
                            <div class="ticker-slide-wrap">
                                <div class="swiper ticker-slider">
                                    <div class="swiper-wrapper">
                                    @forelse($data['trending'] as $trending)
                                        <div class="swiper-slide">
                                            <a href="single.html">{{ $trending->message }}</a>
                                        </div>
                                    @empty
                                    @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-right">
                        <ul class="top-right-info">
                            <li><a href="mailto:razublogg@info.com">razublogg@info.com</a></li>
                            <li><a href="tel:+123456789">+123 456 789</a></li>
                        </ul>
                        <ul class="header-social">
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"
                                        />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                                        />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                    </svg>
                                </a>
                            </li>
                           <li style="position: relative;">
                                <a href="#">
                                    <div style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border: 2px solid #fff; border-radius: 50%;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="48" height="48" fill="#007bff">
                                            <path d="M320 256c70.7 0 128-57.3 128-128S390.7 0 320 0 192 57.3 192 128s57.3 128 128 128zm0 32c-86.3 0-256 43.1-256 128v32c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32v-32c0-84.9-169.7-128-256-128z" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="dropdown" style="display: none; position: absolute; top: 100%; left: 0; background-color: white; border: 1px solid #ccc; border-radius: 5px; padding: 10px; z-index: 10;">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.top-header -->
        <div class="bottom-header">
            <div class="container">
                <div class="main-header-wapper">
                    <div class="site-logo">
                        <a href="index-2.html"><span class="site-title">RazuBlogg</span></a>
                    </div>
                    <div class="main-header-info">
                        <div class="header-menu-wrap">
                        <ul class="nav-menu">
                            <li>
                                <a href="{{ request()->routeIs('frontend.index') ? 'javascript:;' : route('frontend.index') }}" data-text="Home">Home</a>
                            </li>
                            <li>
                                <a href="{{ request()->routeIs('frontend.popular_blogs') ? 'javascript:;' : route('frontend.popular_blogs') }}" data-text="Popular Blogs">Popular Blogs</a>
                            </li>
                            <li>
                                <a href="{{ request()->routeIs('frontend.recommended') ? 'javascript:;' : route('frontend.recommended') }}" data-text="Recommended Blogs">Recommended Blogs</a>
                            </li>
                            <li>
                                <a href="{{ request()->routeIs('frontend.about') ? 'javascript:;' : route('frontend.about') }}" data-text="About">About</a>
                            </li>
                            {{-- <li>
                                <a href="blog-standard.html" data-text="Post Layout">Post Layout</a>
                                <ul>
                                    <li><a href="blog-standard.html">Standard</a></li>
                                    <li><a href="blog-grid.html">Grid Layout</a></li>
                                    <li><a href="blog-list.html">List Layout</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="single.html" data-text="Post Formats">Post Formats</a>
                                <ul>
                                    <li><a href="single.html">Standard</a></li>
                                    <li><a href="single-gallery.html">Gallery</a></li>
                                    <li><a href="single-left-sidebar.html">Left Sidebar</a></li>
                                    <li><a href="single-right-sidebar.html">Right Sidebar</a></li>
                                    <li><a href="single-video.html">Video</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                        </div>
                        <div class="menu-right-item d-flex align-items-center">
                    <form id="searchForm" style="width: 200px; display: flex;">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="searchInput" name="keyword" class="form-control" placeholder="Search..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="btnSearch">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14.811 14.811">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(-2.25 -2.25)">
                                            <circle cx="5.5" cy="5.5" r="5.5" data-name="Ellipse 7" transform="translate(3 3)"></circle>
                                            <path d="m16 16-3.142-3.142"></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                            <button class="mobile-menu-action ms-2">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <a href="{{ request()->routeIs('frontend.contact') ? 'javascript:;' : route('frontend.contact') }}" class="default-btn ms-2" data-text="Contact">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @section('css')
        <style>
            .dropdown {
                display: none;
            }
            li:hover .dropdown {
                display: block;
            }
            .dropdown li {
                list-style: none;
            }
            .dropdown a {
                display: block; 
                padding: 10px; 
                text-decoration: none; 
                color: #333; 
            }
            .dropdown a:hover {
                background-color: #007bff;
                color: white;
            }
        </style>
    @endsection
    @section('js')
    <script>
    $(document).ready(function() {
    $('#btnSearch').on('click', function(event) {
        event.preventDefault(); 

        const keyword = $('#searchInput').val().trim();

        if (keyword === '') {
            alert('Please enter a search keyword');
            return;
        }

        $.ajax({
            url: '{{ route('posts.search') }}',
            method: 'GET',
            data: { keyword: keyword, _token: $('input[name="_token"]').val() },
            success: function(response) {
                displayResults(response);
            },
            error: function(xhr, status, error) {
                console.error('Search failed: ', xhr);
                alert('An error occurred while searching: ' + xhr.status + ' ' + xhr.statusText);
            }
        });
    });

    function displayResults(posts) {
        const resultsContainer = $('#resultsContainer');
        resultsContainer.empty(); 

        if (posts.length === 0) {
            resultsContainer.append('<p>No results found.</p>');
            return;
        }

        posts.forEach(post => {
            resultsContainer.append(`<div><h2>${post.title}</h2><p>${post.content}</p></div>`);
        });
    }
});
    </script>
    @endsection
