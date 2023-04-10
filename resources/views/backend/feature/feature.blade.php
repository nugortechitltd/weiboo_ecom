@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Feature</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Feature</p>
    </div>
    <div>
        <a href="{{route('feature.list')}}" class="btn btn-primary">All feature</a>
    </div>
        
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add top feature</h4>

                    <form class="row" method="POST" action="{{route('feature.store.top')}}">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Feature title</label> 
                                <input id="text" name="title" class="form-control" type="text" placeholder="Title">
                                @error('title')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label for="text" class="col-form-label">Feature button</label> 
                            <input id="text" name="button" class="form-control" type="text" placeholder="Button text">
                             @error('button')
                                 <strong class="text-danger">{{$message}}</strong>
                             @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">Feature description</label> 
                                <textarea id="text" name="description" class="form-control" type="text" placeholder="Description"></textarea>
                                @error('description')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">Feature Image</label>
                                <input type="file" name="image" class="form-control" onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image2" height="auto" src="" alt="">
                        </div>
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add feature</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add bottom feature</h4>

                    <form class="row" method="POST" action="{{route('feature.store.bottom')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Feature title</label> 
                                <input id="text" name="title" class="form-control" type="text" placeholder="Title">
                                @error('title')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label for="text" class="col-form-label">Feature button</label> 
                            <input id="text" name="button" class="form-control" type="text" placeholder="Button text">
                             @error('button')
                                 <strong class="text-danger">{{$message}}</strong>
                             @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">Feature description</label> 
                                <textarea id="text" name="description" class="form-control" type="text" placeholder="Description"></textarea>
                                @error('description')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                            <div class="form_customer_profilr_img">
                                <label for="" class="col-form-label">Feature Image</label>
                                <input type="file" name="image" class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            @error('image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <img width="100" class="mt-3 mb-3" id="image" height="auto" src="" alt="">
                        </div>
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add feature</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>feature</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (App\Models\feature::all() as $sl=>$feature)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$feature->feature_list}}</td>
                                <td>
                                    <a href="{{route('feature.delete', $feature->id)}}" class="badge badge-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection