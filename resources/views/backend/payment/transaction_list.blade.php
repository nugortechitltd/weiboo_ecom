@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Transaction</h1>
            <p class="breadcrumbs"><span><a href="{{ route('home') }}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All transaction
            </p>
        </div>
        <div>
            {{-- <a href="{{route('payment.list')}}" class="btn btn-primary">All payment</a> --}}
        </div>
    </div>

    <!-- CONTENT WRAPPER -->
			
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="ec-cat-list card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table">
                        <thead>                                                           
                            <tr>
                                <th>ID</th>
                                <th>Customer name</th>
                                {{-- <th>Seller name</th> --}}
                                <th>Transaction Type</th>
                                <th>Date</th>
                                <th>Amount(Tk)</th>
                                <th>Method</th>
                                <th>Order ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $sl=>$transaction)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$transaction->rel_to_customer->name}}</td>
                                <td>
                                    @php
                                            if($transaction->status == 0) {
                                                echo 'Confirmed Order';
                                            } else if($transaction->status == 1) {
                                                echo 'Processing Order';
                                            } else if($transaction->status == 2) {
                                                echo 'Product Dispatched';
                                            } else if($transaction->status == 3) {
                                                echo 'On delivery';
                                            } else if($transaction->status == 4){
                                                echo 'Product Delivered';
                                            } else {
                                                echo 'Cancelled';
                                            }
                                        @endphp
                                </td>
                                <td>{{$transaction->created_at->format('d M Y')}}</td>
                                <td>{{$transaction->total}}</td>
                                <td>
                                    @php
                                            if($transaction->payment_method == 1) {
                                                echo 'Cash on delivery';
                                            } else if($transaction->payment_method == 2) {
                                                echo 'bKash';
                                            } else {
                                                echo 'Rocket';
                                            }
                                        @endphp
                                </td>
                                <td><span class="badge badge-success">{{$transaction->order_id}}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button"
                                            class="btn btn-outline-success">Info</button>
                                        <button type="button"
                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static">
                                            <span class="sr-only">Info</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- <a class="dropdown-item" href="#">Edit</a> --}}
                                            <a class="dropdown-item" href="{{route('transaction.delete', $transaction->id)}}">Delete</a>
                                        </div>
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
