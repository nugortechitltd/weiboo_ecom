@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Subcategory</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All subcategory
            </p>
        </div>

        <div>
            <a href="{{route('subcategory')}}" class="btn btn-primary">Add subcategory</a>
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
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Image</th>
                                    <th>User</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($subcategories as $sl=>$subcategory)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{($subcategory->rel_to_category == null)? "Deleted": $subcategory->rel_to_category->category_name}}</td>
                                    <td>{{$subcategory->subcategory_name}}</td>
                                    <td><img class="cat-thumb" src="{{asset('uploads/subcategory')}}/{{$subcategory->subcategory_image}}" alt="Subcategory Image" /></td>
                                    <td>{{$subcategory->rel_to_user->name}}</td>
                                    <td>{{$subcategory->created_at->diffForHumans()}}</td>
                                    <td>{{$subcategory->updated_at == null ? 'n/a': $subcategory->updated_at->diffForHumans()}}</td>
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
                                                <a class="dropdown-item" href="{{route('subcategory.edit', $subcategory->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('subcategory.delete', $subcategory->id)}}">Delete</a>
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