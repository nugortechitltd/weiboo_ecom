@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Add Blog</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Add blog</p>
        </div>
        <div>
            <a href="{{route('blog.list')}}" class="btn btn-primary"> View All
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add blog</h2>
                </div>

                <div class="card-body">
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="">
                                <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('blog.store')}}">
                                    @csrf
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" class="form-control" id="Categories">
                                            <option value="">--Select category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Post title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                        @error('title')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Post description</label>
                                        <textarea id="summernote" type="text" name="description" class="form-control" placeholder="Description"></textarea>
                                        @error('description')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-3">
                                        @foreach ($tags as $tag)
                                        <input name="tag_id[]" class="checkbox_animated" type="checkbox" id="flexCheckDefault" value="{{$tag->id}}">
                                        <label class="d-inline me-1" for="flexCheckDefault">
                                            {{$tag->tag}}
                                        </label>
                                        @endforeach
                                    </div>
                                    <div class="col-12">
                                        <div class="form_customer_profilr_img">
                                            <label for="" class="col-form-label">Post image</label>
                                            <input type="file" name="feat_image" class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <img width="100" class="mt-3 mb-3" id="image" height="auto" src="" alt="">
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button type="submit" class="btn btn-primary">Add blog</button>
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

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Description',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection