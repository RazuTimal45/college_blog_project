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
                    <h2>Popular Blogs<span>  {{ count($data['blogs']) }} Posts</span></h2>
                    <p>Embark on a journey through the vibrant world of sustainable fashion, where innovation meets ethics and style.</p>
                </div>
            </div>
        </div>
    </section>
  
    
<section class="archive-page padding">
    <div class="container">
        @if(isset($data['popular']) && $data['popular']->isNotEmpty())
        
            <div class="row gy-4">
                @forelse($data['popular'] as $blog)
                    <article class="col-lg-4 col-md-6 position-relative">
                        <div class="post-card  img-hover-move">
                            <div class="post-thumb media">
                                <a href="{{ route('frontend.blog_detail', $blog->slug) }}">
                                    <img src="{{ asset('images/posts/' . $blog->image) }}" alt="thumb">
                                </a>
                                <div class="image-post-content px-4 py-2">
                                    <ul class="post-meta">
                                        @foreach($blog->categories as $category)
                                            <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                                            @if(!$loop->last)
                                                <li class="sep"></li>
                                            @endif
                                        @endforeach
                                        <li class="sep"></li>
                                        <li><a href="#" class="date">{{ $blog->created_at->format('d.m.Y') }}</a></li>
                                    </ul>
                                    <h3><a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="text-hover">{{ $blog->title }}</a></h3>
                                    <a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="read-more">Continue Reading</a>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <p>No blogs found.</p>
                @endforelse     
            </div>
        @else
           
        @endif
          <!-- Check if there are any blogs to paginate -->
    @if ($data['popular']->count() > 0)
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            <ul class="pagination-wrap">
                <!-- Previous Button -->
                <li>
                    <a href="{{ $data['popular']->url($data['popular']->currentPage() - 1) }}" 
                       class="{{ $data['popular']->currentPage() == 1 ? 'disabled' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" fill="currentColor">
                            <path d="M15 18l-6-6 6-6v12z"/>
                        </svg>
                    </a>
                </li>

                @for ($i = 1; $i <= $data['popular']->lastPage(); $i++)
                    <li>
                        <a href="{{ $data['popular']->url($i) }}" class="{{ $data['popular']->currentPage() == $i ? 'active' : '' }}">
                            {{ $i }}
                        </a>
                    </li>
                @endfor

                <!-- Next Button -->
                <li>
                    <a href="{{ $data['popular']->currentPage() == $data['popular']->lastPage() ? 'javascript:;' : $data['popular']->url($data['popular']->currentPage() + 1) }}" 
                       class="{{ $data['popular']->currentPage() == $data['popular']->lastPage() ? 'disabled' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" fill="currentColor">
                            <path d="M9 18l6-6-6-6v12z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    @endif

    <!-- Optional: Display a message if there are no blogs -->
    @if ($data['popular']->count() == 0)
        <p>No popular blogs available.</p>
    @endif
</div>

    
</section>
@endsection
@section('css')
<style>

</style>
@endsection
