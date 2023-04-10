@extends('layouts.dashboard')

@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>User profile</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Profile
        </p>
    </div>
    <div>
        <a href="user-list.html" class="btn btn-primary">Edit</a>
    </div>
</div>
<div class="user_profile_wrapper_top card">
    <div class="user_profile_top_bg"></div>
    <div class="user_profile_top_des">
        <div class="user_profile_img">
            @if ($user->first()->image == null)
                <img src="{{Avatar::create($user->first()->name)->toBase64()}}" alt="">
            @else
                <img src="{{asset('uploads/users')}}/{{$user->first()->image}}" class="user-image" alt="User Image" />
            @endif
        </div>
        <div class="user_profile_text_top">
            <h3>{{$user->first()->name}}</h3>
            <p>{{$user->first()->email}}</p>
        </div>
    </div>
    
</div>
<div class="card bg-white profile-content">
    <div class="row">
        {{-- <div class="col-lg-4 col-xl-3">
            <div class="profile-content-left profile-left-spacing">

                <hr class="w-100">

                <div class="contact-info pt-4">
                    <h5 class="text-dark">Contact Information</h5>
                    <div class="contact_info_sidebar_item">
                        <h3>Address</h3>
                        <p>4517 Washington Ave. Manchester, Kentucky 39495</p>
                    </div>

                    <div class="contact_info_sidebar_item">
                        <h3>Email</h3>
                        <p>kenzi.lawson@example.com</p>
                    </div>
                    <div class="contact_info_sidebar_item">
                        <h3>Phone number</h3>
                        <p>(217) 555-0113</p>
                    </div>

                    <div class="contact_info_sidebar_item">
                        <h3>Social Profile</h3>
                        
                        <ul>
                            <li>
                                <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                                    <i class="mdi mdi-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
                                    <i class="mdi mdi-skype"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    
                </div>
            </div>
        </div> --}}

        <div class="col-lg-12 col-xl-12">
            <div class="profile-content-right profile-right-spacing py-5">
                <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                            data-bs-target="#settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                </ul>
                <div class="tab-content px-3 px-xl-5" id="myTabContent">

                    <div class="tab-pane fade show active" id="settings" role="tabpanel"
                        aria-labelledby="settings-tab">
                        <div class="tab-widget mt-5">
                            <div class="user_profile_top_heading">
                                <h3>User settings</h3>
                            </div>
                        <div class="tab-pane-content mt-5">
                            <form method="POST" enctype="multipart/form-data" action="{{route('user.update')}}">
                                @csrf
                                <div class="row mb-2">

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="userName">User name</label>
                                            <input type="text" name="name" class="form-control" id="userName" value="{{$user->first()->name}}">
                                            <input type="hidden" name="user_id" class="form-control" value="{{$user->first()->id}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{$user->first()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="newPassword">New password</label>
                                            <input type="password" name="password" class="form-control" placeholder="new password" id="newPassword">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="conPassword">Confirm password</label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password" id="conPassword">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_customer_profilr_img">
                                            <label for="" class="form-label">user image</label>
                                            <input type="file" name="image" class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <img width="100" class="mt-3" id="image" height="auto" src="{{asset('uploads/users')}}/{{$user->first()->image}}" alt="">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-5">
                                    <button type="submit"
                                        class="btn btn-primary mb-2 btn-pill">Update
                                        user</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection