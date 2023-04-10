@extends('frontend.master.master')
@section('content')
    <div class="page-path">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="path-title">Customer reset email</h1>
                <ul>
                    <li><a class="home-page-link" href="{{ route('site') }}">Home <i class="fal fa-angle-right"></i></a></li>
                    <li><a class="current-page" href="">Customer reset</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--login-area start-->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m-auto">
                    <div class="register-form">
                        <div class="section-title">
                            <h2>Customer reset email</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('customer.pass.reset.send') }}">
                                    @csrf
                                    <div class="form">
                                        <input type="email" name="email" class="form-control" id="username"
                                            placeholder="Email address" />
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form">
                                        <button type="submit" class="btn">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
