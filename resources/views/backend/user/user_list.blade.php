@extends('layouts.dashboard')
@section('content')
<!-- CONTENT WRAPPER -->
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Customer list</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Customer
        </p>
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
                                <th>Photo</th>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $sl=>$user)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>
                                    @if ($user->image == null)
                                        <img class="cat-thumb" src="{{Avatar::create($user->name)->toBase64()}}" alt="">
                                    @else
                                        <img class="cat-thumb" src="{{asset('uploads/users')}}/{{$user->image}}" class="user-image" alt="User Image" />
                                    @endif
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->format('d')}} {{$user->created_at->format('M Y')}} {{$user->created_at->format('H:i:s')}}</td>
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
                                            <a class="dropdown-item" href="{{route('user.single.delete', $user->id)}}">Delete</a>
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