@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Maincategory</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All maincategory
            </p>
        </div>

        <div>
            <a href="{{route('maincategory')}}" class="btn btn-primary">Add maincategory</a>
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
                                    <th>Maincategory</th>
                                    <th>Image</th>
                                    <th>User</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $sl=>$category)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$category->maincategory_name}}</td>
                                    <td><img class="cat-thumb" src="{{asset('uploads/maincategory')}}/{{$category->maincategory_image}}" alt="Maincategory Image" /></td>
                                    <td>{{$category->rel_to_user->name}}</td>
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                    <td>{{$category->updated_at == null ? 'n/a': $category->updated_at->diffForHumans()}}</td>
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
                                                <a class="dropdown-item" href="{{route('maincategory.edit', $category->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('maincategory.delete', $category->id)}}">Delete</a>
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