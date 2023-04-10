@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All About</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All about
            </p>
        </div>

        <div>
            <a href="{{route('about.add')}}" class="btn btn-primary">Add about</a>
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
                                    <th>Description one</th>
                                    <th>Description two</th>
                                    <th>Preview one</th>
                                    <th>Preview two</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($about_info as $sl=>$about)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{Str::limit($about->left_desc, '50', '...')}}</td>
                                    <td>{{Str::limit($about->right_desc, '50', '...')}}</td>
                                    <td><img class="cat-thumb" src="{{asset('uploads/about')}}/{{$about->preview_one}}" alt="about Image" /></td>
                                    <td><img class="cat-thumb" src="{{asset('uploads/about')}}/{{$about->preview_two}}" alt="about Image" /></td>
                                    <td>{{$about->year}}</td>
                                    <td><a href="{{route('about.delete', $about->id)}}" class="badge badge-danger">Delete</a></td>
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