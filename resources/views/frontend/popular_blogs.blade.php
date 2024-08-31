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
                    <h2>Popular Blogs<span>15 Posts</span></h2>
                    <p>Embark on a journey through the vibrant world of sustainable fashion, where innovation meets ethics and style.</p>
                </div>
            </div>
        </div>
    </section>
  
    
    <section class="archive-page padding">
        <div class="container">
            <div class="row gy-4">
            @forelse($data['blogs'] as $blog)
                <article class="col-lg-4 col-md-6 position-relative">
                    <div class="post-card image-post img-hover-move">
                        <div class="post-thumb media">
                            <a href="single.html">
                                <img src="assets/img/post-7.jpg" alt="thumb">
                            </a>
                            <div class="image-post-content">
                                <ul class="post-meta">
                                    @foreach($blog->categories as $category)
                                        <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                                        @if(!$loop->last)
                                            <li class="sep"></li>
                                        @endif
                                    @endforeach
                                    <li class="sep"></li>
                                    <li><a href="category.html" class="date">{{ $blog->created_at->format('d.m.Y') }}</a></li>
                                </ul>
                                <h3><a href="{{ route('frontend.blog_detail',$blog->slug) }}" class="text-hover">{{ $blog->title }}</a></h3>
                                <a href="{{ route('frontend.blog_detail',$blog->slug) }}" class="read-more">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <p>No blogs found.</p>
            @endforelse     
            </div>
            <ul class="pagination-wrap justify-content-center">
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="currentColor"><path d="m553.846-253.847-42.153-43.384 152.77-152.77H180.001v-59.998h484.462l-152.77-152.77 42.153-43.384L779.999-480 553.846-253.847Z"></path></svg></a></li>
            </ul>           
        </div>
    </section>

@endsection