@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Coupon</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All coupon
            </p>
        </div>

        <div>
            <a href="{{route('coupon')}}" class="btn btn-primary">Add coupon</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Discount</th>
                                    <th>Validity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($coupons as $sl=>$coupon)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$coupon->coupon_name}}</td>
                                    <td>{{$coupon->coupon_type == 1 ? 'Percentage': 'Solid amount'}}</td>
                                    <td>{{$coupon->coupon_type == 1 ? $coupon->coupon_amount." %" : $coupon->coupon_amount." Tk"}}</td>
                                    <td>
                                        <div class="badge badge-{{(Carbon\Carbon::now() > ($coupon->validity))?'warning':'primary'}}">
                                            {{Carbon\Carbon::now()->diffInDays($coupon->validity, false)}} days left
                                        </div>
                                    </td>
                                    <td><a href="{{route('coupon.delete', $coupon->id)}}" class="badge badge-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection