@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Add Deal</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Add deal</p>
    </div>
    <div>
        {{-- <a href="{{route('deal section.list')}}" class="btn btn-primary">All deal section</a> --}}
    </div>
        
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add deal</h4>

                    <form class="row" method="POST" action="{{route('deal.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Title</label> 
                                <input id="text" name="title" class="form-control" type="text" placeholder="title">
                                @error('title')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Content top</label> 
                                <input id="text" name="content1" class="form-control" type="text" placeholder="content top">
                                @error('content1')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Content bottom</label> 
                                <input id="text" name="content2" class="form-control" type="text" placeholder="content bottom">
                                @error('content2')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Description</label> 
                                <textarea id="text" name="description" class="form-control" type="text" placeholder="description"></textarea>
                                @error('description')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Add deal</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="ec-cat-list card card-default">
            <div class="card-header">
                <h2>Deal section details</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content top</th>
                                <th>Content bottom</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($deals as $sl=>$deal )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$deal->title}}</td>
                                <td>{{$deal->content1}}</td>
                                <td>{{$deal->content2}}</td>
                                <td>{{Str::limit($deal->description, '50', '...')}}</td>
                                <td>
                                    <a href="{{route('deal.delete', $deal->id)}}" class="badge badge-danger">Delete</a>
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