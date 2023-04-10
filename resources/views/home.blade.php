@extends('layouts.dashboard')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome Mr. {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="row">
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-1">
            <div class="card-body">
                <h2 class="mb-1">{{$totalOrder}}</h2>
                <p>Daily Signups</p>
                <span class="mdi mdi-account-arrow-left"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-2">
            <div class="card-body">
                <h2 class="mb-1">{{$todayOrder}}</h2>
                <p>Daily Visitors</p>
                <span class="mdi mdi-account-clock"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-3">
            <div class="card-body">
                <h2 class="mb-1">{{$thisMonthOrder}}</h2>
                <p>Daily Order</p>
                <span class="mdi mdi-package-variant"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-4">
            <div class="card-body">
                <h2 class="mb-1">{{$thisYearOrder}}</h2>
                <p>Daily Revenue</p>
                <span class="mdi mdi-currency-usd"></span>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-2">
            <div class="card-body">
                <h2 class="mb-1">{{$todayUser}}</h2>
                <p>Today Signups</p>
                <span class="mdi mdi-account-clock"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-2">
            <div class="card-body">
                <h2 class="mb-1">{{$thisweekorder}}</h2>
                <p>Weekly Signups</p>
                <span class="mdi mdi-account-clock"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-3">
            <div class="card-body">
                <h2 class="mb-1">{{$thisMonthUser}}</h2>
                <p>Monthly Signups</p>
                <span class="mdi mdi-package-variant"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-4">
            <div class="card-body">
                <h2 class="mb-1">{{$thisYearUser}}</h2>
                <p>Yearly Signups</p>
                <span class="mdi mdi-currency-usd"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-1">
            <div class="card-body">
                <h2 class="mb-1">{{$totalUser}}</h2>
                <p>Total Signups</p>
                <span class="mdi mdi-account-arrow-left"></span>
            </div>
        </div>
    </div>
</div>
@endsection
