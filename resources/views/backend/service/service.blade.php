@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Service</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Service</p>
    </div>
    <div>
        {{-- <a href="{{route('service.list')}}" class="btn btn-primary">All service</a> --}}
    </div>
        
</div>
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add New service</h4>

                    <form class="row" method="POST" action="{{route('service.store')}}">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Service list</label> 
                                <input id="text" name="service_list" class="form-control" type="text" placeholder="service">
                                @error('service_list')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                            <div class="col-12 mt-3">
                                <button name="submit" type="submit" class="btn btn-primary">Add service</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (App\Models\Service::all() as $sl=>$service)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$service->service_list}}</td>
                                <td>
                                    <a href="{{route('service.delete', $service->id)}}" class="badge badge-danger">Delete</a>
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