@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Comment</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All comment
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
                                    <td>Comment</td>
                                    <td>Created</td>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($comments as $sl=>$comment)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$comment->message}}</td>
                                    <td>{{$comment->created_at->format('d-m-Y')}}</td>
                                    <td><a href="{{route('comment.delete', $comment->id)}}" class="badge badge-danger">Delete</a></td>
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