@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Add Team</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>team</p>
        </div>
        <div>
            <a href="{{route('team.list')}}" class="btn btn-primary"> View All</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add team</h2>
                </div>

                <div class="card-body">
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('team.store')}}">
                                    @csrf
                                    <div class="col-md-6 mt-3 m-auto">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="name">
                                        @error('name')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3 m-auto">
                                        <label class="form-label">Position</label>
                                        <input type="text" name="position" class="form-control" placeholder="position">
                                        @error('position')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Facebook link</label>
                                        <input type="text" name="facebook" class="form-control" placeholder="facebook link">
                                        @error('facebook')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Twitter link</label>
                                        <input type="text" name="twitter" class="form-control" placeholder="twitter link">
                                        @error('twitter')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Linkedin link</label>
                                        <input type="text" name="linkedin" class="form-control" placeholder="linkedin link">
                                        @error('linkedin')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form_customer_profilr_img col-md-12 mt-3">
                                        <label for="" class="col-form-label">Image</label>
                                        <input type="file" name="image" style="margin-bottom: 0px !important" class="form-control" onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                        <img width="100" class="mt-3 mb-3" id="image2" height="auto" src="" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Add team</button>
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