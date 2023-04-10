@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>All Features</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All feature</p>
        </div>
        <div>
            <a href="{{route('feature')}}" class="btn btn-primary"> Add feature</a>
            <a href="{{route('footer.feature')}}" class="btn btn-primary"> Add footer feature</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Feature top</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($feature_top as $sl=>$feature)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$feature->title}}</td>
                                    <td>{{Str::limit($feature->description, '40', '...')}}</td>
                                    <td><img width="60" src="{{asset('uploads/feature')}}/{{$feature->image}}" alt=""></td>
                                    <td><a href="{{route('feature.top.delete', $feature->id)}}" class="badge badge-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Feature bottom</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table2" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($feature_bottom as $sl=>$feature)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$feature->title}}</td>
                                    <td>{{Str::limit($feature->description, '40', '...')}}</td>
                                    <td><img width="60" src="{{asset('uploads/feature')}}/{{$feature->image}}" alt=""></td>
                                    <td><a href="{{route('feature.bottom.delete', $feature->id)}}" class="badge badge-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Feature top</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title1</th>
                                    <th>Title2</th>
                                    <th>Title3</th>
                                    <th>Title4</th>
                                    <th>Description1</th>
                                    <th>Description2</th>
                                    <th>Description3</th>
                                    <th>Description4</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($feature_footer as $sl=>$feature)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$feature->title1}}</td>
                                    <td>{{$feature->title2}}</td>
                                    <td>{{$feature->title3}}</td>
                                    <td>{{$feature->title4}}</td>
                                    <td>{{Str::limit($feature->description1, '40', '...')}}</td>
                                    <td>{{Str::limit($feature->description2, '40', '...')}}</td>
                                    <td>{{Str::limit($feature->description3, '40', '...')}}</td>
                                    <td>{{Str::limit($feature->description4, '40', '...')}}</td>
                                    <td><a href="{{route('feature.footer.delete', $feature->id)}}" class="badge badge-danger">Delete</a></td>
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