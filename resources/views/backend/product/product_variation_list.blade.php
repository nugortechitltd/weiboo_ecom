@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>All Variations</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All variation</p>
        </div>
        <div>
            <a href="{{route('variation')}}" class="btn btn-primary"> Add variation</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color name</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($colors as $sl=>$color)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$color->color_name}}</td>
                                    <td>@if ($color->color_code == null)
                                        NA
                                    @else
                                    <div style="width:50px ; height: 50px; background: {{$color->color_code}}"></div>
                                    @endif</td>
                                    <td><a href="{{route('color.delete', $color->id)}}" class="badge badge-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table2" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Size</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sizes as $sl=>$size)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$size->size_name == null ? "NA": $size->size_name}}</td>
                                    <td><a href="{{route('size.delete', $size->id)}}" class="badge badge-danger">Delete</a></td>
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