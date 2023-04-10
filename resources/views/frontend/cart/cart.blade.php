@extends('frontend.master.master')
@section('content')
@php
    $cart = App\Models\Cart::where('customer_id', Auth::guard('customerauth')->id())
@endphp
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">Cart</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="">Cart</a></li>
            </ul>
        </div>
    </div>
</div>
<!--================= Cart Section Start Here =================-->
<div class="rts-cart-section">
    <div class="container">
        <h4 class="section-title">Product List</h4>
        <div class="row justify-content-between">
            <div class="col-xl-7">
                <div class="cart-table-area">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0
                            @endphp
                            <form action="{{route('cart.update')}}" method="POST">
                                @csrf
                            @foreach ($cart->get() as $cart)
                            <tr>
                                <td><div class="product-thumb"><img style="width:120px; height: 136px" src="{{asset('uploads/products/preview')}}/{{$cart->rel_to_product->preview_one}}" alt="product-thumb"></div></td>
                                <td>
                                    <div class="product-title-area">
                                        <span class="pretitle">{{$cart->rel_to_product->rel_to_category->category_name}}</span>
                                        <h4 class="product-title">{{$cart->rel_to_product->product_name}}</h4>
                                    </div>
                                </td>
                                <td><span class="product-price">Tk {{$cart->rel_to_product->after_discount}}</span></td>
                                <td>
                                    <div class="cart-edit">
                                        @php
                                            $quantity = $cart->quantity;
                                        @endphp
                                        <div class="quantity-edit">
                                            <button class="button input-group-prepend decrement-btn"><i class="fal fa-minus minus"></i></button>
                                            <input type="number" name="quantity[{{$cart->id}}]" class="input" value="{{$quantity}}" />
                                            <button class="button plus input-group-append increment-btn">+<i class="fal fa-plus plus"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="last-td"><a href="{{route('cart.single.delete', $cart->id)}}" class="remove-btn">Remove</a></td>
                            </tr>
                            @php
                                $subtotal += $cart->rel_to_product->after_discount*$cart->quantity;
                            @endphp
                            @endforeach
                        </tbody>


                        
                    </table>
                    <div class="text-end">
                        @auth('customerauth')
                        @if ($subtotal == 0)
                        @else
                            <button type="submit" class="btn btn-outline-dark">Update</button>
                        @endif
                        
                        @endauth
                    </div>
                </form>
                
                <form action="{{route('cart')}}" method="GET">
                    <div class="coupon-apply">
                        <div class="apply-input">
                            @if (App\Models\Offer::where('status', '1')->exists())
                                @if ($subtotal >= App\Models\Offer::where('status', '1')->first()->price)
                                <span class="coupon-text">Coupon Code:</span>
                            <input type="text" value="{{@$_GET['coupon']}}" name="coupon" placeholder="Apply coupon here">
                            <button type="submit" class="apply-btn">Apply </i></button>
                                @endif  
                            @endif
                        </div>
                    </div>
                </form>
                @if($message) 
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @endif
                </div>
                
            </div>
            <div class="col-xl-4">
                <div class="checkout-box">
                    <div class="checkout-box-inner">
                        <div class="subtotal-area">
                            <span class="title">Subtotal</span>
                            <span class="subtotal-price">{{$subtotal}} Tk</span></span>
                            
                        </div>
                        {{-- <div class="shipping-check">
                            <span class="title">Shipping</span>
                            <div class="check-options">
                                <form>
                                      <div class="form-group">
                                        <input type="checkbox" id="fltrt">
                                        <label class="check-title" for="fltrt">Flat rate</label>
                                      </div>
                                      <div class="form-group">
                                        <input type="checkbox" id="frsh">
                                        <label class="check-title" for="frsh">Free shipping</label>
                                      </div>
                                </form>
                            </div>
                        </div> --}}
                        @if ($type == 1)
                            @php
                                $discount = $subtotal*$discount/100;
                                $total= $subtotal - $discount
                            @endphp
                        @else
                            @php
                                $total= $subtotal - $discount
                            @endphp
                        @endif
                        
                        <div class="shipping-location">
                            <span class="title">Discount {{$type == 1? '(%)': '(Tk)'}}</span>
                            <span class="subtotal-price">{{$discount}} Tk</span></span>
                        </div>
                        <div class="total-area">
                            <span class="title">Total</span>
                            <span class="total-price">{{$total}} Tk</span>
                        </div>
                    </div>
                    <a href="{{route('checkout')}}" class="procced-btn">Procced To Checkout</a>
                    <a href="{{route('shop')}}" class="continue-shopping"><i class="fal fa-long-arrow-left"></i> Continue Shopping</a>
                </div>
                @php
                    $total = $subtotal - $discount;
                    session([
                        'discount' => $discount,
                        'total_amount' => $total
                    ])
                @endphp
            </div>
            
        </div>
    </div>
</div>

<!--================= Cart Section End Here =================-->
@endsection