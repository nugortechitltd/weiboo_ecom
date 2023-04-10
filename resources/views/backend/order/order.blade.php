@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper">
<div>
    <h1>All Orders</h1>
    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
        <span><i class="mdi mdi-chevron-right"></i></span>All Orders
    </p>
</div>

</div>
<div class="row">
<div class="col-12">
    <div class="card card-default">
        <div class="card-body">
            <div class="table-responsive">
                <table id="responsive-data-table" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Subtotal</th>
                            <th>Discount</th>
                            <th>Charge</th>
                            <th>Total</th>
                            <th>Payment method</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $sl => $order)
                        <tr>
                            <td>{{$sl+1}}</td>
                            <td>{{$order->rel_to_customer->name}}</td>
                            <td>{{$order->created_at->format('d-m-Y')}}</td>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->subtotal}} Tk</td>
                            <td>{{$order->discount == null ? 'NA': $order->discount.' Tk'}}</td>
                            <td>{{$order->charge}} Tk</td>
                            <td>{{$order->total}} Tk</td>
                            <td>
                                @php
                                    if($order->payment_method == 1) {
                                        echo 'Cash on delivery';
                                    } else if($order->payment_method == 2) {
                                        echo 'bKash';
                                    } else {
                                        echo 'Rocket';
                                    }
                                @endphp
                            </td>
                            <td> 
                                <span class="badge badge-@php
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
                                @endphp">
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
                            <td>
                                <form action="{{route('order.status')}}" method="POST">
                                    @csrf
                                <div class="btn-group mb-1">
                                    <button type="button"
                                        class="btn btn-outline-success">Info</button>
                                    <button type="button"
                                        class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-display="static">
                                        <span class="sr-only">Info</span>
                                    </button>
                                   
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'0'}}">Order Confirm</button>
                                            <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'1'}}">Order Processing</button>
                                            <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'2'}}">Order Dispatched</button>
                                            <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'3'}}">Order On Delivery</button>
                                            <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'4'}}">Order Delivered</button>
                                            <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'5'}}">Order Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
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