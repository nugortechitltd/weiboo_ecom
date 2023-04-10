@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Add Favicon</h1>
            <p class="breadcrumbs"><span><a href="{{ route('home') }}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>favicon
            </p>
        </div>
        <div>
            {{-- <a href="{{route('favicon.list')}}" class="btn btn-primary">All favicon</a> --}}
        </div>

    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="ec-cat-list card card-default mb-24px">
                <div class="card-body">
                    <div class="ec-cat-form">
                        <h4>Add favicon</h4>
                        {{--  --}}
                        <form class="row" method="POST" action="{{route('favicon.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <div class="form_customer_profilr_img">
                                    <label for="" class="col-form-label">Favicon</label>
                                    <input type="file" name="favicon" class="form-control" onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                @error('favicon')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                                <img width="100" class="mt-3 mb-3" id="image2" height="auto" src="" alt="">
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Add favicon</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table2" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Favicon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach ($favicon as $sl => $favicon)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td><img width="50" src="{{asset('uploads/favicon')}}/{{$favicon->favicon}}" alt=""></td>
                                    <td><a href="{{route('favicon.delete', $favicon->id)}}" class="badge badge-danger">Delete</a></td>
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
