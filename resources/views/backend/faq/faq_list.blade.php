@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Faq</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All faq
            </p>
        </div>

        <div>
            <a href="{{route('faq.store')}}" class="btn btn-primary">Add faq</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-header">
                    <h3>Faq header left</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table2" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($faq_left as $sl=>$faq)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$faq->faq_title}}</td>
                                    <td>{{Str::limit($faq->faq_desc, '80', '...')}}</td>
                                    <td>
                                        <a href="{{route('faq.delete.left', $faq->id)}}" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-header">
                    <h3>Faq header Right</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($faq_right as $sl=>$faq)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$faq->faq_title_r}}</td>
                                    <td>{{Str::limit($faq->faq_desc_r, '80', '...')}}</td>
                                    <td>
                                        <a href="{{route('faq.delete.right', $faq->id)}}" class="badge badge-danger">Delete</a>
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