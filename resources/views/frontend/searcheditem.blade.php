@extends('frontend.includes.section')
@section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else Mediaman,Agency,NepalTopAgency @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else Mediaman is one of the best agency in nepal. This is the Best agency.One of the best agency for your service @endif
@endsection
@section('title','Blogs')
@section('main-section')
    @include('frontend.includes.breadcrumbs',['headtitle'=>'Search Items'])

    <!-- Blog List & Sidebar -->
    @if(count($data['searched_item'])>0)
        <section class="blog_grid_with_sidebar">
            <div class="container">
                <h2 class="text-center">Searched Items</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="min_blog_area_blog_list grid">
                            <div class="row">
                                @foreach($data['searched_item']->take(9) as $searched_item)
                                    <div class="col-xl-4">
                                        <div class="single_blog wow fadeInLeft" data-wow-delay="0.3s">
                                            <div class="blog_top">
                                                <img src="{{asset('images/page_managers/'.$searched_item->thumbnail_image)}}" alt="{{$searched_item->title}}">
                                                @if($searched_item->writer_name) <span class="author"><a href="blog-single.html">by {{ucfirst($searched_item->writer_name)}}</a></span>@endif
                                            </div>
                                            <div class="blog_bottom">
                                                <div class="date_cetagory">
                                                    <span class="date">{{\Carbon\Carbon::parse($searched_item->date)->format('F j, Y')}}</span>
                                                </div>
                                                <h4><a href="{{route('frontend.blog_detail',$searched_item->slug)}}">{{ucfirst($searched_item->title)}}</a></h4>
                                                <a href="{{route('frontend.blog_detail',$searched_item->slug)}}" class="text_btn">Read more <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="col-lg-12 text-center col-12">
            <img src="{{asset('assets/frontend/assets/img/nodatafoundimage.png')}}" alt="" class="img-fluid">
        </div>
    @endif
    <!-- Blog List & Sidebar -->
@endsection