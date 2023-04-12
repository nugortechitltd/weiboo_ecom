@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">Shop</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">Shop</a></li>
            </ul>
        </div>
    </div>
</div>

<!--================= Shop Section Start Here =================-->
<div class="rts-shop-section section-gap">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="side-sticky">
                    <div class="shop-side-action">
                        <div class="action-item">
                            <div class="action-top">
                                <span class="action-title">category</span>
                                {{-- @php
                                    $id = Request::get('search')
                                @endphp
                                
                                {{$id}} --}}
                            </div>
                            @forelse ($categories as $category)
                            <div class="category-item">
                                <div class="category-item-inner">
                                    <div class="category-title-area">
                                        <span class="point"></span>
                                        {{-- <option class="category_id" value="{{$main->id}}">{{$main->category_name}}({{App\Models\Product::where('category_id', $main->id)->count()}})</option> --}}
                                        <div class="category-label">
                                            <input id="category{{$category->id}}" class="category_id" name="category" type="radio" value="{{$category->id}}" {{($category->id == @$_GET['category_id'])?'checked': ''}}>
                                            <label for="category{{$category->id}}" class="checkbox-custom-label">{{$category->category_name}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <h2 class="text-danger">No Search Found!</h2>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="action-item">
                            <div class="action-top">
                                <span class="action-title">Filter</span>
                            </div>
                            <div class="nstSlider" data-range_min="0" data-range_max="10000" data-cur_min="{{@$_GET['min'] == null ? '0' : @$_GET['min']}}"
                                data-cur_max="{{@$_GET['max'] == null ? '100000': @$_GET['max']}}">
                                {{-- <div class="nstSlider" data-range_min="0" data-range_max="10000" data-cur_min="20"
                                data-cur_max="10000"> --}}

                                <div class="bar"></div>
                                <div class="leftGrip price-range-grip"></div>
                                <div class="rightGrip price-range-grip"></div>
                            </div>
                            <div class="range-label-area">
                                <div class="min-price d-flex">
                                    <span class="range-lbl">Min:</span>
                                    <span class="currency-symbol pe-1">Tk</span>
                                    <option class="leftLabel price-range-label" name="min_price" value="{{@$_GET['min']}}">
                                </div>
                                <div class="max-price d-flex">
                                    <span class="range-lbl">Max:</span>
                                    <span class="currency-symbol pe-1">Tk </span>
                                    <option class="rightLabel price-range-label" name="max_price" value="{{@$_GET['max']}}">
                                </div>
                            </div>
                        </div>
                        <div class="action-item">
                            <div class="action-top">
                                <span class="action-title">Color</span>
                            </div>
                            @foreach ($colors as $color)
                            <div class="color-item  form-option form-check-inline mb-1 category-label">
                                <span class="color" style="background-color: {{$color->color_code}}; border: 1px solid #333">
                                <i class="fas fa-check"></i>
                                </span>
                                <input class="color_id" type="radio" name="color_id" id="color{{$color->id}}" value="{{$color->id}}" {{$color->id == @$_GET['color_id'] ? 'checked' : ''}}>
                                <label for="color{{$color->id}}">{{$color->color_name}}</label>
                                <div class="color-arrow"><i class="far fa-long-arrow-right"></i></div>
                            </div>
                            @endforeach
                        </div>
                        <div class="action-item">
                            <div class="action-top">
                                <span class="action-title">Brand</span>
                            </div>
                            <div class="product-brands">
                                <div class="brands-inner">
                                    <div class="category-item">
                                        <div class="category-item-inner">
                                            <div class="category-title-area d-block text-capitalize d-block">
                                                @foreach ($brands as $brand)
                                               <div class="category-label">
                                                    <input class="brand_id" type="radio" name="brand_id" id="brand{{$brand->id}}" value="{{$brand->id}}" {{$brand->id == @$_GET['brand_id'] ? 'checked' : ''}}>
                                                    <label for="brand{{$brand->id}}">{{$brand->brand_name}}</label>
                                               </div>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{route('shop')}}" class="banner-item">
                                <div class="banner-inner">
                                    <span class="pretitle">Winter Fashion</span>
                                    <h1 class="title">Behind the
                                        deseart</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="shop-product-topbar">
                    <span class="items-onlist">Showing {{$search_product->count()}}-{{App\Models\Product::all()->count()}} of  {{App\Models\Product::all()->count()}}results</span>
                    <div class="filter-area">
                        <p class="select-area">
                            <select class="select" id="sort">
                                <option value="" selected>Sort by average rating</option>
                                {{-- <option value=".popular">Sort by popularity</option>
                                <option value=".best-rate">Sort by latest</option> --}}
                                {{-- <option value="" selected="">Default Sorting</option> --}}
                                <option value="1" {{@$_GET['sort'] == 1 ? 'selected': ''}} >Sort by alphabet: A-Z</option>
                                <option value="2" {{@$_GET['sort'] == 2 ? 'selected': ''}}>Sort by alphabet: Z-A</option>
                                <option value="3" {{@$_GET['sort'] == 3 ? 'selected': ''}}>Sort by price: low to high</option>
                                <option value="4" {{@$_GET['sort'] == 4 ? 'selected': ''}}>Sort by price: high to low</option>
                            </select>
                        </p>
                    </div>
                </div>
                <div class="products-area products-area3">
                    <div class="row justify-content-center">
                        @forelse ($search_product as $product)
                            
                        
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="product-item product-item2 element-item3 sidebar-left">
                                <a href="{{route('product.details', $product->slug)}}" class="product-image">
                                    <img src="{{asset('uploads/products/preview')}}/{{$product->preview_one}}" alt="product-image">
                                </a>
                                <div class="bottom-content">
                                    <a href="{{route('product.details', $product->slug)}}" class="product-name">{{$product->product_name}}</a>
                                    <div class="action-wrap">
                                        <span class="product-price">{{$product->after_discount}} Tk</span>
                                        <a href="{{route('cart.add.single', $product->id)}}" class="addto-cart"><i class="fal fa-shopping-cart"></i> Add To
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="product-actions cta-single cta-quickview">
                                    <a href="{{route('wishlist.add.single', $product->id)}}" class="product-action"><i class="fal fa-heart"></i></a>
                                    <button id="{{$product->id}}" class="eye_id product-action product-details-popup-btn"><i class="fal fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2 class="text-danger">No Search Found!</h2>
                            </div>
                        </div>
                        @endforelse
                        
                    </div>
                </div>
                <div class="product-pagination-area mt--20">
                    {{$search_product->links()}}
                </div>
            </div>
            
        </div>
    </div>
