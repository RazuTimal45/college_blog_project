@extends('frontend.includes.section')
@section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else Mediaman,Agency,NepalTopAgency @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else Mediaman is one of the best agency in nepal. This is the Best agency.One of the best agency for your service @endif
@endsection
@section('title','Blog')
@section('main-section')
    @include('frontend.includes.breadcrumbs',['headtitle'=>'Our Blogs','title'=>'Our Blogs'])

    <!-- Blog List & Sidebar -->
    @if(count($data['blogs'])>0)
    <section class="blog_grid_with_sidebar" style="background-color:#E1EBEE">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-12">
                <div class="min_blog_area_blog_list grid">
                        <div class="row justify-content-center">
                            @foreach($data['blogs']->take(9) as $blogs)
                            <div class="col-xl-6">
                            <a href="{{route('frontend.blog_detail',$blogs->slug)}}">
                                <div class="single_blog wow fadeInLeft" data-wow-delay="0.3s">
                                    <div class="blog_top">
                                        <img src="{{asset('images/page_managers/'.$blogs->thumbnail_image)}}" alt="{{$blogs->title}}">
                                    </div>
                                    <div class="blog_bottom">
                                        <div class="date_cetagory">
                                            <span class="date">{{\Carbon\Carbon::parse($blogs->date)->format('F j, Y')}}</span>
                                        </div>
                                        <h4><a href="{{route('frontend.blog_detail',$blogs->slug)}}">{{ucfirst($blogs->title)}}</a></h4>
                                        <a href="{{route('frontend.blog_detail',$blogs->slug)}}" class="text_btn">Read more <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                              </a>
                            </div>
                            @endforeach
                       </div>
                     </div>
                </div>
            </div>
            @if(count($data['blogs'])>=1)
       <div class="paginations list-unstyled justify-content-center">
                        @if ($data['blogs']->currentPage() > 1)
                            <li><a href="{{ $data['blogs']->previousPageUrl() }}"><i class="fa-solid fa-chevron-left"></i></a></li>
                        @endif
                        @for ($i = 1; $i <= $data['blogs']->lastPage(); $i++)
                            <li class="{{ ($data['blogs']->currentPage() == $i) ? 'active' : '' }}">
                                <a href="{{ $data['blogs']->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        @if ($data['blogs']->hasMorePages())
                            <li><a href="{{ $data['blogs']->nextPageUrl() }}"><i class="fa-solid fa-chevron-right"></i></a></li>
                        @endif
                    </div>
                    @endif
        </div>
    </section>
    @endif
     
    <!-- Blog List & Sidebar -->
@endsection
