@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">Thank You</h1>
            <ul>
                <li><a class="home-page-link" href="index.html">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">Thank You</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="thanks-area">
    <div class="container">
        <div class="section-inner">
            <div class="section-icon">
                <i class="fal fa-check"></i>
            </div>
            <div class="section-title">
                <h2 class="sub-title">Thanks For your Order</h2>
                {{-- <h3 class="sect-title">Sorry, we couldn't find the page you where looking for. We suggest that <br> you return to homepage.</h3> --}}
            </div>
            <div class="section-button">
                <a class="btn-1" href="{{route('site')}}"><i class="fal fa-long-arrow-left"></i> Go To Homepage</a>
                <h3>
                    Let's track your order or
                    <a class="btn-2" href="{{route('contact')}}">Contact Us</a>
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection