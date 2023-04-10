<!DOCTYPE html>
<html lang="en" class="darkmode" data-theme="light">


<!-- Mirrored from reactheme.com/products/html/weiboo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Mar 2023 06:46:44 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (App\Models\Sitename::exists())
    <title>{{App\Models\Sitename::latest()->take(1)->first()->name}}</title>
    @else
    <title>Website - E-commerce HTML Template</title>
    @endif
    <!--================= Favicon =================-->
    @if (App\Models\Favicon::exists())
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/favicon')}}/{{App\Models\Favicon::latest()->take(1)->first()->favicon}}">
    @else
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/fav.png') }}">
    @endif
    <link rel="apple-touch-icon" href="assets/images/fav.png">
    <!--================= Bootstrap V5 CSS =================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}"> --}}
    <!--================= Font Awesome 5 CSS =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <!--================= Magnific popup Plugin =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/jquery.nstSlider.min.css')}}">
    <!--================= RT Icons CSS =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/rt-icons.css') }}">
    <!--================= Animate css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <!--================= Magnific popup Plugin =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!--================= Swiper Slider Plugin =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <!--================= Mobile Menu CSS =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/metisMenu.css') }}">
    <!--================= Main Menu CSS =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/rtsmenu.css') }}">
    
    <!--================= Preloader CSS =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/preloader.css') }}">
    <!--================= Main Stylesheet =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/variables/variable1.css') }}">
    <!--================= Main Stylesheet =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/variables/variable6.css') }}">
    <!--================= Main Stylesheet =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/main.css') }}">
</head>