</div>
<!--================= Shop Section Section End Here =================-->


<!--================= Product-details Section Start Here =================-->
<div class="product-details-popup-wrapper">
    <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
        <div class="product-details-popup">
            <button class="product-details-close-btn"><i class="fal fa-times"></i></button>
            <div class="details-product-area" id="product_details">

            </div>
        </div>
    </div>
</div>
<!--================= Product-details Section End Here =================-->
@endsection


@section('footer_script')

    <script>
        $(document).ready(function() {
            e.preventDefault();
            $('.price-range-label').on('change', function() {
                let left_value = $('#input_left').val();
                alert(left_value);
            })
        })
        
    </script>
    <script>
        // $('.category_id').click(function() {
        //     var search_input = $('#search_input').val();
        //     var category_id = $(this).val();
        //     var color_id = $(this).val();
        //     var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id ;
        //     window.location.href = link;
        // })

        // $('.color_id').click(function() {
        //     var search_input = $('#search_input').val();
        //     var category_id = $(this).val();
        //     var color_id = $(this).val();
        //     var link = "{{route('shop')}}" + "?q=" + search_input + "&color_id=" + color_id;
        //     window.location.href = link;
        // });
        // $('.brand_id').click(function() {
        //     var search_input = $('#search_input').val();
        //     var brand_id = $(this).val();
        //     var link = "{{route('shop')}}" + "?q=" + search_input + "&brand_id=" + brand_id;
        //     window.location.href = link;
        // }) 
        // $('#sort').change(function() {
        //     var search_input = $('#search_input').val();
        //     var sort = $(this).val();
        //     var link = "{{route('shop')}}" + "?q=" + search_input + "&sort=" + sort;
        //     window.location.href = link;
        // })
        // $('.price-range-grip').click(function() {
        //     var search_input = $('#search_input').val();
        //     var min = $('.leftLabel').val();
        //     var max = $('.rightLabel').val();
        //     var link = "{{route('shop')}}" + "?q=" + search_input + "&min=" + min + "&max=" + max;
        //     window.location.href = link;
        // })
    </script>
    <script>
        // $(document).ready(function(e) {
        //     $('.price-range-grip').on('click', function() {
        //         let 
        //         let 
        //         $.ajax({
        //             url: "{{route('shop.search')}}",
        //             method: "GET",
        //             data: {left_value: left_value, right_value: right_value},
        //             success: function(res) {
        //                 $('frontend.shop.shop').html(res);
        //             }
        //         })
        //     })
        // })
        // $('.leftGrip').click(function() {
        //     var min = $('.leftLabel').val();
        //     var link = "{{route('shop')}}" + "?q=" + search_input + "&min=" + min;
        //     window.location.href = link;
        // })
        // $('.rightGrip').click(function() {
        //     var max = $('.rightLabel').val();
        //     var link = "{{route('shop')}}" + "?q=" + search_input + "&max=" + max;
        //     window.location.href = link;
        // })
    </script>
@endsection
