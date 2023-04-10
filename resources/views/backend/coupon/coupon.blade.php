@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Coupon</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Coupon</p>
    </div>
    <div>
        <a href="{{route('coupon.list')}}" class="btn btn-primary">All coupon</a>
    </div>
        
</div>
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add New Coupon</h4>
                    {{--  --}}
                    <form class="row" method="POST" action="{{route('coupon.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <label class="form-label">Coupon type</label>
                            <select name="coupon_type">
                                    <option>Select coupon type</option>
                                    <option value="1">Percentage</option>
                                    <option value="2">Solid amount</option>
                            </select>
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">Coupon name</label> 
                                <input id="text" name="coupon_name" class="form-control" type="text" placeholder="Coupon name">
                                @error('coupon_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                         <div class="col-12">
                               <label for="text" class="col-form-label">Discount amount</label> 
                                <input name="coupon_amount" class="form-control" type="number" placeholder="Discount amount">
                                @error('coupon_amount')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Discount validity</label> 
                                <input name="validity" class="form-control" type="date" placeholder="Discount amount">
                                @error('validity')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 


                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-3">Add coupon</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> 
@endsection