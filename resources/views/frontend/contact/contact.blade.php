@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">Contact</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="">Contact</a></li>
            </ul>
        </div>
    </div>
</div>

<!--contact-area start-->
<div class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <form action="{{route('message.send')}}" class="contact-form mb-10" method="POST">
                    @csrf
                    <div class="section-header section-header5 text-start">
                        <div class="wrapper">
                            <div class="sub-content">
                                <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                                <span class="sub-text">Contact Us</span>
                            </div>
                            <h2 class="title">MAKE CUSTOM REQUEST</h2>
                        </div>
                    </div>
                    <div class="info-form">
                        <div class="row">
                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="input-box mb-20">
                                        @if (Auth::guard('customerauth')->id() != null)
                                        <input type="text" name="name" placeholder="Full Name" value="{{Auth::guard('customerauth')->user()->name}}" readonly>
                                        @else
                                        <input type="text" name="name" placeholder="Full Name">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="input-box mail-input mb-20">
                                        @if (Auth::guard('customerauth')->id() != null)
                                        <input type="email" name="email" placeholder="E-mail Address" value="{{Auth::guard('customerauth')->user()->email}}" readonly>
                                        @else
                                        <input type="email" name="email" placeholder="E-mail Address">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="input-box number-input mb-30">
                                        <input type="tel" name="phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="input-box sub-input mb-30">
                                        <input type="text" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="input-box text-input mb-20">
                                        <textarea name="message" cols="30" rows="10" placeholder="Enter message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mb-15">
                                    <button type="submit" class="form-btn form-btn4">Get A Quote</button>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="right-side">
                    <div class="get-in-touch">
                        <h3 class="section-title2">
                            GET IN TOUCH
                        </h3>
                        <div class="contact">
                            <ul>
                                <li class="one">
                                    @if (App\Models\Touch::latest()->take(1)->exists())
                                    {{App\Models\Touch::latest()->take(1)->first()->location}}
                                    @else
                                    Location
                                    @endif
                                </li>
                                <li class="two"><a href="tel:@if (App\Models\Touch::latest()->take(1)->exists())
                                    {{App\Models\Touch::latest()->take(1)->first()->phone1}}
                                    @else
                                    Phone
                                    @endif">@if (App\Models\Touch::latest()->take(1)->exists())
                                    {{App\Models\Touch::latest()->take(1)->first()->phone1}}
                                    @else
                                    Phone1
                                    @endif</a>
                                    <a href="tel:@if (App\Models\Touch::latest()->take(1)->exists())
                                        {{App\Models\Touch::latest()->take(1)->first()->phone2}}
                                        @else
                                        Phone
                                        @endif">@if (App\Models\Touch::latest()->take(1)->exists())
                                        {{App\Models\Touch::latest()->take(1)->first()->phone2}}
                                        @else
                                        Phone2
                                        @endif</a></li>
                                <li class="three">Store Hours: <br>
                                    @if (App\Models\Touch::latest()->take(1)->exists())
                                    {{App\Models\Touch::latest()->take(1)->first()->hours1}}
                                    @else
                                    hours1
                                    @endif</li>
                            </ul>
                        </div>
                    </div>
                    <div class="section-button">
                        <div class="btn-1">
                            <a href="#">Get Support On Call <i class="fal fa-headphones-alt"></i></a>
                        </div>
                        <div class="btn-2">
                            <a href="#">Get Direction <i class="rt-location-dot"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <p>
            @if (App\Models\Aboutus::latest()->take(1)->exists())
            <iframe src="{{App\Models\Aboutus::latest()->take(1)->first()->location}}" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            @else
            <iframe src="" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">Location</iframe>
            @endif
        </p>
    </div>
</div>
<!--contact-area end-->
@endsection