@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Add Product</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
        </div>
        <div>
            <a href="{{route('product.list')}}" class="btn btn-primary"> View All
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add Product</h2>
                </div>

                <div class="card-body">
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
                                    @csrf
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" id="Categories">
                                            <option value="">Select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Sub category</label>
                                        <select name="subcategory_id" id="Subcategories">
                                            <option value="">Select subcategory</option>
                                        </select>
                                        @error('subcategory_id')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Brand</label>
                                        <select name="brand_id">
                                            <option value="">Select brand</option>
                                            @foreach ($brand as $brand)
                                             <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Product name</label>
                                        <input type="text" name="product_name" class="form-control" placeholder="Product name">
                                        @error('product_name')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Product price</label>
                                        <input type="number" name="product_price" class="form-control " placeholder="Product price" >
                                        @error('product_price')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Discount (%)</label>
                                        <input type="number" name="discount" class="form-control " placeholder="Product discount" >
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="inputEmail11" class="form-label">Short description</label>
                                        <input type="text" name="short_desp" class="form-control" placeholder="Product short description">
                                        @error('short_desp')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Description</label>
                                        <textarea id="summernote" name="long_desc" class="form-control" placeholder="Product description"></textarea>
                                        @error('long_desc')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Additional information</label>
                                        <textarea id="summernote2" name="additional_desc" class="form-control" placeholder="additional information"></textarea>
                                        @error('additional_desc')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form_customer_profilr_img col-md-6 mt-3">
                                        <label for="" class="col-form-label">Product preview1</label>
                                        <input type="file" name="preview_one" style="margin-bottom: 0px !important" class="form-control" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                                        @error('preview_one')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                        <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
                                    </div>
                                    <div class="form_customer_profilr_img col-md-6 mt-3">
                                        <label for="" class="col-form-label">Product preview2</label>
                                        <input type="file" name="preview_two" style="margin-bottom: 0px !important" class="form-control" onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])">
                                        @error('preview_two')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                        <img width="100" class="mt-3 mb-3" id="image2" height="auto" src="" alt="">
                                    </div>
                                    <div class="form_customer_profilr_img col-md-12 mt-3">
                                        <label for="" class="col-form-label">Product Thumbnail</label>
                                        <input type="file" id="thumbnail" name="thumbnail[]" multiple style="margin-bottom: 0px !important" class="form-control">
                                        @error('thumbnail')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button type="submit" class="btn btn-primary">Add product</button>
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
        $('#Categories').change(function() {
            var category_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/getSubcategory',
                data: {'categoryid': category_id},
                success: function(data) {
                    $('#Subcategories').html(data);
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('#summernote2').summernote();
        });
    </script>
@endsection