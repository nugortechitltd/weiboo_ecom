@extends('frontend.master.master')
@section('banner')
    <div class="banner banner-1 bg-image">
        <div class="container">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-xl-2 col-md-4 col-sm-12 gutter-1">
                        <div class="catagory-sidebar">
                            <div class="widget-bg">
                                <h2 class="widget-title">All Categoriess<i class="rt-angle-down"></i></h2>
                                <nav>
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li class="d-flex justify-content-between" style="cursor: pointer!important"><option class="category_id" value="{{$category->id}}">{{ $category->category_name }}</option><i class="rt rt-arrow-right-long me-5"></i></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-12 gutter-2">
                        <div class="swiper bannerSlide2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="banner-single bg-image bg-image-3-1">
                                        <div class="container">
                                            <div class="single-inner">
                                                <div class="content-box">
                                                    <p class="slider-subtitle"><img
                                                            src="{{ asset('frontend/assets/images/banner/wvbo-icon.png') }}"
                                                            alt=""> Spring
                                                        summer 22 women’s collection </p>
                                                    <h2 class="slider-title"> HOT COLLECTION <br> FOR WOMEN</h2>
                                                    <div class="slider-description">
                                                        <p>Easy & safe payment with PayPal. sequines & embroidered
                                                            for all</p>
                                                    </div>
                                                    <a href="{{route('shop')}}" class="slider-btn2">View Collections</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-single bg-image bg-image-3-3">
                                        <div class="container">
                                            <div class="single-inner">
                                                <div class="content-box">
                                                    <p class="slider-subtitle"><img
                                                            src="{{ asset('frontend/assets/images/banner/wvbo-icon.png') }}"
                                                            alt=""> Spring
                                                        summer 22 women’s collection </p>
                                                    <h2 class="slider-title"> NEW COLLECTION <br> FOR WOMEN</h2>
                                                    <div class="slider-description">
                                                        <p>Easy & safe payment with PayPal. sequines & embroidered
                                                            for all</p>
                                                    </div>
                                                    <a href="{{route('shop')}}" class="slider-btn2">View Collections</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-single bg-image bg-image-3-4">
                                        <div class="container">
                                            <div class="single-inner">
                                                <div class="content-box">
                                                    <p class="slider-subtitle"><img
                                                            src="{{ asset('frontend/assets/images/banner/wvbo-icon.png') }}"
                                                            alt=""> Spring
                                                        summer 22 women’s collection </p>
                                                    <h2 class="slider-title"> WINTER DRESS <br> FOR WOMEN</h2>
                                                    <div class="slider-description">
                                                        <p>Easy & safe payment with PayPal. sequines & embroidered
                                                            for all</p>
                                                    </div>
                                                    <a href="{{route('shop')}}" class="slider-btn2">View Collections</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-navigation">
                                <div class="swiper-button-prev slider-btn prev"><i class="rt rt-arrow-left-long"></i></div>
                                <div class="swiper-button-next slider-btn next"><i class="rt rt-arrow-right-long"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="rts-offer-section">
        <div class="container">
            <div class="rts-offer-inner">
                @if (App\Models\Offer::where('status', '1')->exists())
                <p class="description">Super discount for your {{App\Models\Offer::where('status', '1')->first()->price}} Tk purchase. Use this code <a class="text-uppercase" href="{{route('shop')}}">{{App\Models\Offer::where('status', '1')->first()->rel_to_coupon->coupon_name}}</a></p>
                    
                @else
                <p class="description">Super discount for your purchase.</p>
                @endif
                
                
            </div>
        </div>
    </div>

    <div></div>


    <div class="rts-new-collection-section section-gap">
        <div class="container">
            <div class="recent-products-header section-header">
            </div>
            <div class="swiper rts-cmmnSlider-over swiper-initialized swiper-horizontal swiper-pointer-events"
                data-swiper="pagination">
                <div class="swiper-wrapper" id="swiper-wrapper-4013026477cc1587" aria-live="off"
                    style="transform: translate3d(-2860px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($categories as $category)
                    <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="{{$category->id}}" role="group"
                        aria-label="1 / 4" style="width: 327.5px; margin-right: 30px;">
                        <div class="collection-item">
                            <a href="{{route('shop')}}"><img src="{{asset('uploads/category')}}/{{$category->category_image}}" alt="collection-image">
                            </a>
                            <p class="item-quantity">{{App\Models\Product::where('category_id', $category->id)->count()}} <span>items</span></p>
                            <a href="{{route('shop')}}" class="item-catagory-box">
                                <h3 class="title">{{$category->category_name}}</h3>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>

    <!--================= Hand Picked Section Start Here =================-->
    <div class="rts-hand-picked-products-section">
        <div class="container">
            <div class="section-header section-header3 text-center">
                <div class="wrapper">
                    <div class="sub-content">
                        <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                        <span class="sub-text">Featured</span>
                        <img class="line-2" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                    </div>
                    <h2 class="title">HAND-PICKED PRODUCT</h2>
                    
                </div>
            </div>
            <div class="slider-div">
                <div class="swiper rts-sixSlide-over">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="product-item element-item1">
                                    <a href="{{route('product.details', $product->slug)}}" class="product-image image-hover-variations">
                                        <div class="image-vari1 image-vari"><img
                                                src="{{asset('uploads/products/preview')}}/{{$product->preview_one}}" alt="product-image">
                                        </div>
                                        <div class="image-vari2 image-vari"><img
                                                src="{{asset('uploads/products/preview')}}/{{$product->preview_two}}" alt="product-image">
                                        </div>
                                    </a>
                                    <div class="bottom-content">
                                        <a href="{{route('product.details', $product->slug)}}" class="product-name">{{$product->product_name}}</a>
                                        <div class="action-wrap">
                                            <span class="price">{{$product->after_discount}} Tk</span>
                                        </div>
                                    </div>
                                    <div class="quick-action-button">
                                        <div class="cta-single cta-plus">
                                            <a href="#"><i class="rt-plus"></i></a>
                                        </div>
                                        <div class="cta-single cta-quickview">
                                            <button id="{{$product->id}}" class="eye_id product-details-popup-btn"><i class="far fa-eye"></i>
                                        </div>
                                        <div class="cta-single cta-wishlist">
                                            <a href="{{route('wishlist.add.single', $product->id)}}"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div class="cta-single cta-addtocart">
                                            <a href="{{route('cart.add.single', $product->id)}}"><i class="rt-basket-shopping"></i></a>
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
    <!--================= Hand Picked Section End Here =================-->

    
    <!--================= Deal Section Start Here =================-->
    
    <div class="rts-deal-section1">
        <div class="container">
            <div class="section-inner">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-inner">
                            <div class="content-box">
                                <div class="sub-content">
                                    <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                                    <span class="sub-text">Deal Of The Week</span>
                                </div>
                                @foreach ($deals as $deal)
                                <h2 style="width: 76%" class="slider-title">{{$deal->title}} </h2>
                                <div class="slider-description">
                                    <p>{{$deal->description}}</p>
                                </div>
                                <div class="countdown" id="countdown">
                                    <ul>
                                        <li><span id="days"></span>D</li>
                                        <li><span id="hours"></span>H</li>
                                        <li><span id="minutes"></span>M</li>
                                        <li><span id="seconds"></span>S</li>
                                    </ul>
                                </div>
                                <div class="content-bottom">
                                    <div class="img-box"><img src="assets/images/hand-picked/deal-icon.png" alt="">
                                    </div>
                                    <p class="content">{{$deal->content1}}<br>
                                        {{$deal->content2}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Deal Section End Here =================-->


    <!--================= Featured Product Section Start Here =================-->
    <div class="rts-featured-product-section1">
        <div class="container">
            <div class="rts-featured-product-section-inner">
                <div class="section-header section-header3 text-center">
                    <div class="wrapper">
                        <div class="sub-content">
                            <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                            <span class="sub-text">Featured</span>
                            <img class="line-2" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                        </div>
                        <h2 class="title">FEATURED PRODUCT</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($featured as $feat_product)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                        <div class="product-item element-item1">
                            <a href="{{route('product.details', $feat_product->slug)}}" class="product-image image-hover-variations">
                                <div class="image-vari1 image-vari"><img
                                        src="{{asset('uploads/products/preview')}}/{{$feat_product->preview_one}}" alt="product-image">
                                </div>
                                <div class="image-vari2 image-vari"><img
                                        src="{{asset('uploads/products/preview')}}/{{$feat_product->preview_two}}" alt="product-image">
                                </div>
                            </a>
                            <div class="bottom-content">
                                <div class="star-rating">
                                    @php
                                    $total_review = App\Models\OrderProduct::where('product_id', $feat_product->id)->where('review', '!=', null)->count();
                                    $total_star = App\Models\OrderProduct::where('product_id', $feat_product->id)->where('review', '!=', null)->sum('star');

                                    $total_rating = 0;
                                    if($total_review != 0) {
                                        $total_rating = $total_star / $total_review;
                                    }

                                    @endphp
                                    @php
                                    for ($i = 1; $i <= $total_rating; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                    for ($j = $total_rating + 1 ; $j <= 5; $j++) {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                    @endphp
                                    
                                </div>
                                <a href="{{route('product.details', $feat_product->slug)}}" class="product-name">{{$feat_product->product_name}}</a>
                                <div class="action-wrap">
                                    <span class="price">{{$feat_product->after_discount}} Tk</span>
                                </div>
                            </div>
                            <div class="quick-action-button">
                                <div class="cta-single cta-plus">
                                    <a href=""><i class="rt-plus"></i></a>
                                </div>
                                <div class="cta-single cta-quickview">  
                                    <button id="{{$feat_product->id}}" class="eye_id product-details-popup-btn"><i class="far fa-eye"></i></button>
                                </div>
                                <div class="cta-single cta-wishlist">
                                    <a href="{{route('wishlist.add.single', $feat_product->id)}}"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="cta-single cta-addtocart">
                                    <a href="{{route('cart.add.single', $feat_product->id)}}"><i class="rt-basket-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--================= Featured Product Section End Here =================-->

     <!--================= Posters Section Start Here =================-->
     <div class="rts-posters-section1">
        <div class="container">
            <div class="row">
                @forelse ($poster as $poster)
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <a href="{{route('shop')}}" class="product-box product-box-medium product-box-medium5">
                        <div class="contents">
                            <span class="pretitle">{{$poster->pretitle1}}</span>
                            <h1 class="product-title">{{$poster->title1}}</h1>
                            <div class="view-collections go-btn">VIEW COLLECTIONS <i class="rt-arrow-right-long"></i>
                            </div>
                        </div>
                        <div class="product-thumb"><img src="{{asset('uploads/poster')}}/{{$poster->image1}}" alt="product-thumb">
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-12 col-sm-12 col-12 last-child">
                    <a href="{{route('shop')}}" class="product-box product-box-medium mid">
                        <div class="contents">
                            <span class="pretitle">{{$poster->pretitle2}}</span>
                            <h1 class="product-title">{{$poster->title2}}</h1>
                            <p>{{$poster->text}}</p>
                        </div>
                        <div class="product-thumb product-thumb1"><img src="{{asset('uploads/poster')}}/{{$poster->image2}}"
                                alt="product-thumb"></div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <a href="{{route('shop')}}" class="product-box product-box-medium product-box-medium3">
                        <div class="contents">
                            <span class="pretitle">{{$poster->pretitle3}}</span>
                            <h1 class="product-title">{{$poster->title3}}</h1>
                            <div class="view-collections go-btn">Shop Now <i class="rt-arrow-right-long"></i></div>
                        </div>
                        <div class="product-thumb"><img src="{{asset('uploads/poster')}}/{{$poster->image3}}"
                                alt="product-thumb"></div>
                    </a>
                </div>
                @empty
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <a href="{{route('shop')}}" class="product-box product-box-medium product-box-medium5">
                        <div class="contents">
                            <span class="pretitle">50% Offer</span>
                            <h1 class="product-title">Last call for up <br> to 30% off</h1>
                            <div class="view-collections go-btn">VIEW COLLECTIONS <i class="rt-arrow-right-long"></i>
                            </div>
                        </div>
                        <div class="product-thumb"><img src="{{asset('frontend/assets/images/featured/pot.png')}}" alt="product-thumb">
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-12 col-sm-12 col-12 last-child">
                    <a href="{{route('shop')}}" class="product-box product-box-medium mid">
                        <div class="contents">
                            <span class="pretitle">-45% Offer</span>
                            <h1 class="product-title">SUMMER COLLECTION</h1>
                            <p>Don't miss the last opportunity</p>
                        </div>
                        <div class="product-thumb product-thumb1"><img src="{{asset('frontend/assets/images/products/dress.png')}}"
                                alt="product-thumb"></div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                    <a href="{{route('shop')}}" class="product-box product-box-medium product-box-medium3">
                        <div class="contents">
                            <span class="pretitle">SUMMER DRESS</span>
                            <h1 class="product-title">BEST COLLECTION</h1>
                            <div class="view-collections go-btn">Shop Now <i class="rt-arrow-right-long"></i></div>
                        </div>
                        <div class="product-thumb"><img src="{{asset('frontend/assets/images/featured/3rd-image.png')}}"
                                alt="product-thumb"></div>
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!--================= Posters Section End Here =================-->

    <!--================= Brand Section Start Here =================-->
    <div class="rts-brands-section1 brand-bg3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="slider-div">
                        <div class="swiper rts-brandSlide1">
                            <div class="swiper-wrapper">
                                @foreach ($brands as $brand)
                                <div class="swiper-slide">
                                    <img src="{{asset('uploads/brand')}}/{{$brand->brand_image}}"alt="Brand Logo">
                                    {{-- <a class="brand-front" href="#"><img src="{{asset('uploads/brand')}}/{{$brand->brand_image}}"alt="Brand Logo"></a> --}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Brand Section End Here =================-->
    <div class="product-details-popup-wrapper">
        <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
            <div class="product-details-popup">
                <button class="product-details-close-btn"><i class="fal fa-times"></i></button>
                <div class="details-product-area">
                    
                </div>
            </div>
        </div>
    </div>


    <div class="rts-featured-product-section3">
        <div class="container">
            <div class="rts-featured-product-section-inner">
                <div class="section-header section-header3 text-center">
                    <div class="wrapper">
                        <div class="sub-content">
                            <img class="line-1" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                            <span class="sub-text">Featured</span>
                            <img class="line-2" src="{{asset('frontend/assets/images/banner/wvbo-icon.png')}}" alt="">
                        </div>
                        <h2 class="title">FEATURED PRODUCT</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($blog_latest as $blog)
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="full-wrapper wrapper-1">
                            <div class="image-part">
                                <a href="{{route('blog.details', $blog->slug)}}" class="image"><img src="{{asset('uploads/blog')}}/{{$blog->feat_image}}" alt="Featured Image"></a>
                            </div>
                            <div class="blog-content">
                                <span class="date-full">
                                    <span class="day">{{$blog->created_at->format('d')}}</span>
                                    <br>
                                    <span class="month">{{$blog->created_at->format('M')}}</span>
                                </span>
                                <ul class="blog-meta">
                                    <li><a href="">{{$blog->rel_to_category->category_name}}</a></li>
                                </ul>
                                <div class="title">
                                    <a href="{{route('blog.details', $blog->slug)}}">{{Str::limit($blog->title, '80', '')}}</a>
                                </div>
                                <div class="author-info d-flex align-items-center">
                                    <div class="avatar">
                                        @if ($blog->rel_to_user->image == null)
                                            <img class="cat-thumb" src="{{Avatar::create($blog->rel_to_user->name)->toBase64()}}" alt="">
                                            @else
                                            <img class="cat-thumb" src="{{asset('uploads/users')}}/{{$blog->rel_to_user->image}}" class="user-image" alt="User Image" />
                                        @endif
                                    </div>
                                    <div class="info">
                                        <p class="author-name">{{$blog->rel_to_user->name}}</p>
                                        <p class="author-dsg">Author</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="full-wrapper wrapper-2">
                            <div class="image-part">
                                <a href="#" class="image"><img src="{{asset('frontend/assets/images/featured/img-2.jpg')}}" alt="Featured Image"></a>
                            </div>
                            <div class="blog-content">
                                <span class="date-full">
                                    <span class="day">25</span>
                                    <br>
                                    <span class="month">Jul</span>
                                </span>
                                <ul class="blog-meta">
                                    <li><a href="#">WINTER DRESS</a></li>
                                </ul>
                                <div class="title">
                                    <a href="#">Once determined, you need to come up with a name a legal structure</a>
                                </div>
                                <div class="author-info d-flex align-items-center">
                                    <div class="avatar"><img src="{{asset('frontend/assets/images/featured/author.png')}}" alt="Author Image"></div>
                                    <div class="info">
                                        <p class="author-name">REACTHEMES</p>
                                        <p class="author-dsg">Author</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="full-wrapper wrapper-3">
                            <div class="image-part">
                                <a href="#" class="image"><img src="{{asset('frontend/assets/images/featured/img-3.jpg')}}" alt="Featured Image"></a>
                            </div>
                            <div class="blog-content">
                                <span class="date-full">
                                    <span class="day">25</span>
                                    <br>
                                    <span class="month">Jul</span>
                                </span>
                                <ul class="blog-meta">
                                    <li><a href="#">WINTER DRESS</a></li>
                                </ul>
                                <div class="title">
                                    <a href="#">At the limit, statically generated, edge delivered a food</a>
                                </div>
                                <div class="author-info d-flex align-items-center">
                                    <div class="avatar"><img src="{{asset('frontend/assets/images/featured/author.png')}}" alt="Author Image"></div>
                                    <div class="info">
                                        <p class="author-name">REACTHEMES</p>
                                        <p class="author-dsg">Author</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    
@endsection

@section('footer_script')

@endsection
