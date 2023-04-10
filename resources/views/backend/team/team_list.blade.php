@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Team</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All team
            </p>
        </div>

        <div>
            <a href="{{route('team')}}" class="btn btn-primary">Add team</a>
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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Linkedin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($teams as $sl=>$team)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$team->name}}</td>
                                    <td><img class="cat-thumb" src="{{asset('uploads/team')}}/{{$team->image}}" alt="team Image" /></td>
                                    <td>{{$team->facebook == null ? 'NA': $team->facebook}}</td>
                                    <td>{{$team->twitter == null ? 'NA': $team->twitter}}</td>
                                    <td>{{$team->linkedin == null ? 'NA': $team->linkedin}}</td>
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
                                                <a class="dropdown-item" href="{{route('team.edit', $team->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('team.delete', $team->id)}}">Delete</a>
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