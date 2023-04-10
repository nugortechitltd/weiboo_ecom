@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Brand</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All brand
            </p>
        </div>

        <div>
            <a href="{{route('brand')}}" class="btn btn-primary">Add brand</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand</th>
                                    <th>Image</th>
                                    <th>User</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $sl=>$brand)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$brand->brand_name}}</td>
                                    <td><img class="cat-thumb" src="{{asset('uploads/brand')}}/{{$brand->brand_image}}" alt="brand Image" /></td>
                                    <td>{{$brand->rel_to_user->name}}</td>
                                    <td>{{$brand->created_at->diffForHumans()}}</td>
                                    <td>{{$brand->updated_at == null ? 'NA': $brand->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-outline-success">Info</button>
                                            <button type="button"
                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                                <span class="sr-only">Info</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('brand.edit', $brand->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('brand.delete', $brand->id)}}">Delete</a>
                                            </div>
                                        </div>
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