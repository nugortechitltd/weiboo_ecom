@extends('frontend.master.master')

@section('content')
    <div class="page-path">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="path-title">Variable Product</h1>
                <ul>
                    <li><a class="home-page-link" href="{{ route('site') }}">Home <i class="fal fa-angle-right"></i></a></li>
                    <li><a class="current-page" href="#">Variable Product</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--================= Product-details Section Start Here =================-->
    <div class="rts-product-details-section rts-product-details-section2 section-gap">
        <div class="container">
            <div class="row product-row">
                <div class="col-xl-12">
                    <div class="product-area details-product-area mb--70 justify-content-center">
                        <div class="product-thumb-area">
                            <div class="cursor"></div>
                            @foreach ($thumbnails as $list => $thumbnail)
                                <div class="thumb-wrapper {{ $thumbnail->id }} filterd-items {{ $list == 0 ? 'figure' : 'hide' }} ">
                                    <div class="product-thumb"
                                        style="background-image: url({{ asset('uploads/products/thumbnail') }}/{{ $thumbnail->thumbnail }})">
                                        <img src="{{ asset('uploads/products/thumbnail') }}/{{ $thumbnail->thumbnail }}"
                                            alt="product-thumb">
                                    </div>
                                </div>
                            @endforeach
                            <div class="product-thumb-filter-group">
                                @foreach ($thumbnails as $sl => $thumbnail)
                                <div class="thumb-filter filter-btn {{ $sl == 0 ? 'active' : '' }}" data-show=".{{ $thumbnail->id }}"><img
                                        src="{{ asset('uploads/products/thumbnail') }}/{{ $thumbnail->thumbnail }}" alt="product-thumb-filter">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                        <div class="contents">
                            <div class="product-status">
                                <span class="product-catagory">{{App\Models\Category::where('id', $details->first()->category_id)->first()->category_name}}</span>
                                <div class="rating-stars-group">
                                    
                                    
                                    @php
                                        $total_review = App\Models\OrderProduct::where('product_id', $details->first()->id)->where('review', '!=', null)->count();
                                        $total_star = App\Models\OrderProduct::where('product_id', $details->first()->id)->where('review', '!=', null)->sum('star');

                                        $total_rating = 0;
                                        if($total_review != 0) {
                                            $total_rating = $total_star / $total_review;
                                        }

                                    @endphp
                                    @php
                                        for ($i = 1; $i <= $total_rating; $i++) {
                                            echo '<div class="rating-star"><i class="fas fa-star"></i></div>';
                                        }
                                        for ($j = $total_rating + 1 ; $j <= 5; $j++) {
                                            echo '<div class="rating-star"><i class="far fa-star"></i></div>';
                                        }
                                    @endphp
                                   
                                    <span> {{$total_star}} Reviews</span>
                                </div>
                            </div>
                            <h2 class="product-title">{{$details->first()->product_name}}</h2>
                            <input type="hidden" name="product_id" value="{{ $details->first()->id }}">
                            @if ($details->first()->discount != null)
                            <span class="product-price"><span class="old-price">{{$details->first()->product_price}} Tk</span> {{$details->first()->after_discount}} Tk</span>
                            @else
                            <span class="product-price">{{$details->first()->after_discount}} Tk</span>
                            @endif
                            <p>
                                {{$details->first()->short_desp}}
                            </p>
                            <div class="text-left ">
                                <div class="action-top mb-2">
                                    <span class="action-title">Color : </span>
                                </div>
                                @php
                                    $color = null;
                                @endphp
                                @foreach ($available_colors as $color)
                                    @if ($color->rel_to_color->color_code == null)
                                        <div class="form-check form-option form-check-inline mb-1 product-label">
                                            <input class="form-check-input colorId" type="radio" value="1" name="color_id" id="color{{ $color->rel_to_color->id }}">
                                            <label class="form-option-label product__details__label rounded-circle" style="background: {{ $color->rel_to_color->color_name }}" for="color{{ $color->rel_to_color->id }}">
                                                <span class="form-option-color rounded-circle">NA</span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check form-option form-check-inline mb-1 product-label">
                                            <input class="form-check-input colorId" type="radio" value="{{ $color->rel_to_color->id }}" name="color_id" id="color{{ $color->rel_to_color->id }}">
                                            <label class="form-option-label product__details__label rounded-circle" style="background: {{ $color->rel_to_color->color_name }}" for="color{{ $color->rel_to_color->id }}">
                                                <span class="form-option-color rounded-circle"></span>
                                            </label>
                                        </div>
                                    @endif
                                    @php
                                        $color = $color->rel_to_color->color_code;
                                    @endphp
                                @endforeach
                            </div>
                            @error('color_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div class="action-item3">
                                <div class="action-top">
                                    <span class="action-title">Size :</span>
                                </div>
                                <div class="text-left pb-0 pt-2" id="size_id">
                                    @if ($color != null)
                                        @foreach ($sizes as $size)
                                        <div class="form-check size-option form-option form-check-inline mb-2 size-label">
                                            <input class="form-check-input" value="{{$size->id}}" type="radio" name="size_id" id="size{{$size->id}}">
                                            <label class="form-option-label product__details__label form-option-size" for="size{{$size->id}}"><span>{{$size->size_name}}</span></label>
                                        </div>
                                        @endforeach
                                    @else
                                    @foreach (App\Models\Inventory::where('product_id', $details->first()->id)->get() as $size)
                                    @if ($size->rel_to_size->id == 1)
                                    <div class="form-check size-option form-option form-check-inline mb-2 size-label">
                                        <input class="form-check-input" value="{{$size->rel_to_size->id}}" type="radio" name="size_id" id="size{{$size->id}}">
                                        <label class="form-option-label product__details__label form-option-size" for="size{{$size->id}}"><span>{{$size->size_name}}</span></label>
                                    </div>
                                    @else
                                    <div class="form-check size-option form-option form-check-inline mb-2 size-label">
                                        <input class="form-check-input" value="{{$size->rel_to_size->id}}" type="radio" name="size_id" id="size{{$size->id}}">
                                        <label class="form-option-label product__details__label form-option-size" for="size{{$size->id}}"><span>{{$size->size_name}}</span></label>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                                @error('size_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- Quantity --}}
                            <div class="product-bottom-action">
                                    <div class="d-flex w-100">
                                        <div class="cart-edit">
                                            <div class="quantity-edit action-item">
                                                <button class="button input-group-prepend decrement-btn"><i class="fal fa-minus minus"></i></button>
                                                <input type="text" name="quantity" class="input" value="1" />
                                                <button class="button plus input-group-append increment-btn">+<i class="fal fa-plus plus"></i></button>
                                            </div>
                                        </div>
                                        <button name="abcd" value="1" type="submit" class="addto-cart-btn action-item"><i class="rt-basket-shopping"></i>
                                            Add To
                                            Cart</button>
                                        <button type="submit" name="abcd" value="2" class="wishlist-btn action-item"><i class="rt-heart"></i></button>
                                    </div>
                                    <div class="mt-3">
                                        @if (session('total_stock'))
                                            <div class="text-danger d-block" style="margin-bottom: 10px">{{session('total_stock')}}</div>
                                        @endif
                                    </div>
                            </div>
                            
                            
                        </form>
                            <div class="product-uniques">
                                <span class="catagorys product-unipue"><span>Categories: </span> {{App\Models\Category::where('id', $details->first()->category_id)->first()->category_name}}, {{App\Models\Subcategory::where('id', $details->first()->subcategory_id)->first()->subcategory_name}},
                                {{-- @if (App\Models\Maincategory::where('id', $details->first()->maincategory_id)->first()->maincategory_name != null)
                                    {{App\Models\Maincategory::where('id', $details->first()->maincategory_id)->first()->maincategory_name}}
                                @endif --}}
                                </span>
                            </div>
                            <div class="share-social">
                                <span>Share:</span>
                                <a class="platform" href="http://facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="platform" href="http://twitter.com/" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="platform" href="http://behance.com/" target="_blank"><i
                                        class="fab fa-behance"></i></a>
                                <a class="platform" href="http://youtube.com/" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                                <a class="platform" href="http://linkedin.com/" target="_blank"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-full-details-area product-full-details-area2">
                <div class="details-filter-bar">
                    <button class="details-filter filter-btn active" data-show=".dls-one">Description</button>
                    <button class="details-filter filter-btn" data-show=".dls-two">Additional information</button>
                    <button class="details-filter filter-btn" data-show=".dls-three">Reviews</button>
                </div>
                <div class="full-details dls-one filterd-items">
                    <div class="full-details-inner">
                        <p class="mb--30">{!! $details->first()->long_desc !!}</p>
                    </div>
                </div>
                @if ($details->first()->additional_desc != null)
                <div class="full-details dls-two filterd-items hide">
                    <div class="full-details-inner">
                        <p class="mb--30">{!! $details->first()->additional_desc !!}</p>
                    </div>
                </div>
                @else
                <div class="full-details dls-two filterd-items hide">
                    <div class="full-details-inner">
                        <p class="mb--30 text-danger">Nothing given</p>
                    </div>
                </div>
                @endif
                
                
                <div class="full-details dls-three filterd-items hide">
                    @auth('customerauth')
                    @if (App\Models\OrderProduct::where('customer_id', Auth::guard('customerauth')->id())->where('product_id', $details->first()->id)->exists())
                        @if (App\Models\OrderProduct::where('customer_id', Auth::guard('customerauth')->id())->where('product_id', $details->first()->id)->whereNotNull('review')->first() == false)
                            <div class="full-details-inner">
                                <p>There are no reveiws yet.</p>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mr-10">
                                        <div class="reveiw-form">
                                            <h2 class="section-title">
                                                Be the first to reveiw <strong> <a href="product-details.html">"{{$details->first()->product_name}}"</a></strong></h2>
                                            <h4 class="sect-title">Your email address will not be published. Required fields are
                                                marked* </h4>
                                            <div class="reveiw-form-main mb-10">
                                                <div class="contact-form">
                                                    <form action="{{route('review.store')}}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="input-box text-input mb-20">
                                                                    <textarea name="review" id="validationDefault01" cols="30" rows="10" placeholder="Your Review*"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="col-lg-12">
                                                                    <div class="input-box mb-20">
                                                                        <input type="text" id="validationDefault02" name="name" placeholder="Name*" value="{{ Auth::guard('customerauth')->user()->name }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="input-box mail-input mb-20">
                                                                        <input type="email" name="email" id="validationDefault03" placeholder="E-mail*" value="{{ Auth::guard('customerauth')->user()->email }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <p>Your Rating :</p>
                                                                        <div class="rate star-label">
                                                                            <input type="radio" id="star5" name="rate" value="5" />
                                                                            <label for="star5" class="star" title="text">5 stars</label>
                                                                            <input type="radio" id="star4" name="rate" value="4" />
                                                                            <label for="star4" class="star" title="text">4 stars</label>
                                                                            <input type="radio" id="star3" name="rate" value="3" />
                                                                            <label for="star3" class="star" title="text">3 stars</label>
                                                                            <input type="radio" id="star2" name="rate" value="2" />
                                                                            <label for="star2" class="star" title="text">2 stars</label>
                                                                            <input type="radio" id="star1" name="rate" value="1" />
                                                                            <label for="star1" class="star" title="text">1 star</label>
                                                                        </div>
                                                                </div>
                                                                {{-- Hidden file --}}
                                                                <input type="hidden" name="customer_id" value="{{ Auth::guard('customerauth')->id() }}">
                                                                <input type="hidden" name="product_id" value="{{ $details->first()->id }}">
                                                                <div class="col-12 mb-15">
                                                                    <button class="form-btn form-btn4">
                                                                        Submit <i class="fal fa-long-arrow-right"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <h3>You have already given a review for this product!</h3>
                            </div>
                        @endif
                    
                    @else
                        <div class="alert alert-info">
                            <h3>You did not purchase any product right now!</h3>
                        </div>
                    @endif
                    @else
                        <div class="alert alert-info">
                            <h3>Please login to give a review <a href="{{ route('customer.login') }}" class="float-right btn btn-success">Login here</a></h3>
                        </div>
                    @endauth
                </div>
                
            </div>
        </div>
    </div>
    <!--================= Product-details Section End Here =================-->

    <!--================= Related Product Section Start Here =================-->
    <div class="rts-featured-product-section1 related-product">
        <div class="container">
            <div class="rts-featured-product-section-inner">
                <div class="section-header section-header3 section-header6">
                    <div class="wrapper">
                        <h2 class="title">RELATED PRODUCT</h2>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                        <div class="product-item element-item1">
                            <a href="product-details.html" class="product-image image-hover-variations">
                                <div class="image-vari1 image-vari"><img
                                        src="assets/images/hand-picked/slider-img13-1.webp" alt="product-image">
                                </div>
                                <div class="image-vari2 image-vari"><img src="assets/images/hand-picked/slider-img13.webp"
                                        alt="product-image">
                                </div>
                            </a>
                            <div class="bottom-content">
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a href="product-details.html" class="product-name">Girl's Sport Bra</a>
                                <div class="action-wrap">
                                    <span class="price">$31.00</span>
                                </div>
                            </div>
                            <div class="quick-action-button">
                                <div class="cta-single cta-plus">
                                    <a href="#"><i class="rt-plus"></i></a>
                                </div>
                                <div class="cta-single cta-quickview">
                                    <a href="#"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="cta-single cta-wishlist">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="cta-single cta-addtocart">
                                    <a href="#"><i class="rt-basket-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                        <div class="product-item element-item1">
                            <a href="product-details.html" class="product-image image-hover-variations">
                                <div class="image-vari1 image-vari"><img src="assets/images/hand-picked/slider-img14.webp"
                                        alt="product-image">
                                </div>
                                <div class="image-vari2 image-vari"><img
                                        src="assets/images/hand-picked/slider-img14-1.webp" alt="product-image">
                                </div>
                            </a>
                            <div class="bottom-content">
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a href="product-details.html" class="product-name">Girl's Sport Bra</a>
                                <div class="action-wrap">
                                    <span class="price">$31.00</span>
                                </div>
                            </div>
                            <div class="quick-action-button">
                                <div class="cta-single cta-plus">
                                    <a href="#"><i class="rt-plus"></i></a>
                                </div>
                                <div class="cta-single cta-quickview">
                                    <a href="#"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="cta-single cta-wishlist">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="cta-single cta-addtocart">
                                    <a href="#"><i class="rt-basket-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                        <div class="product-item element-item2">
                            <a href="product-details.html" class="product-image image-slider-variations">
                                <div class="swiper productSlide">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="image-vari1 image-vari"><img
                                                    src="assets/images/hand-picked/slider-img12-1.webp"
                                                    alt="product-image">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-vari2 image-vari"><img
                                                    src="assets/images/hand-picked/slider-img11_1.webp"
                                                    alt="product-image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-buttons">
                                    <div class="button-prev slider-btn"><i class="rt-arrow-left-long"></i></div>
                                    <div class="button-next slider-btn"><i class="rt-arrow-right-long"></i></div>
                                </div>
                            </a>
                            <div class="bottom-content">
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <a href="product-details.html" class="product-name">Maidenform Bra</a>
                                <div class="action-wrap">
                                    <span class="price">$31.00</span>
                                </div>
                            </div>
                            <div class="quick-action-button">
                                <div class="cta-single cta-plus">
                                    <a href="#"><i class="rt-plus"></i></a>
                                </div>
                                <div class="cta-single cta-quickview">
                                    <a href="#"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="cta-single cta-wishlist">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="cta-single cta-addtocart">
                                    <a href="#"><i class="rt-basket-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($related_products as $product)
                        
                    
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                        <div class="product-item element-item1">
                            <a href="{{route('product.details', $product->slug)}}" class="product-image image-hover-variations">
                                <div class="image-vari1 image-vari"><img src="{{asset('uploads/products/preview')}}/{{$product->preview_one}}"
                                        alt="product-image">
                                </div>
                                <div class="image-vari2 image-vari"><img
                                        src="{{asset('uploads/products/preview')}}/{{$product->preview_two}}" alt="product-image">
                                </div>
                            </a>
                            <div class="bottom-content">
                                <div class="star-rating">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="{{route('product.details', $product->slug)}}" class="product-name">{{$product->product_name}}</a>
                                <div class="action-wrap">
                                    <span class="price">Tk {{$product->after_discount}}</span>
                                </div>
                            </div>
                            <div class="quick-action-button">
                                <div class="cta-single cta-plus">
                                    <a href="#"><i class="rt-plus"></i></a>
                                </div>
                                <div class="cta-single cta-quickview">
                                    <a href="#"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="cta-single cta-wishlist">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="cta-single cta-addtocart">
                                    <a href="#"><i class="rt-basket-shopping"></i></a>
                                </div>
                            </div>
                            <div class="product-features">
                                @if ($product->discount != null)
                                <div class="discount-tag product-tag">-{{$product->discount}}%</div>
                                @endif
                                @if ($product->discount != null)
                                <div class="new-tag product-tag">HOT</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--================= Related Product Section End Here =================-->
@endsection
@section('footer_script')
<script>
    $('.colorId').click(function() {
        var color_id = $(this).val();
        var product_id = '{{ $details->first()->id }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/getSize',
            type: 'POST',
            data: {
                'color_id': color_id,
                'product_id': product_id
            },
            success: function(data) {
                $('#size_id').html(data)
            }
        })
    })
</script>


<script>
    
</script>
@endsection