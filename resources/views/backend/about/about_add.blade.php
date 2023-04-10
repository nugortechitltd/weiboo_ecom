@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Add About</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>about</p>
        </div>
        <div>
            <a href="{{route('about.list')}}" class="btn btn-primary"> View All</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add about</h2>
                </div>

                <div class="card-body">
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('about.store')}}">
                                    @csrf
                                    <div class="col-md-6 mt-3 m-auto">
                                        <label class="form-label">Since From</label>
                                        <input type="number" name="year" class="form-control" placeholder="year">
                                        @error('year')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Description left</label>
                                        <textarea name="left_desc" class="form-control" placeholder="Left side description"></textarea>
                                        @error('left_desc')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Description right</label>
                                        <textarea name="right_desc" class="form-control" placeholder="Right side description"></textarea>
                                        @error('right_desc')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form_customer_profilr_img col-md-6 mt-3">
                                        <label for="" class="col-form-label">Preview image left</label>
                                        <input type="file" name="preview_one" style="margin-bottom: 0px !important" class="form-control" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                                        @error('preview_one')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                        <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
                                    </div>
                                    <div class="form_customer_profilr_img col-md-6 mt-3">
                                        <label for="" class="col-form-label">Preview image right</label>
                                        <input type="file" name="preview_two" style="margin-bottom: 0px !important" class="form-control" onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])">
                                        @error('preview_two')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                        <img width="100" class="mt-3 mb-3" id="image2" height="auto" src="" alt="">
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button type="submit" class="btn btn-primary">Add about</button>
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