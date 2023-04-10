@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Edit Review</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Edit review</p>
    </div>
    <div>
        <a href="{{route('review')}}" class="btn btn-primary">All review</a>
    </div>
        
</div>
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add New review</h4>

                    <form class="row" method="POST" action="{{route('review.udpate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">review name</label> 
                                <input id="text" name="product_name" class="form-control" type="text" placeholder="product name" value="{{$review->rel_to_product->product_name}}" readonly>
                                <input id="text" name="review_id" class="form-control" type="hidden" placeholder="review name" value="{{$review->id}}">
                                @error('product_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12 mt-3">
                            <label class="form-label">Star</label>
                            <select name="star" id="reviews" class="form-select">
                                    <option value="" {{$review->star == null ? 'selected': ''}}>Zero star</option>
                                    <option value="1" {{$review->star == 1 ? 'selected': ''}}>One star</option>
                                    <option value="2" {{$review->star == 2 ? 'selected': ''}}>Two star</option>
                                    <option value="3" {{$review->star == 3 ? 'selected': ''}}>Three star</option>
                                    <option value="4" {{$review->star == 4 ? 'selected': ''}}>Four star</option>
                                    <option value="5" {{$review->star == 5 ? 'selected': ''}}>Five star</option>
                            </select>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">review image</label>
                                <input type="file" name="review_image" class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('review_image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image" height="auto" src="{{asset('uploads/review')}}/{{$review->review_image}}" alt="">
                        </div> --}}
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Update review</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection