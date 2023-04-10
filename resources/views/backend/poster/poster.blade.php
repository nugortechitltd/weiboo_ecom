@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Add Poster</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Add poster</p>
    </div>
    <div>
        {{-- <a href="{{route('poster.list')}}" class="btn btn-primary">All poster</a> --}}
    </div>
        
</div>
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add new poster</h4>
                    <form class="row" method="POST" action="{{route('poster.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">poster left pretitle</label> 
                                <input id="text" name="pretitle1" class="form-control" type="text" placeholder="poster pretitle">
                                @error('pretitle1')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">poster middle pretitle</label> 
                                <input id="text" name="pretitle2" class="form-control" type="text" placeholder="poster pretitle">
                                @error('pretitle2')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">poster right pretitle</label> 
                                <input id="text" name="pretitle3" class="form-control" type="text" placeholder="poster pretitle">
                                @error('pretitle3')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">poster left title</label> 
                                <input id="text" name="title1" class="form-control" type="text" placeholder="poster title">
                                @error('title1')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">poster middle title</label> 
                                <input id="text" name="title2" class="form-control" type="text" placeholder="poster title">
                                @error('title2')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">poster right title</label> 
                                <input id="text" name="title3" class="form-control" type="text" placeholder="poster title">
                                @error('title3')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">poster middle text</label> 
                                <input id="text" name="text" class="form-control" type="text" placeholder="poster text">
                                @error('text')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">poster left image</label>
                                <input type="file" name="image1" class="form-control" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('image1')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
                        </div>
                        <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">poster middle image</label>
                                <input type="file" name="image2" class="form-control" onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('image2')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image2" height="auto" src="" alt="">
                        </div>
                        <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">poster right image</label>
                                <input type="file" name="image3" class="form-control" onchange="document.getElementById('image3').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('image3')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
                        </div>
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add poster</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12">>
        <div class="card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Leftside pretitle</th>
                                <th>Milddle pretitle</th>
                                <th>Rightside pretitle</th>
                                <th>Leftside image</th>
                                <th>Milddle image</th>
                                <th>Rightside image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($poster as $sl => $poster)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$poster->pretitle1}}</td>
                                <td>{{$poster->pretitle2}}</td>
                                <td>{{$poster->pretitle3}}</td>
                                <td><img width="50" src="{{asset('uploads/poster')}}/{{$poster->image1}}" alt=""></td>
                                <td><img width="50" src="{{asset('uploads/poster')}}/{{$poster->image2}}" alt=""></td>
                                <td><img width="50" src="{{asset('uploads/poster')}}/{{$poster->image3}}" alt=""></td>
                                {{-- <td>{{$payment->bkash}}</td>
                                <td>{{$payment->type1}}</td>
                                <td>{{Str::limit($payment->description1, '60', '...')}}</td>
                                <td>{{$payment->rocket}}</td>
                                <td>{{$payment->type2}}</td>
                                <td>{{Str::limit($payment->description2, '60', '...')}}</td> --}}
                                <td><a href="{{route('poster.delete', $poster->id)}}" class="badge badge-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection