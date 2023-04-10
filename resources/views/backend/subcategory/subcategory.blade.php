@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Add Subcategory</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Add subcategory</p>
    </div>
    <div>
        <a href="{{route('subcategory.list')}}" class="btn btn-primary">All subcategory</a>
    </div>
        
</div>
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add New Subcategory</h4>

                    <form class="row" method="POST" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <label class="form-label">Product type</label>
                            <select name="category_id">
                                    <option>Select a category</option>
                                    @foreach ($categories as $category)
                                        
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">Subcategory name</label> 
                                <input id="text" name="subcategory_name" class="form-control" type="text" placeholder="Subcategory name">
                                @error('subcategory_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">Subcategory image</label>
                                <input type="file" name="subcategory_image" class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('subcategory_image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image" height="auto" src="" alt="">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-primary">Add subcategory</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> 
@endsection