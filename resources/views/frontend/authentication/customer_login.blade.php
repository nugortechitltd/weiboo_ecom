@extends('frontend.master.master')
@section('content')
    <div class="page-path">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="path-title">Log In</h1>
                <ul>
                    <li><a class="home-page-link" href="{{ route('site') }}">Home <i class="fal fa-angle-right"></i></a></li>
                    <li><a class="current-page" href="">Login</a></li>
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
                            <h2>Login</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @auth('customerauth')
                                <div class="alert alert-info">You are already logged in.</div>
                                @else
                                <form method="POST" action="{{ route('customer.login.store') }}">
                                    @csrf
                                    <div class="form">
                                        <input type="email" name="email" class="form-control" id="username"
                                            placeholder="Email address" />
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form ">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password" />
                                        @error('password')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form text-end">
                                        <a href="{{route('customer.pass.reset.req')}}">Lost your password?</a>
                                    </div>
                                    <div class="form">
                                        <button type="submit" class="btn">login</button>
                                    </div>
                                    <div class="d-inline">
                                        Don't have an account? 
                                        <a class="forgot-password text-danger" href="{{route('customer.register')}}">create one</a>
                                    </div>
                                </form>
                                @endauth
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login-area end-->
@endsection
