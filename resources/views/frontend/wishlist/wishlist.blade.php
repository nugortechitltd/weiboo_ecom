@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">Wishlist</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">Wishlist</a></li>
            </ul>
        </div>
    </div>
</div>

<!--================= Cart Section Start Here =================-->
<div class="rts-wishlist-section section-gap">
    <div class="container">
        <table class="table table-bordered">
            <tbody>
                <tr class="heading">
                    <th></th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </tbody>
            <tbody>
                @foreach ($wishlists as $wishlist)
                <tr>
                        @csrf
                    <td class="first-td"><a href="{{route('wishlist.delete', $wishlist->id)}}" class="remove-btn"><i class="fal fa-times"></i></a></td>
                    <td class="first-child"><a href="{{route('product.details', $wishlist->rel_to_product->slug)}}"><img style="width: 120px; height: 136px;" src="{{asset('uploads/products/preview')}}/{{$wishlist->rel_to_product->preview_one}}" alt=""></a>
                        <a href="{{route('product.details', $wishlist->rel_to_product->slug)}}" class="pretitle">{{$wishlist->rel_to_product->product_name}}</a>
                    </td>
                    <td><span class="product-price">{{$wishlist->rel_to_product->after_discount}} Tk</span></td>
                    <td class="stock">{{$wishlist->quantity}}</td>
                    <td class="last-td"><a href="{{route('cart.store.wishlist', $wishlist->id)}}" class="btn addToCartBtn btn-success"><i class="rt-basket-shopping"></i> Add To Cart</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="wishlist-social">
            <div class="text">
                <a href="#">Share Now</a>
            </div>
            <div class="icon">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--================= Cart Section End Here =================-->
@endsection
@section('footer_script')
    {{-- <script>
        $('.addToCartBtn').click(function(e) {
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var product_qty = $(this).closest('.product_data').find('.quantity').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: '/add-to-cart',
                data: {
                    'product_id': product_id,
                    'quantity' : quantity,
                }
                success: function(response) {
                    swal(response.status);
                }
            })
        }) 
    </script> --}}
@endsection