@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Footer Feature</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Footer feature</p>
    </div>
    <div>
        <a href="{{route('feature.list')}}" class="btn btn-primary">All feature</a>
    </div>
        
</div>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add top footer feature</h4>

                    <form class="row" method="POST" action="{{route('footer.feature.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature title one</label> 
                                <input id="text" name="title1" class="form-control" type="text" placeholder="Title">
                                @error('title1')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature title two</label> 
                                <input id="text" name="title2" class="form-control" type="text" placeholder="Title">
                                @error('title2')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature title three</label> 
                                <input id="text" name="title3" class="form-control" type="text" placeholder="Title">
                                @error('title3')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature title four</label> 
                                <input id="text" name="title4" class="form-control" type="text" placeholder="Title">
                                @error('title4')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature description one</label> 
                                <textarea id="text" name="description1" class="form-control" type="text" placeholder="Description"></textarea>
                                @error('description1')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature description two</label> 
                                <textarea id="text" name="description2" class="form-control" type="text" placeholder="Description"></textarea>
                                @error('description2')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature description thre</label> 
                                <textarea id="text" name="description3" class="form-control" type="text" placeholder="Description"></textarea>
                                @error('description3')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">footer feature description four</label> 
                                <textarea id="text" name="description4" class="form-control" type="text" placeholder="Description"></textarea>
                                @error('description4')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Add footer feature</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection