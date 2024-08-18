<!-- Breadcrumb -->
<div class="breadcrumb_area" data-bg-color="#004D66">
    <div class="container">
        <div class="breadcrumb_content">
            <h2>@if(isset($headtitle)) {{$headtitle}} @endif</h2>
            <div class="breadcrumb_category">
                <span><a href="{{route('frontend.home')}}">Home</a></span>
                <span><i class="fa-solid fa-arrow-right"></i></span>
                <span><a href="javascript:;">@if(isset($title)){{$title}}@endif</a></span>
                @if(isset($subtitle))
                <span><i class="fa-solid fa-arrow-right"></i></span>
                <span><a href="">{{$subtitle}}</a></span>
                @endif
            </div>
        </div>
    </div>
    <div class="shape_img">
        <img src="{{asset('assets/frontend/assets/img/hero/shape/2.png')}}" alt="" class="one">
        <img src="{{asset('assets/frontend/assets/img/hero/shape/3.png')}}" alt="" class="two">
        <img src="{{asset('assets/frontend/assets/img/hero/shape/7/2.png')}}" alt="" class="three">
    </div>
</div>
<!-- Breadcrumb -->
