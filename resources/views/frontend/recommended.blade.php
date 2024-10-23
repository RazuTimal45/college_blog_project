@extends('frontend.includes.section')
{{-- @section('meta-keywords')
    @if (isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else RazuBlogg - Best Blogging site @endif
@endsection
@section('meta-description')
    @if (isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else RazuBlogg is best blogging site. This sites helps in collection of blogs. @endif
@endsection --}}
@section('title', 'Home')
@section('main-section')


    <section class="page-header">
        <div class="container">
            <div class="page-content-wrap">
                <div class="page-content">
                    <h4>Archives</h4>
                    <h2>Recommended For You<span>{{ count($data['recommended']) }} Posts</span></h2>
                    <p>Embark on a journey through the vibrant world of sustainable fashion, where innovation meets ethics
                        and style.</p>
                </div>
            </div>
        </div>
    </section>
    <!--/.page-header-->

    <section class="archive-page padding">
        <div class="container">
            <div class="row gy-4">

            <div class="row gy-4">
    @forelse($data['recommended'] as $blog)
        <article class="col-lg-4 col-md-6 position-relative">
            <div class="post-card img-hover-move">
                <div class="post-thumb media">
                    <a href="{{ route('frontend.blog_detail', $blog->slug) }}">
                        <img src="{{ asset('images/posts/' . $blog->image) }}" alt="thumb">
                    </a>
                    <div class="image-post-content px-4 py-2">
                        <ul class="post-meta">
                            @foreach ($blog->categories as $category)
                                <li>{{ $category->name }}</li>
                                @if (!$loop->last)
                                    <li class="sep"></li>
                                @endif
                            @endforeach
                            <li class="sep"></li>
                            <li><a href="#" class="date">{{ $blog->created_at->format('d.m.Y') }}</a></li>
                        </ul>
                        <h3>
                            <a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="text-hover">{{ $blog->title }}</a>
                        </h3>
                        <a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="read-more">Continue Reading</a>
                    </div>
                </div>
            </div>
        </article>
    @empty
        <p>No blogs found.</p>
    @endforelse
</div>
            </div>
         
        </div>
    </section>

@endsection
