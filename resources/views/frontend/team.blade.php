@extends('frontend.includes.section')
@section('meta-keywords')
    @if(isset($data['settings']) && $data['settings']->meta_keyword) {{$data['settings']->meta_keyword}} @else Mediaman,Agency,NepalTopAgency @endif
@endsection
@section('meta-description')
    @if(isset($data['settings']) && $data['settings']->meta_description) {!! $data['settings']->meta_description !!} @else Mediaman is one of the best agency in nepal. This is the Best agency.One of the best agency for your service @endif
@endsection
@section('title','Teams')
@section('main-section')
    @include('frontend.includes.breadcrumbs',['headtitle'=>'Our Team','title'=>'Our team'])

    <!-- Team -->
    @if(count($data['teams'])>0)
<section class="team innar">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="wow fadeInLeft" data-wow-delay="0.1s">Meet Our Team Members</h2>
        </div>
        <div class="min_team_area_innar">
            <div class="row justify-content-center">
                @foreach($data['teams'] as $teams)
                <div class="col-xl-4 col-md-6 team-div" data-bs-toggle="modal" data-bs-target="#member-{{$teams->id}}">
                    <div class="single_team wow fadeInLeft" data-wow-delay="0.3s">
                        <img src="@if($teams->image) {{asset('images/experts_teams/'.$teams->image)}} @else @include('frontend.includes.nouser') @endif" alt="{{$teams->title}}">
                        <h5><a href="javascript:;">{{ucfirst($teams->name)}}</a></h5>
                        <span>{{ucfirst($teams->designation)}}</span>
                    </div>
                </div>
                @endforeach
              </div>
        </div>
    </div>
</section>
<!-- team-modal -->
    @endif
    @if(count($data['experts'])>0)
        <section class="team innar"  style="background-color:#d8ddfa;">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="wow fadeInLeft" data-wow-delay="0.1s">Meet Our Experts</h2>
                </div>
                <div class="min_team_area_innar">
                    <div class="row justify-content-center">
                        @foreach($data['experts'] as $experts)
                            <div class="col-xl-4 col-md-6 mb-5 team-div" data-bs-toggle="modal" data-bs-target="#member-{{$experts->id}}">
                                <div class="single_team wow fadeInLeft" data-wow-delay="0.3s">
                                    <img src="@if($experts->image) {{asset('images/experts_teams/'.$experts->image)}} @else @include('frontend.includes.nouser') @endif" alt="{{$experts->name}}">
                                    <h5><a href="javascript:;">{{ucfirst($experts->name)}}</a></h5>
                                    <span>{{ucfirst($experts->designation)}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- team-modal -->
    @endif
    @if(count($data['experts_teams'])>0)
    @foreach($data['experts_teams'] as $expertteams)
<div class="modal fade" id="member-{{$expertteams->id}}" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="memberModalLabel1">{{ucfirst($expertteams->name)}} - {{ucfirst($expertteams->designation)}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border:none;background-color: transparent;">
                    <h2 aria-hidden="true">&times;</h2>
                </button>
            </div>
            <div class="modal-body">
                <img src="@if($expertteams->image) {{asset('images/experts_teams/'.$expertteams->image)}} @else @include('frontend.includes.nouser') @endif" style="width:100%; height:400px; margin:auto;" alt="{{$expertteams->name}}">
                <p class="mt-1">@if($expertteams->description){!! $expertteams->description !!}@endif</p>
            </div>
        </div>
    </div>
</div>
    @endforeach
    @endif
<!-- team-modal-end -->
<!-- team-end -->
