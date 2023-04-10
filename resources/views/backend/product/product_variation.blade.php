@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Add Variation</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Add variation</p>
        </div>
        <div>
            <a href="{{route('variation.list')}}" class="btn btn-primary"> View All
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add color</h2>
                </div>

                <div class="card-body">
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('color')}}">
                                    @csrf
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Color name</label>
                                        <input type="text" name="color_name" class="form-control" placeholder="Color name">
                                        @error('color_name')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Color code</label>
                                        <input type="text" name="color_code" class="form-control" placeholder="Color code">
                                        @error('color_code')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button type="submit" class="btn btn-primary">Add color</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add size</h2>
                </div>
                <div class="card-body">
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('size')}}">
                                    @csrf
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Size name</label>
                                        <input type="text" name="size_name" class="form-control" placeholder="Size name">
                                        @error('size_name')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button type="submit" class="btn btn-primary">Add size</button>
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