@extends('frontend.master.master')
@section('content')
    <div class="page-path">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="path-title">Account</h1>
                <ul>
                    <li><a class="home-page-link" href="{{ route('site') }}">Home <i class="fal fa-angle-right"></i></a></li>
                    <li><a class="current-page" href="#">Account</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="rts-account-section section-gap">
        <div class="container">
            <div class="account-inner">
                <div class="account-side-navigation">
                    <button class="filter-btn active" data-show=".dashboard"><i class="fal fa-chart-bar"></i>Dashboard</button>
                    <button class="filter-btn" data-show=".orders"><i class="fal fa-shopping-cart"></i> Orders</button>
                    {{-- <button class="filter-btn" data-show=".address"><i class="fal fa-map-marker-alt"></i>Address</button> --}}
                    <button class="filter-btn" data-show=".accountdtls"><i class="fal fa-user"></i> Account Details</button>
                    <a href="{{route('customer.logout')}}" class="filter-btn" data-show=".dashboard"><i
                            class="fal fa-long-arrow-left"></i>Logout</a>
                </div>
                <div class="account-main-area">
                    <div class="account-main dashboard filterd-items">
                        <div class="account-profile-area">
                            <div class="">
                                @if (Auth::guard('customerauth')->user()->image == null)
                                    <img src="{{Avatar::create(Auth::guard('customerauth')->user()->name)->toBase64()}}" alt="">
                                @else
                                    <img src="{{asset('uploads/customer')}}/{{Auth::guard('customerauth')->user()->image}}" width="80" alt="profile-dp">
                                @endif
                            </div>
                            <div class="d-block ms-3">
                                <span class="profile-name"><span>Hi,</span> {{Auth::guard('customerauth')->user()->name}}</span>
                                <span class="profile-date d-block">{{Auth::guard('customerauth')->user()->created_at->format('M d')}}, {{Auth::guard('customerauth')->user()->created_at->format('Y')}}</span>
                            </div>
                        </div>
                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing
                            addresses, and edit your password and account details.</p>

                        <div class="activity-box">
                            <div class="activity-item">
                                <div class="icon"><i class="fas fa-box-check"></i></div>
                                <span class="title">Active Orders</span>
                                <span class="value">{{App\Models\Order::where('customer_id', Auth::guard('customerauth')->id())->where('status', '!=', '5')->count()}}</span>
                            </div>
                            {{-- <div class="activity-item">
                                <div class="icon"><i class="fas fa-download"></i></div>
                                <span class="title">Downloads</span>
                                <span class="value">10</span>
                            </div> --}}
                            <div class="activity-item">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <span class="title">Country</span>
                                <span class="value">{{Auth::guard('customerauth')->user()->country}}</span>
                            </div>
                            {{-- <div class="activity-item">
                                <div class="icon"><i class="fas fa-user"></i></div>
                                <span class="title">Account Details</span>
                                <span class="value">33</span>
                            </div> --}}
                            <div class="activity-item">
                                <div class="icon"><i class="fas fa-heart"></i></div>
                                <span class="title">Wishlist</span>
                                <span class="value">{{App\Models\Wishlist::where('customer_id', Auth::guard('customerauth')->id())->count()}}</span>
                            </div>
                            <a href="{{route('customer.logout')}}" class="activity-item">
                                <div class="icon"><i class="fas fa-sign-out-alt"></i></div>
                                <span class="title">Logout</span>
                            </a>
                        </div>
                    </div>
                    <div class="account-main orders filterd-items hide">
                        <h2 class="mb--30">My Orders ({{$orders->count()}})</h2>
                        <table class="table">
                            <thead>
                                <tr class="top-tr">
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->order_id}}</td>
                                    <td>{{$order->created_at->format('M d')}}, {{$order->created_at->format('Y')}}</td>
                                    <td><span class="ft-medium small text-light bg-@php
                                        if($order->status == 0) {
                                            echo 'secondary';
                                        } else if($order->status == 1) {
                                            echo 'primary';
                                        } else if($order->status == 2) {
                                            echo 'info';
                                        } else if($order->status == 3) {
                                            echo 'warning';
                                        } else if($order->status == 4) {
                                            echo 'success';
                                        } else {
                                            echo 'danger';
                                        } 
                                        @endphp rounded px-3 py-1">
                                        @php
                                            if($order->status == 0) {
                                                echo 'Confirmed Order';
                                            } else if($order->status == 1) {
                                                echo 'Processing Order';
                                            } else if($order->status == 2) {
                                                echo 'Product Dispatched';
                                            } else if($order->status == 3) {
                                                echo 'On delivery';
                                            } else if($order->status == 4){
                                                echo 'Product Delivered';
                                            } else {
                                                echo 'Cancelled';
                                            }
                                        @endphp
                                    </span>
                                    </td>
                                    <td>{{$order->total}} Tk</td>
                                    {{-- <td>Download</td> --}}
                                    <td><a href="{{route('download.invoice', $order->id)}}" class="btn btn-info text-white">Download</a></td>
                                    {{-- @foreach (App\Models\Orderproduct::where('order_id', $order->order_id)->get() as $product)
                                    <td><img src="{{asset('uploads/products/preview')}}/{{$product->rel_to_product->preview_one}}" width="60" alt=""></td>
                                    @endforeach --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="account-main address filterd-items hide">
                        <div class="row">
                            <div class="col-xl-5 col-md-5">
                                <div class="billing-address">
                                    <h2 class="mb--30">Billing Address</h2>
                                    <address>
                                        3522 Interstate<br>
                                        75 Business Spur,<br>
                                        Sault Ste. <br>Marie, MI 49783
                                    </address>
                                    <p class="mb--10">New York</p>
                                    <a href="#" class="btn-small">Edit</a>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-5">
                                <div class="shipping-address">
                                    <h4 class="mb--30">Shipping Address</h4>
                                    <address>
                                        4299 Express Lane<br>
                                        Sarasota, <br>FL 34249 USA <br>Phone: 1.941.227.4444
                                    </address>
                                    <p class="mb--10">Sarasota</p>
                                    <a href="#" class="btn-small">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="account-main accountdtls filterd-items hide">
                        <div class="login-form">
                            <div class="section-title">
                                <h2>Account details</h2>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" action="{{route('customer.update')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="form col-lg-6">
                                                <input type="text" class="form-control" name="name" placeholder="Username" value="{{Auth::guard('customerauth')->user()->name}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form col-lg-6">
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::guard('customerauth')->user()->email}}">
                                                @error('email')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form col-lg-6">
                                                <input type="password" name="password" class="form-control" placeholder="New password">
                                            </div>
                                            <div class="form col-lg-6">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form col-lg-4">
                                                <input type="text" name="country" class="form-control" placeholder="Country" value="{{Auth::guard('customerauth')->user()->country}}">
                                            </div>
                                            <div class="form col-lg-8">
                                                <input type="text" name="address" class="form-control" placeholder="Address" value="{{Auth::guard('customerauth')->user()->address}}">
                                            </div>
                                        </div>
                                        
                                        <div class="form">
                                            <input type="file" name="image" class="form-control" >
                                        </div>
                                        <div class="form">
                                            <textarea name="details" class="form-control" rows="5" placeholder="Details">{{Auth::guard('customerauth')->user()->details}}</textarea>
                                        </div>
                                        <div class="form">
                                            <button type="submit" class="btn">Update information <i class="fal fa-long-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offer-ad mt--40"><img src="{{asset('frontend/assets/images/banner/45Offer.jpg')}}" alt="ad"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
