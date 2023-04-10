@extends('layouts.dashboard')
@section('content')
{{-- <div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Add user</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Add user</p>
    </div>
    <div>
        <a href="{{route('user.list')}}" class="btn btn-primary">All user</a>
    </div>
        
</div> --}}
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add New User</h4>
                    {{--  --}}
                    <form class="row" method="POST" action="{{route('user.store')}}">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">user name</label> 
                                <input name="name" class="form-control" type="text" placeholder="user name">
                                @error('name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">User email</label> 
                                <input name="email" class="form-control" type="text" placeholder="user email">
                                @error('email')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                         <div class="col-12">
                               <label for="text" class="col-form-label">Password</label> 
                                <input name="password" class="form-control" type="password" placeholder="password">
                                @error('password')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">Confirm password</label> 
                                <input name="password_confirmation" class="form-control" type="password" placeholder="confirm password">
                                @error('password_confirmation')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add user</button>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection