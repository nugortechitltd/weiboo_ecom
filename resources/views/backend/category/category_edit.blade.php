@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Add Category</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Update Category</p>
    </div>
    <div>
        <a href="{{route('category.list')}}" class="btn btn-primary">All category</a>
    </div>
        
</div>
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add New Category</h4>

                    <form class="row" method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Category name</label> 
                                <input id="text" name="category_name" class="form-control" type="text" placeholder="category name" value="{{$categories->category_name}}">
                                <input type="hidden" name="category_id" value="{{$categories->id}}">
                                @error('category_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">Category image</label>
                                <input type="file" name="category_image" class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('category_image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image" height="auto" src="{{asset('uploads/category')}}/{{$categories->category_image}}" alt="">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-primary">Update category</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection