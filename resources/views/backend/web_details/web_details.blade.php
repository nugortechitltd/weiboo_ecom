@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Add meta</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>meta</p>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add meta description</h2>
                    </div>
    
                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">
                                    <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('meta.desc.store')}}">
                                        @csrf
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="desc" class="form-control" placeholder="Description"></textarea>
                                            @error('desc')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <button type="submit" class="btn btn-primary">Add meta</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add meta keywords</h2>
                    </div>
    
                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">
                                    <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('keyword.store')}}">
                                        @csrf
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Keywords</label>
                                            <textarea name="content" class="form-control" placeholder="keywords"></textarea>
                                            @error('content')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <button type="submit" class="btn btn-primary">Add meta keywords</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="ec-cat-list card card-default">
                    <div class="card-header">
                        <h2>Meta description</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($metas as $sl=>$meta)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$meta->desc}}</td>
                                        <td>
                                            <a href="{{route('meta.desc.delete', $meta->id)}}" class="badge badge-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="ec-cat-list card card-default">
                    <div class="card-header">
                        <h2>Meta Keywords</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Keywords</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($keywords as $sl=>$meta)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$meta->content}}</td>
                                        <td>
                                            <a href="{{route('meta.keyword.delete', $meta->id)}}" class="badge badge-danger">Delete</a>
                                        </td>
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