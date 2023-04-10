@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">About</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">About</a></li>
            </ul>
        </div>
    </div>
</div>

<!--================= About Us Start Here =================-->
<section class="about-us-area pt-120 pb-75 pt-md-60 pb-md-15 pt-xs-50 pb-xs-10">
    <div class="container">
        <div class="image-section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-1">
                        @if ($about_info->exists())
                        <img src="{{asset('uploads/about')}}/{{$about_info->first()->preview_one}}" alt="img">
                        @else
                        <img src="" alt="img">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-2">
                        @if ($about_info->exists())
                        <img src="{{asset('uploads/about')}}/{{$about_info->first()->preview_two}}" alt="img">
                        @else
                        <img src="" alt="img">
                        <img src="" alt="img">
                        @endif
                    </div>
                </div>
            </div>
            <div class="section-title">
                <div class="title-inner">
                    <div class="wrapper">
                        <div class="sub-content">
                            <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                            <span class="sub-text">Since From {{($about_info->exists()) ? ($about_info->first()->year) : 'year'}}</span>
                            <img class="line-2" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                        </div>
                        <h2 class="title">About Our Story</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-text">
            <div class="row">
                <div class="col-lg-4">
                    <p class="description">{{($about_info->exists()) ? ($about_info->first()->left_desc) : 'Left Description'}}</p>
                </div>
                <div class="col-lg-4">
                    <p class="description">{{($about_info->exists()) ? ($about_info->first()->right_desc) : 'Right Description'}}</p>
                </div>
                <div class="col-lg-4">
                    <div class="service-list">
                        <ul>
                            @forelse ($services as $service)
                                <li><a href="#">{{$service->service_list}}</a></li>
                            @empty
                                service list
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================= About Us End Here =================-->

<!--================= Team Area Start Here =================-->
<div class="team-area">
    <div class="container">
        <div class="sub-content">
            <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
            <span class="sub-text">Team</span>
            <img class="line-2" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
        </div>
        <h2 class="title">Meet With Team</h2>
        <div class="slider-div">
            <div class="swiper rts-cmmnSlider-over2" data-swiper="pagination">
                <div class="swiper-wrapper">
                    @foreach ($teams as $team)
                        
                    
                    <div class="swiper-slide">
                        <div class="team-wraper">
                            <div class="team-thumb">
                                <a href="#"><img src="{{asset('uploads/team')}}/{{$team->image}}" alt="collection-image"></a>
                            </div>
                            <div class="team-content">
                                <h3>
                                    <a href="#" class="item-catagory-box">{{$team->name}}</a>
                                </h3>
                                <h6>{{$team->position}}</h6>
                                <div class="footer__social">
                                    <a class="footer-icon" href="{{$team->facebook == null ? '' : $team->facebook}}"><i aria-hidden="true"
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="footer-icon" href="{{$team->twitter == null ? '' : $team->twitter}}"><i aria-hidden="true"
                                            class="fab fa-twitter"></i></a>
                                    <a class="footer-icon" href="{{$team->linkedin == null ? '' : $team->linkedin}}"><i aria-hidden="true"
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!--================= Team Area End Here =================-->

<!--================= Feature Area Start Here =================-->
<div class="features-area">
    <div class="container">
        <div class="features-1">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="image-section">
                        @if ($feature_top->exists())
                        <a href="#"><img src="{{asset('uploads/feature')}}/{{$feature_top->first()->image}}" alt="features-1"></a>
                        @else
                        <img src="" alt="img">
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-content">
                        <div class="sub-content">
                            <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                            <span class="sub-text">Features #01</span>
                            <img class="line-2" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                        </div>
                            @if ($feature_top->exists())
                            <h2 class="title">{{$feature_top->first()->title}}</h2>
                            @else
                            <h2 class="title">Title</h2>
                            @endif
                            @if ($feature_top->exists())
                            <p class="description">{{$feature_top->first()->description}}</p>
                            @else
                            <p class="description">Description</p>
                            @endif
                            <div class="section-button">
                            @if ($feature_top->exists())
                            <a href="{{route('contact')}}">{{$feature_top->first()->button}}</a>
                            @else
                            <a href="{{route('contact')}}">Button</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="features-2">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-content">
                        <div class="sub-content">
                            <img class="line-1" src="assets/images/banner/wvbo-icon.png" alt="">
                            <span class="sub-text">Features #01</span>
                            <img class="line-2" src="assets/images/banner/wvbo-icon.png" alt="">
                        </div>
                            @if ($feature_bottom->exists())
                            <h2 class="title">{{$feature_bottom->first()->title}}</h2>
                            @else
                            <h2 class="title">Title</h2>
                            @endif
                            @if ($feature_bottom->exists())
                            <p class="description">{{$feature_bottom->first()->description}}</p>
                            @else
                            <p class="description">Description</p>
                            @endif
                        <div class="section-button">
                            @if ($feature_bottom->exists())
                            <a href="{{route('contact')}}">{{$feature_bottom->first()->button}}</a>
                            @else
                            <a href="{{route('contact')}}">Button</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-section">
                        @if ($feature_bottom->exists())
                        <a href="#"><img src="{{asset('uploads/feature')}}/{{$feature_bottom->first()->image}}" alt="features-2"></a>
                        @else
                        <img src="" alt="img">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================= Feature Area End Here =================-->
@endsection