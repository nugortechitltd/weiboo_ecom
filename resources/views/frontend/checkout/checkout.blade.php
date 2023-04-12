@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">Checkout</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">Checkout</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="rts-checkout-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-md-6">
                <form class="checkout-form" action="{{route('order.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6  col-md-6">
                            <div class="mb-4">
                                <input type="text" name="name" placeholder="Username" value="{{Auth::guard('customerauth')->user()->name}}">
                                @error('name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6">
                            <div class="mb-4">
                                <input type="email" name="email" placeholder="Email" value="{{Auth::guard('customerauth')->user()->email}}">
                                @error('email')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="mb-4">
                                <input type="tel" name="phone" placeholder="Phone number">
                                @error('phone')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <div class="mb-4">
                                <input type="text" name="address" placeholder="Address">
                                @error('address')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <textarea id="orderNotes" name="notes" cols="80" rows="4" placeholder="Order notes (optional)"></textarea>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="action-item">
                    <div class="action-top">
                        <span class="action-title">Product</span>
                        <span class="subtotal">Subtotal</span>
                    </div>
                    @foreach ($cart as $cart)
                    <div class="category-item">
                        <div class="category-item-inner">
                            <div class="category-title-area">
                                <span class="category-title">{{$cart->rel_to_product->product_name}} × {{$cart->quantity}}</span>
                            </div>
                            <div class="price">{{$cart->rel_to_product->after_discount*$cart->quantity}} Tk</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="action-middle">
                        @if (session('discount'))
                        <span class="subtotal">Subtotal(coupon)</span>
                        <span class="total-price total">{{session('total_amount')}} Tk</span>
                        @else
                        <span class="subtotal">Subtotal</span>
                        <span class="total-price total">{{session('total')}} Tk</span>
                        @endif
                    </div>
                    @if (session('discount'))
                    <input type="hidden" name="subtotal" value="{{session('total_amount')}}">
                    <input type="hidden" name="discount" value="{{session('discount')}}">
                    @else
                    <input type="hidden" name="subtotal" value="{{session('total')}}">
                    @endif

                    @foreach ($charge_details as $charge)
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input charge" type="radio" value="{{$charge->first()->charge1}}" name="charge" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                {{$charge->first()->location1}}
                            </label>
                          </div>
                        <div class="form-check">
                            <input class="form-check-input charge" type="radio" name="charge" value="{{$charge->first()->charge2}}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{$charge->first()->location2}}
                            </label>
                          </div>
                    </div>
                    @endforeach

                    <div class="action-bottom d-flex justify-between w-100">
                            <span class="total">Total(Tk)</span>
                            <div class="text-right font-bold font-weight-bold">
                                <span class="total-price" id="totalwithcharge">{{session('total')}}</span> <span class="font-bold">Tk</span>
                            </div>
                    </div>
                </div>

                {{-- <div class="color-item  form-option form-check-inline mb-1">
                    <span class="color" style="background-color: #FF0000; border: 1px solid #333">
                    <i class="fas fa-check"></i>
                    </span>
                    <input class="color_id" type="radio" name="color_id" id="color1" value="1" checked="">
                    <label for="color1">Red</label>
                    <div class="color-arrow"><i class="far fa-long-arrow-right"></i></div>
                </div> --}}
                <div class="action-item m-0">
                    <div class="mb-3 checkout">
                            <div class="form-check payment-label">
                                <i class="fas fa-money-bill"></i>
                                <input class="form-check-input" type="radio" name="payment_method" value="1" id="c1" checked>
                                <label class="form-check-label" for="c1">Cash on delivery</label>
                            </div>
                            <div class="form-check payment-label">
                                <i class="fas fa-money-bill-alt"></i>
                                <input class="form-check-input" type="radio" name="payment_method" value="2" id="c2" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" @error('bkashtran_number') checked @enderror @error('bkashtran_id') checked @enderror>
                                <label class="form-check-label" for="c2">bKash payment</label>
                                <div class="collapse  @error('bkashtran_number') show @enderror @error('bkashtran_id') show @enderror" id="collapseExample">
                                    <div class="card card-body">
                                        @if (App\Models\Payment::latest()->take(1)->exists())
                                            <p>{{App\Models\Payment::latest()->take(1)->first()->description1}} <br> bKash {{App\Models\Payment::latest()->take(1)->first()->type1}} Number: {{App\Models\Payment::latest()->take(1)->first()->bkash}}</p>
                                            @else
                                            <p>Please complete your bKash payment at first, then fill up the form below. <br> bKash Personal Number: 01737137303</p>
                                            @endif
                                            <div class="mb-3 mt-3">
                                                <label for="" class="form-label">bKash Number</label>
                                                <input type="tel" placeholder="017XXXXXXXXX" name="bkashtran_number" class="form-control">
                                                @error('bkashtran_number')
                                                    <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                                <hr>
                                                <label for="" class="form-label">bKash Transaction ID</label>
                                                <input type="text" placeholder="8B7A8D5DK7D" name="bkashtran_id" class="form-control">
                                                @error('bkashtran_id')
                                                    <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                                <hr>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-check payment-label">
                                <i class="fas fa-money-bill-alt"></i>
                                <input class="form-check-input" type="radio" name="payment_method" value="3" id="c3" data-bs-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" @error('tran_number') checked @enderror @error('tran_id') checked @enderror>
                                <label class="form-check-label" for="c3">Rocket payment</label>
                                <div class="collapse multi-collapse  @error('tran_number') show @enderror @error('tran_id') show @enderror" id="collapseExample2">
                                    <div class="card card-body">
                                        @if (App\Models\Payment::latest()->take(1)->exists())
                                            <p>{{App\Models\Payment::latest()->take(1)->first()->description2}} <br> Rocket {{App\Models\Payment::latest()->take(1)->first()->type2}} Number: {{App\Models\Payment::latest()->take(1)->first()->rocket}}</p>
                                            @else
                                            <p>Please complete your Rocket payment at first, then fill up the form below. <br> Rocket Personal Number: 01737137303</p>
                                            @endif
                                        <div class="mb-3 mt-3">
                                            <label for="" class="form-label">Rocket Number</label>
                                            <input type="tel" placeholder="017XXXXXXXXX" name="tran_number" class="form-control">
                                            @error('tran_number')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                            <hr>
                                            <label for="" class="form-label">Rocket Transaction ID</label>
                                            <input type="text" placeholder="8B7A8D5DK7D" name="tran_id" class="form-control">
                                            @error('tran_id')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <button type="submit" class="place-order-btn">Place Order</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer_script')
    <script>
        $('.charge').click(function() {
            var charge = $(this).val();
            var total = $('.total').html()
            var totalwithcharge = parseInt(total)+parseInt(charge);
            $('#totalwithcharge').html(totalwithcharge);
            // alert(totalwithcharge);
            // $('#charge').html(charge);
            // alert(totalwithcharge);
        }) 
    </script>
@endsection