<body>
    @php
        $cart = App\Models\Cart::where('customer_id', Auth::guard('customerauth')->id())
    @endphp
    @php
        $wishlist = App\Models\Wishlist::where('customer_id', Auth::guard('customerauth')->id())
    @endphp
    <!--================= Preloader Section Start Here =================-->
    {{-- <div id="weiboo-load">
        <div class="preloader-new">
            <svg class="cart_preloader" role="img" aria-label="Shopping cart_preloader line animation"
                viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                    <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
                        <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
                        <circle cx="43" cy="111" r="13" />
                        <circle cx="102" cy="111" r="13" />
                    </g>
                    <g class="cart__lines" stroke="currentColor">
                        <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"
                            stroke-dasharray="338 338" stroke-dashoffset="-338" />
                        <g class="cart__wheel1" transform="rotate(-90,43,111)">
                            <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68"
                                stroke-dashoffset="81.68" />
                        </g>
                        <g class="cart__wheel2" transform="rotate(90,102,111)">
                            <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68"
                                stroke-dashoffset="81.68" />
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </div> --}}
    <!--================= Preloader End Here =================-->

    <div class="anywere anywere-home"></div>

    <!--================= Header Section Start Here =================-->
    <header id="rtsHeader">
        <div class="navbar-sticky">
            <div class="container">
                <div class="navbar-part navbar-part1">
                    <div class="navbar-inner">
                        <div class="left-side">
                            <div class="hamburger-1">
                                <a href="#" class="nav-menu-link">
                                    <span class="dot1"></span>
                                    <span class="dot2"></span>
                                    <span class="dot3"></span>
                                    <span class="dot4"></span>
                                    <span class="dot5"></span>
                                    <span class="dot6"></span>
                                    <span class="dot7"></span>
                                    <span class="dot8"></span>
                                    <span class="dot9"></span>
                                </a>
                            </div>
                            @if (App\Models\Aboutus::latest()->exists())
                            <a href="{{ route('site') }}" class="logo"><img src="{{ asset('uploads/logo') }}/{{App\Models\Aboutus::latest()->take(1)->first()->logo}}" alt="weiboo-logo"></a>
                            @else
                            <a href="{{ route('site') }}" class="logo">Logo</a>
                            @endif
                        </div>
                        <div class="rts-menu">
                            <nav class="menus menu-toggle">
                                <ul class="nav__menu">
                                    <li class="has-dropdown"><a class="menu-item {{Request::is('/') ? 'active1' : ''}}" href="{{route('site')}}">Home</a>
                                    </li>
                                    <li class="has-dropdown"><a class="menu-item {{Request::is('shop') ? 'active1' : ''}}" href="{{route('shop')}}">Shop</a>
                                    </li>
                                    <li class="has-dropdown"><a class="menu-item" href="#">Pages <i
                                                class="rt-plus"></i></a>
                                        <ul class="dropdown-ul">
                                            <li class="dropdown-li"><a class="dropdown-link"
                                                    href="{{route('about')}}">About</a>
                                            </li>
                                            <li class="dropdown-li"><a class="dropdown-link"
                                                    href="{{route('faq')}}">FAQ's</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown"><a class="menu-item" href="#">Blog <i class="rt-plus"></i></a>
                                        <ul class="dropdown-ul">
                                            <li class="dropdown-li"><a class="dropdown-link" href="{{route('blog')}}">Blog</a>
                                            </li>
                                            <li class="dropdown-li"><a class="dropdown-link" href="{{route('blog.grid')}}">Blog Grid</a></li>
                                            {{-- <li class="dropdown-li"><a class="dropdown-link" href="news-details.html">Blog Details</a></li> --}}
                                        </ul>
                                    </li>
                                    <li><a class="menu-item {{Request::is('contact') ? 'active1' : ''}}" href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="responsive-hamburger">
                            <div class="hamburger-1">
                                <a href="#" class="nav-menu-link">
                                    <span class="dot1"></span>
                                    <span class="dot2"></span>
                                    <span class="dot3"></span>
                                    <span class="dot4"></span>
                                    <span class="dot5"></span>
                                    <span class="dot6"></span>
                                    <span class="dot7"></span>
                                    <span class="dot8"></span>
                                    <span class="dot9"></span>
                                </a>
                            </div>
                        </div>
                        <div class="header-action-items header-action-items1">
                            <div class="search-part">
                                <div class="search-icon action-item icon"><i class="rt-search"></i></div>
                                <div class="search-input-area">
                                    <div class="container">
                                        <div class="search-input-inner">
                                            
                                                <div class="input-div">
                                                    {{-- @php
                                                        $q = 
                                                    @endphp
                                                    <form action="{{url('search/btn')}}" method="GET" role="search">
                                                        <input id="searchInput1" name="search" value="{{Request::get('search')}}" class="search-input" type="text" placeholder="Search by keyword or #">
                                                        <button class="btn btn-secondary btn-lg" type="submit">Search</button>
                                                    </form> --}}

                                                    {{-- <button class="searchInput1class btn btn-secondary btn-lg" type="submit">Search</button> --}}


                                                    <input type="text" id="search_input" class="search-input" placeholder="Search for products..." value="{{@$_GET['q']}}" />
                                                    <button id="search_btn" class="btn btn-secondary btn-lg" type="submit">Search</button>
                                                    {{-- <form action="{{url('search/btn')}}" method="GET" role="search"> --}}
                                                    {{-- <input id="searchInput1" name="search" value="{{Request::get('search')}}" class="search-input" type="text" placeholder="Search by keyword or #"> --}}
                                                    {{-- <input id="searchInput1" name="search" value="{{@$_GET['q']}}" class="search-input-value" type="text" placeholder="Search by keyword or #">
                                                    <button class="search-input" id="search_btn" class="btn btn-secondary btn-lg" type="submit">Search</button> --}}
                                                {{-- </form> --}}
                                                </div>
                                            <div class="search-close-icon"><i class="rt-xmark"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @auth('customerauth')
                                <div class="dropdown">
                                    <div class="account" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="rt-user-2"></i>
                                    </div>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('customer.account')}}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{route('customer.logout')}}">Log out</a></li>
                                    </ul>
                                </div>
                              @else
                              <a href="{{ route('customer.login') }}" class="account"><i class="rt-user-2"></i></a>
                            @endauth
                            <div class="cart action-item" style="margin-right: 20px">
                                <div class="cart-nav">
                                    <div class="cart-icon icon"><a href="#0"><i aria-hidden="true" class="fas fa-shopping-basket"></i></a>
                                        <span class="wishlist-dot icon-dot">{{$cart->count()}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="wishlist action-item">
                                <div class="wishlist-nav">
                                    <div class="wishlist-icon icon" style=""><a href="{{route('wishlist')}}"><i class="rt-heart"></i></a>
                                        <span class="wishlist-dot" style="">{{$wishlist->count()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="cart-bar">
            <div class="cart-header">
                <h3 class="cart-heading">MY CART ({{$cart->count()}}) ITEMS</h3>
                <div class="close-cart"><i class="fal fa-times"></i></div>
            </div>
            <div class="product-area overflow-auto">
                @php
                    $subtotal = 0;
                @endphp
                @foreach ($cart->get() as $cart)
                    
                
                <div class="product-item">
                    <div class="product-detail">
                        <div class="product-thumb"><img src="{{asset('uploads/products/preview')}}/{{$cart->rel_to_product->preview_one}}" alt="product-thumb">
                        </div>
                        <div class="item-wrapper">
                            <span class="product-name">{{$cart->rel_to_product->product_name}}</span>
                            <div class="item-wrapper">
                                <span class="product-variation"><span class="color">{{$cart->rel_to_color->color_name}} /</span>
                                    <span class="size">{{$cart->rel_to_size->size_name}}</span></span>
                            </div>
                            <div class="item-wrapper">
                                <span class="product-qnty">{{$cart->quantity}} ×</span>
                                <span class="product-price">{{$cart->rel_to_product->after_discount}} Tk</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cart-edit">
                        <div class="item-wrapper d-flex mr--5 align-items-center">
                            <a href="{{route('cart.single.delete', $cart->id)}}" class="delete-cart"><i class="fal fa-times"></i></a>
                        </div>
                    </div>
                </div>
                @php
                    $subtotal += $cart->rel_to_product->after_discount*$cart->quantity
                @endphp
                @endforeach
                    @php
                        session([
                            'total' => $subtotal
                        ])
                    @endphp
                    
                
            </div>
            <div class="cart-bottom-area">
                @if (session('discount'))
                        <span class="total-price">TOTAL - COUPON: <span class="price">{{session('total_amount')}} Tk</span></span>
                        @else
                        {{-- <span class="total-price">{{session('total')}} Tk</span> --}}
                        <span class="total-price">TOTAL: <span class="price">{{$subtotal}} Tk</span></span>
                        @endif
                
                <a href="{{route('checkout')}}" class="checkout-btn cart-btn">PROCEED TO CHECKOUT</a>
                <a href="{{route('cart')}}" class="view-btn cart-btn">VIEW CART</a>
            </div>
        </div>
        <!-- slide-bar start -->
        <aside class="slide-bar">
            <div class="offset-sidebar">
                <a class="hamburger-1 mobile-hamburger-1 ml--30" href="#"><span><i
                            class="rt-xmark"></i></span></a>
            </div>
            <!-- offset-sidebar start -->
            <div class="offset-sidebar-main">
                <div class="offset-widget mb-40">
                    <div class="info-widget">
                        <img src="assets/images/logo1.svg" alt="">
                        @if (App\Models\Aboutus::latest()->take(1)->exists())
                            <p class="mb-30">{{App\Models\Aboutus::latest()->take(1)->first()->about}}</p>
                            @else
                            <p class="mb-30">About us content</p>
                            @endif
                        
                    </div>
                    <div class="info-widget info-widget2">
                        <h4 class="offset-title mb-20">Get In Touch </h4>
                        <ul>
                            <li class="info phone"><a href="tel:@if (App\Models\Touch::latest()->take(1)->exists())
                                {{App\Models\Touch::latest()->take(1)->first()->phone1}}
                                @else
                                phone1
                                @endif">@if (App\Models\Touch::latest()->take(1)->exists())
                                {{App\Models\Touch::latest()->take(1)->first()->phone1}}
                                @else
                                phone1
                                @endif, @if (App\Models\Touch::latest()->take(1)->exists())
                                {{App\Models\Touch::latest()->take(1)->first()->phone2}}
                                @else
                                phone2
                                @endif</a>
                            </li>
                            <li class="info email"><a href="email:@if (App\Models\Touch::latest()->take(1)->exists())
                                {{App\Models\Touch::latest()->take(1)->first()->email}}
                                @else
                                email
                                @endif">@if (App\Models\Touch::latest()->take(1)->exists())
                                {{App\Models\Touch::latest()->take(1)->first()->email}}
                                @else
                                email
                                @endif</a></li>
                            <li class="info web"><a href="www.webexample.html">@if (App\Models\Touch::latest()->take(1)->exists())
                                {{App\Models\Touch::latest()->take(1)->first()->web}}
                                @else
                                web
                                @endif</a></li>
                            <li class="info location">@if (App\Models\Touch::latest()->take(1)->exists())
                                {{App\Models\Touch::latest()->take(1)->first()->location}}
                                @else
                                location
                                @endif</li>
                        </ul>
                        <div class="offset-social-link">
                            <h4 class="offset-title mb-20">Follow Us </h4>
                            <ul class="social-icon">
                                @if (App\Models\Social::exists())
                                @foreach (App\Models\Social::all() as $social)
                                <li><a target="_blank" href="{{$social->url}}"><i class="{{$social->icon}}"></i></a></li>
                                @endforeach        
                                            @else
                                            social
                                            @endif
                                {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offset-sidebar end -->
            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu side-mobile-menu1">
                <ul id="mobile-menu-active">
                    <li><a class="menu-item {{Request::is('/') ? 'active1' : ''}}" href="{{route('site')}}">Home</a>
                    </li>
                    <li><a href="{{route('shop')}}">Shop</a>
                    </li>
                    <li class="has-dropdown firstlvl">
                        <a class="mm-link" href="index.html">Pages <i class="rt-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('faq')}}">FAQ's</a></li>
                        </ul>
                    </li>
                    <li><a class="mm-link" href="{{route('contact')}}">Contact</a></li>
                </ul>
            </nav>
            <div class="header-action-items header-action-items1 header-action-items-side">
                <div class="search-part">
                    <div class="search-icon action-item icon"><i class="rt-search"></i></div>
                    <div class="search-input-area">
                        <div class="container">
                            <div class="search-input-inner">
                                <select id="custom-select">
                                    <option value="hide">All Catagory</option>
                                    <option value="all">All</option>
                                    <option value="men">Men</option>
                                    <option value="women">Women</option>
                                    <option value="shoes">Shoes</option>
                                    <option value="shoes">Glasses</option>
                                    <option value="shoes">Bags</option>
                                    <option value="shoes">Assesories</option>
                                </select>
                                <div class="input-div">
                                    <div class="search-input-icon"><i class="rt-search mr--10"></i></div>
                                    <input class="search-input" type="text" placeholder="Search by keyword or #">
                                </div>
                                <div class="search-close-icon"><i class="rt-xmark"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart action-item">
                    <div class="cart-nav">
                        <div class="cart-icon icon"><i class="rt-cart"></i><span
                                class="wishlist-dot icon-dot">3</span>
                        </div>
                    </div>
                </div>
                
                <div class="wishlist action-item">
                    <div class="favourite-icon icon"><i class="rt-heart"></i><span class="cart-dot icon-dot">0</span>
                    </div>
                </div>
                <a href="login.html" class="account"><i class="rt-user-2"></i></a>
            </div>
            <!-- side-mobile-menu end -->
        </aside>
        <!--================= Banner Section Start Here =================-->
        @yield('banner')
        {{--  --}}
        <!--================= Banner Section End Here =================-->
    </header>
    <!--================= Header Section End Here =================-->

    @yield('content')

    <!--================= Footer Start Here =================-->
    <div class="footer footer-1">
        <div class="container">
            <div class="footer-feature1">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="wrapper">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="50px" height="50px">
                                    <image x="0px" y="0px" width="50px" height="50px"
                                        xlink:href="data:img/png;base64,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" />
                                </svg>
                            </div>
                            <div class="title">
                            @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <h1 class="box-title">{{App\Models\Footerfeature::latest()->take(1)->first()->title1}}</h1>
                            @else
                            <h1 class="mb-30">About us content</h1>
                            @endif
                            @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <p>{{App\Models\Footerfeature::latest()->take(1)->first()->description1}}</p>
                            @else
                            <p>Orders are shipped seamlessly
                                between countries</p>
                            @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="wrapper wrapper2">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="50px" height="55px">
                                    <image x="0px" y="0px" width="50px" height="55px"
                                        xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAA3CAMAAAB5LOkwAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABlVBMVEXuQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3////tvdjFAAAAhXRSTlMAGr3te2unFd/ZQGSGdbYX9MNqhHOz8M9pzGZ84I7ASfecGH6KG9HILTwwDU0BJcXyYhOYjYNdvBzvcMQUMcHiYQM41jMqqvlOHqQZwv379XTNbEHxHT0+PwYH29zef+hYWVo5EaudBagOsLsJsniWAukW7P4mRX1D5vwkbpKioKwIZaGxtwh31QAAAAFiS0dEhozeO10AAAAHdElNRQfmCBkQIC3d1dpMAAABuElEQVRIx+2WR1MCQRCF2wQqBhBzBAOiiAHMIiLomnNAzBlzzjnN/3ZZB2TC6urBKkvf6fXr+mpnuuewAIQiIqPeFA0Qg60KQB37ZuPigZEGYSUAJGKbBJCsxV7HIilBRA+Qim2aiKRjn8EimZ8gWT+IZOfII7l5+RykwICMhVykSFtcIs7QlE8jpYE5mHlIWbkUWSqsFFJZJbrqGg4SJuouNnvA11pIpC5QWesb9I0Bo26iJtZsEIsWB/OVVqdo2lztYdsPDdntESsVgXg6OoUuvPHunl5EI9DXj1ApgaCBwZBFQ4hFYFg8GYnwFYZE/yP/yJ9CRlhk9BPExCJj4x8Sg3oWgYlJr7ymzMBBlOt7iO7rSJVPkabDEMPMrBLNCRiZR4q1gBF3tWIkNngy8+KSMi2vfHFMv0ero2v964ts7nepnBuuTQ7hMElTFPxUvrkl5ds7DGHdxZPfoxr7OBcOaGQsuKxDB5EfHeP85JRG3h8N+aN2JpOLOg+1vER+IY9MBjuXNiJXH+L86pq5v4BbN1R+i/M7K7sWp9Sxt1O55V7KHx45i5ke7t01LnEaT88vdxofLl4BUy+dndS3GiwAAAAASUVORK5CYII=" />
                                </svg>
                            </div>
                            <div class="title">
                                @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <h1 class="box-title">{{App\Models\Footerfeature::latest()->take(1)->first()->title2}}</h1>
                            @else
                            <h1 class="mb-30">About us content</h1>
                            @endif
                            @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <p>{{App\Models\Footerfeature::latest()->take(1)->first()->description2}}</p>
                            @else
                            <p>Orders are shipped seamlessly
                                between countries</p>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="wrapper">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="50px" height="50px">
                                    <image x="0px" y="0px" width="50px" height="50px"
                                        xlink:href="data:img/png;base64,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" />
                                </svg>
                            </div>
                            <div class="title">
                                @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <h1 class="box-title">{{App\Models\Footerfeature::latest()->take(1)->first()->title3}}</h1>
                            @else
                            <h1 class="mb-30">About us content</h1>
                            @endif
                            @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <p>{{App\Models\Footerfeature::latest()->take(1)->first()->description3}}</p>
                            @else
                            <p>Orders are shipped seamlessly
                                between countries</p>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="wrapper last-child">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="38px" height="50px">
                                    <image x="0px" y="0px" width="38px" height="50px"
                                        xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAyCAMAAAAHpFkRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAB71BMVEXuQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3uQD3///+7BUqWAAAAo3RSTlMAIGi44uvWn0gJA3HwzjcIrPf4YwK6ZCUXh/1AWP5uHbYRzYsT1yr71GLGZ5UO5gqJe8DuFI90GI51u8H6O5qnplmDbVpdpYQMQ28+8g/MikTnUepycGxl2qRgfnPfz9xpJgYFJBbzRzDg9Vb8yowBqOUy5BUS9uzRVX/pOBvY0vQcsKHvL8nx4cRXQTqv7cWqs+iBtZgirVu0Hz+NKTWd1V8L9o3uEgAAAAFiS0dEpFm+erkAAAAHdElNRQfmCBkQIjcSgUG0AAACCklEQVQ4y+XV11/TUBgG4LdYrbSV2GpVQBxgBS1QmzpQgRZwKwoFFVRQQRRUxI0DBBXEPXDgXu8/6knS2oAnyYUXXvjd5HtPnt/JOBmAqVw5s9yz53jm5sKmvD4/jZqXZ62U+ZoI6DS4wEot9IjdoUWLl+Tlu8mCQgu2lCxaZrTLV5DulfLJismSTFgVJnOkbHUpy5TfaQ25VsoiZHk2VVTSHZWxdWTMFFXG18vYBnKjKYbo3yRjVeRmU9zyd2zGQbeyumI6qKlNJBLJWF1dfTKRqWTDtu0eEXfs3JVWuwP6au8BSpitvfDu0xu10WD7jXEfcMDEmtDYbHQpg7U4sFaDNTsw379nB/XVd2SHgHwTq4FXyooPR9pMrP3I0WoZs6z/hx1zZMEONdQZcWDHT5zsEvu7bVkwJl4ZxXWqB3bs9Bmgt7zvbMCvnlMs2fkUlKrSdOjvtWIXMHAxmy5dlrMrV6c9VWy7JmW1cF3P9IMNN7S3WMZu4lamvT2E4TsckbHRu7inXcf9MbaMi9N/wAkZe5iLR+KePMaT/qdA9Bn5XMb6FLwgw2KeAbEK2sRSNjoMMUPRS22toq+0kQlMSi4hhdfapr0b0Tf6QBniEvYW7/TP2dT7D8ZAq/Y1/aPiH1FvzmHxyxkq/DSzmnrgncqqSpsfYtfngrTq/AK7+vrt++Rgh/rjp+h/AYz5uLX/8X/FAAAAAElFTkSuQmCC" />
                                </svg>
                            </div>
                            <div class="title">
                                @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <h1 class="box-title">{{App\Models\Footerfeature::latest()->take(1)->first()->title4}}</h1>
                            @else
                            <h1 class="mb-30">About us content</h1>
                            @endif
                            @if (App\Models\Footerfeature::latest()->take(1)->exists())
                            <p>{{App\Models\Footerfeature::latest()->take(1)->first()->description4}}</p>
                            @else
                            <p>Orders are shipped seamlessly
                                between countries</p>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-inner">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 box-widget-col">
                        <div class="footer-widget footer-box-widget">
                            <div class="footer-logo">
                                @if (App\Models\Aboutus::latest()->exists())
                                <a href="{{ route('site') }}" class="logo"><img src="{{ asset('uploads/logo') }}/{{App\Models\Aboutus::latest()->take(1)->first()->logo}}" alt="weiboo-logo"></a>
                                @else
                                <a href="{{ route('site') }}" class="logo">Logo</a>
                                @endif
                            </div>
                            @if (App\Models\Aboutus::latest()->take(1)->exists())
                            <p>{{Str::limit(App\Models\Aboutus::latest()->take(1)->first()->about, '70', '')}}</p>
                            @else
                            <p>Solid is the information & experience
                                directed at an end-user</p>
                            @endif
                            <div class="quick-contact">
                                <div class="phone contact-item">
                                    <div class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px">
                                            <defs>
                                                <filter id="Filter_0">
                                                    <feFlood flood-color="rgb(238, 64, 61)" flood-opacity="1"
                                                        result="floodOut" />
                                                    <feComposite operator="atop" in="floodOut" in2="SourceGraphic"
                                                        result="compOut" />
                                                    <feBlend mode="normal" in="compOut" in2="SourceGraphic" />
                                                </filter>

                                            </defs>
                                            <g filter="url(#Filter_0)">
                                                <path fill-rule="evenodd" fill="rgb(213, 18, 67)"
                                                    d="M39.333,37.332 L37.333,37.332 L37.333,39.332 C37.333,39.701 37.34,39.999 36.666,39.999 C36.298,39.999 35.999,39.701 35.999,39.332 L35.999,37.332 L27.333,37.332 C27.196,37.332 27.63,37.291 26.951,37.212 C26.649,37.1 26.576,36.585 26.787,36.284 L36.120,22.950 C36.245,22.772 36.448,22.667 36.666,22.666 C37.34,22.666 37.332,22.964 37.333,23.332 L37.333,35.999 L39.333,35.999 C39.701,35.999 39.999,36.298 39.999,36.665 C39.999,37.34 39.701,37.332 39.333,37.332 ZM35.999,25.447 L28.613,35.999 L35.999,35.999 L35.999,25.447 ZM35.805,19.137 C35.737,19.203 35.655,19.255 35.565,19.287 C35.538,19.294 35.511,19.299 35.483,19.302 C35.435,19.318 35.385,19.328 35.334,19.332 C35.328,19.332 35.322,19.332 35.315,19.332 C35.309,19.332 35.303,19.332 35.296,19.332 C35.248,19.326 35.200,19.314 35.155,19.297 C35.128,19.293 35.102,19.286 35.75,19.279 C34.973,19.237 34.883,19.172 34.813,19.87 L31.91,15.366 C30.842,15.107 30.842,14.698 31.91,14.440 C31.347,14.175 31.769,14.167 32.34,14.423 L34.634,17.23 C34.140,8.468 27.229,1.688 18.666,1.356 L18.666,3.332 C18.666,3.701 18.367,3.999 17.999,3.999 C17.631,3.999 17.333,3.701 17.333,3.332 L17.333,1.356 C8.651,1.690 1.690,8.651 1.356,17.332 L3.999,17.332 C4.367,17.332 4.666,17.631 4.666,17.999 C4.666,18.367 4.367,18.666 3.999,18.666 L1.356,18.666 C1.694,27.363 8.675,34.331 17.373,34.654 C17.373,34.654 17.373,34.654 17.373,34.654 C17.741,34.668 18.28,34.977 18.14,35.345 C18.0,35.703 17.706,35.986 17.348,35.986 L17.323,35.986 C7.670,35.627 0.25,27.706 0.9,18.46 C0.8,18.30 0.0,18.16 0.0,17.999 C0.0,17.983 0.9,17.968 0.9,17.952 C0.22,8.47 8.48,0.22 17.952,0.8 C17.969,0.7 17.983,0.0 17.999,0.0 C18.16,0.0 18.30,0.7 18.47,0.8 C27.614,0.22 35.494,7.530 35.970,17.86 L38.635,14.423 C38.893,14.174 39.303,14.174 39.561,14.423 C39.826,14.679 39.833,15.101 39.577,15.366 L35.805,19.137 ZM12.814,12.830 C13.70,12.565 13.492,12.558 13.757,12.814 L17.149,16.206 C17.690,15.964 18.308,15.964 18.849,16.206 L26.13,9.42 C26.274,8.782 26.696,8.782 26.956,9.42 C27.216,9.302 27.216,9.725 26.956,9.985 L19.799,17.142 C20.170,17.904 20.15,18.817 19.413,19.414 C18.815,20.12 17.904,20.169 17.140,19.804 C16.145,19.329 15.724,18.137 16.199,17.142 L12.814,13.756 C12.565,13.498 12.565,13.89 12.814,12.830 ZM17.528,18.470 C17.792,18.722 18.207,18.722 18.471,18.470 C18.471,18.470 18.471,18.470 18.471,18.470 C18.731,18.210 18.731,17.788 18.471,17.527 C18.210,17.267 17.788,17.267 17.528,17.527 C17.268,17.788 17.268,18.210 17.528,18.470 ZM25.733,29.193 C26.698,27.750 26.377,25.806 24.999,24.750 C24.319,24.261 23.503,23.998 22.666,23.998 C20.457,23.999 18.666,25.790 18.666,27.999 C18.666,28.367 18.367,28.666 17.999,28.666 C17.631,28.666 17.333,28.367 17.333,27.999 C17.332,26.882 17.683,25.793 18.335,24.886 C20.53,22.494 23.386,21.948 25.778,23.667 C27.745,25.154 28.205,27.920 26.825,29.963 C26.810,29.985 26.795,30.6 26.778,30.25 L19.440,38.666 L27.333,38.666 C27.701,38.666 27.999,38.964 27.999,39.332 C27.999,39.701 27.701,39.999 27.333,39.999 L17.999,39.999 C17.841,39.999 17.689,39.943 17.568,39.841 C17.288,39.602 17.253,39.182 17.491,38.901 L25.733,29.193 Z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="contact-info">
                                        <span class="title">@if (App\Models\Touch::latest()->take(1)->exists())
                                            {{App\Models\Touch::latest()->take(1)->first()->hours2}}
                                            @else
                                            hours1
                                            @endif</span>
                                        <a href="tel:0020500" class="service-time info">@if (App\Models\Touch::latest()->take(1)->exists())
                                            {{App\Models\Touch::latest()->take(1)->first()->phone2}}
                                            @else
                                            phone2
                                            @endif</a>
                                    </div>
                                </div>
                                <div class="email contact-item">
                                    <div class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px">
                                            <image x="0px" y="0px" width="40px" height="40px"
                                                xlink:href="data:img/png;base64,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" />
                                        </svg>
                                    </div>
                                    <div class="contact-info">
                                        <span class="title">Get Free Support</span>
                                        <a href="mailto:@if (App\Models\Touch::latest()->take(1)->exists())
                                            {{App\Models\Touch::latest()->take(1)->first()->email}}
                                            @else
                                            email
                                            @endif"
                                            class="email-address info">@if (App\Models\Touch::latest()->take(1)->exists())
                                            {{App\Models\Touch::latest()->take(1)->first()->email}}
                                            @else
                                            email
                                            @endif</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="social-links-footer2">
                                @if (App\Models\Social::exists())
                                @foreach (App\Models\Social::latest()->take(4)->get() as $social)
                                <li><a class="platform" target="_blank" href="{{$social->url}}"><i class="{{$social->icon}}"></i></a></li>
                                    
                                @endforeach
                                @else
                                social
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 box-widget-col2">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">About Us</h3>
                            @if (App\Models\Aboutus::latest()->take(1)->exists())
                            <p class="widget-text">{{Str::limit(App\Models\Aboutus::latest()->take(1)->first()->about, '150', '')}}</p>
                            @else
                            <p class="widget-text">About us content</p>
                            @endif
                            <a href="{{route('contact')}}" class="getin-touch">Get In Touch <i
                                    class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-13 col-md-6 col-sm-6 no-gutters">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Information</h3>
                            <ul class="widget-items cata-widget">
                                <li class="widget-list-item"><a href="{{route('about')}}">About</a></li>
                                <li class="widget-list-item"><a href="{{route('faq')}}">FAQ's</a></li>
                                <li class="widget-list-item"><a href="{{route('wishlist')}}">Wishlist</a></li>
                                <li class="widget-list-item"><a href="{{route('cart')}}">Cart</a></li>
                                <li class="widget-list-item"><a href="{{route('checkout')}}">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-13 col-md-6 col-sm-6 no-gutters">
                        <h3 class="footer-widget-title">My Account</h3>
                        <ul class="footer-widget">
                            <li class="widget-list-item"><a href="{{route('wishlist')}}">Wishlist</a></li>
                            <li class="widget-list-item"><a href="{{route('cart')}}">Cart</a></li>
                            <li class="widget-list-item"><a href="{{route('checkout')}}">Checkout</a></li>
                            <li class="widget-list-item"><a href="{{route('customer.account')}}">My Account</a></li>
                            <li class="widget-list-item"><a href="{{route('shop')}}">Shop</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-25 col-md-6 col-sm-6">
                        <h3 class="footer-widget-title">Get Newsletter</h3>
                        <div class="footer-widget newsletter-widget">
                            <span class="widget-text">Get 10% off your first order! Hurry up</span>
                            <div class="input-div">
                                <input type="email" placeholder="Enter email address">
                            </div>
                            <a href="#0" class="subscribe-btn">Subscribe Now <i
                                    class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-bottombar">
                    <div class="app-download">
                        <span class="download-text">Order faster with our App!</span>
                        <a href="http://appstore.com/" target="_blank" class="download-store"><img
                                src="assets/images/items/appstore.jpg" alt=""></a>
                        <a href="https://play.google.com/store/apps" target="_blank" class="download-store"><img
                                src="assets/images/items/playstore.jpg" alt=""></a>
                    </div>
                    <div class="payment-methods"><img src="{{asset('frontend/assets/images/footer/payment2.svg')}}" alt="payment-methods">
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-bottom-inner">
                    <span class="copyright">Copyright & Design By <a href="http://reacthemes.com/" class="brand"
                            target="_blank">Reacthemes</a> -2022</span>
                </div>
            </div>
        </div> --}}
    </div>
    <!--================= Footer End Here =================-->


    <!--================= Scroll to Top Start =================-->
    <div class="scroll-top-btn scroll-top-btn1"><i class="fas fa-angle-up arrow-up"></i><i
            class="fas fa-circle-notch"></i></div>
    <!--================= Scroll to Top End =================-->

    <!--================= Jquery latest version =================-->
    <script src="{{ asset('frontend/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <!--================= Bootstrap latest version =================-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('frontend/assets/js/vendors/bootstrap.min.js') }}"></script> --}}
    <!--================= Wow.js =================-->
    <script src="{{ asset('frontend/assets/js/vendors/wow.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!--================= Swiper Slider =================-->
    <script src="{{ asset('frontend/assets/js/vendors/swiper-bundle.min.js') }}"></script>
     <!--================= Swiper Slider =================-->
     <script src="{{ asset('frontend/assets/js/vendors/jquery.nstSlider.min.js')}}"></script>
    <!--================= Nice Select =================-->
    <script src="{{ asset('frontend/assets/js/vendors/jquery.nice-select.js') }}"></script>
    <!--================= Zoom Plugin =================-->
    <script src="{{ asset('frontend/assets/js/vendors/zoom.js') }}"></script>
    <!--================= metisMenu Plugin =================-->
    <script src="{{ asset('frontend/assets/js/vendors/metisMenu.min.js') }}"></script>
    {{-- Sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--================= Main Menu Plugin =================-->
    <script src="{{ asset('frontend/assets/js/vendors/rtsmenu.js') }}"></script>
    <!--================= Magnefic Popup Plugin =================-->
    <script src="{{ asset('frontend/assets/js/vendors/isotope.pkgd.min.js') }}"></script>
    <!--================= Magnefic Popup Plugin =================-->
    <script src="{{ asset('frontend/assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <!--================= Main Script =================-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    @yield('footer_script')

    @if (session('success'))
        {
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
            })
        </script>
        }
    @endif
    @if (session('error'))
        {
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
            })
        </script>
        }
    @endif
    <script>
         $(document).ready(function () {
            $('.increment-btn').click(function (e) {
                e.preventDefault();
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value<10){
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }

            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value>1){
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });

        });
    </script>
    <script>
        $('#search_btn').click(function(){
            var search_input = $('#search_input').val();
            var min = $('.leftLabel').val();
            var max = $('.rightLabel').val();
            var color_id = $('input[class="color_id"]:checked').attr('value');
            var brand_id = $('input[class="brand_id"]:checked').attr('value');
            var category_id = $('input[class="category_id"]:checked').attr('value');
            var sort = $('#sort').val();
            var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&brand_id=" + brand_id + "&min=" + min + "&max=" + max + "&sort=" + sort;
            window.location.href = link;
        })
        $('.category_id').click(function() {
            var search_input = $('#search_input').val();
            var min = $('.leftLabel').val();
            var max = $('.rightLabel').val();
            var category_id = $('input[class="category_id"]:checked').attr('value');
            var color_id = $('input[class="color_id"]:checked').attr('value');
            var brand_id = $('input[class="brand_id"]:checked').attr('value');
            var sort = $('#sort').val();
            var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&brand_id=" + brand_id + "&min=" + min + "&max=" + max + "&sort=" + sort;
            window.location.href = link;
        })

        $('.color_id').click(function() {
            var search_input = $('#search_input').val();
            var min = $('.leftLabel').val();
            var max = $('.rightLabel').val();
            var category_id = $('input[class="category_id"]:checked').attr('value');
            var color_id = $('input[class="color_id"]:checked').attr('value');
            var brand_id = $('input[class="brand_id"]:checked').attr('value');
            var sort = $('#sort').val();
            var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&brand_id=" + brand_id + "&min=" + min + "&max=" + max + "&sort=" + sort;
            window.location.href = link;
        });
        $('.brand_id').click(function() {
            var search_input = $('#search_input').val();
            var min = $('.leftLabel').val();
            var max = $('.rightLabel').val();
            var category_id = $('input[class="category_id"]:checked').attr('value');
            var color_id = $('input[class="color_id"]:checked').attr('value');
            var brand_id = $('input[class="brand_id"]:checked').attr('value');
            var sort = $('#sort').val();
            var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&brand_id=" + brand_id + "&min=" + min + "&max=" + max + "&sort=" + sort;
            window.location.href = link;
        }) 
        $('.price-range-grip').click(function() {
            var search_input = $('#search_input').val();
            var min = $('.leftLabel').val();
            var max = $('.rightLabel').val();
            var category_id = $('input[class="category_id"]:checked').attr('value');
            var color_id = $('input[class="color_id"]:checked').attr('value');
            var brand_id = $('input[class="brand_id"]:checked').attr('value');
            var sort = $('#sort').val();
            var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&brand_id=" + brand_id + "&min=" + min + "&max=" + max + "&sort=" + sort;
            window.location.href = link;
        })
        $('#sort').change(function() {
            var search_input = $('#search_input').val();
            var min = $('.leftLabel').val();
            var max = $('.rightLabel').val();
            var category_id = $('input[class="category_id"]:checked').attr('value');
            var color_id = $('input[class="color_id"]:checked').attr('value');
            var brand_id = $('input[class="brand_id"]:checked').attr('value');
            var sort = $(this).val();
            var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&brand_id=" + brand_id + "&min=" + min + "&max=" + max + "&sort=" + sort;
            window.location.href = link;
        })
    </script>
    <script>
        $(document).on('click', '.eye_id', function(e) {
            var id  = $(this).attr("id");
            $.ajax({
                url: "{{url("/product-quick-view/")}}/"+id,
                type: 'get',
                success: function(data) {
                    $(".details-product-area").html(data);
                }
            })
        })
    </script>
</body>

</html>
