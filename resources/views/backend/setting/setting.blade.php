@extends('layouts.dashboard')
@section('content')
<div class="row mb-5">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>About website</h4>
                    <form class="row" method="POST" action="{{route('site.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">About us</label> 
                                <textarea id="text" name="about" class="form-control" type="text" placeholder="about us"></textarea>
                                @error('about')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Google map location</label> 
                                <input id="text" name="location" class="form-control" type="text" placeholder="Google location link (embed-url)">
                                @error('location')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Logo</label> 
                                <input id="text" name="logo" class="form-control" type="file" placeholder="logo">
                                @error('logo')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                            <div class="col-12 mt-3">
                                <button name="submit" type="submit" class="btn btn-primary">Add logo</button>
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
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($aboutus as $sl=>$about)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{Str::limit($about->about, '90', '...')}}</td>
                                <td><img width="100" src="{{asset('uploads/logo')}}/{{$about->logo}}" alt=""></td>
                                <td>
                                    <a href="{{route('aboutus.delete', $about->id)}}" class="badge badge-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 offset-lg-2 col-lg-12 mt-5">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Website title</h4>
                    <form class="row" method="POST" action="{{route('site.name.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Name</label> 
                                <input id="text" name="name" class="form-control" type="text" placeholder="title">
                                @error('name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                            <div class="col-12 mt-3">
                                <button name="submit" type="submit" class="btn btn-primary">Add site name</button>
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
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($site as $sl=>$site)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$site->name}}</td>
                                <td>
                                    <a href="{{route('site.name.delete', $site->id)}}" class="badge badge-danger">Delete</a>
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
<div class="row mb-5">
    <div class="col-xl-12 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Get in touch</h4>
                    <form class="row" method="POST" action="{{route('touch')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Location</label> 
                                <input id="text" name="location" class="form-control" type="text" placeholder="location">
                                @error('location')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Phone/Mobile</label> 
                                <input name="phone1" class="form-control" type="tel" placeholder="Number">
                                @error('phone1')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">Phone/Mobile</label> 
                                <input name="phone2" class="form-control" type="tel" placeholder="Number (optional)">
                                @error('phone2')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12">
                               <label for="text" class="col-form-label">Work hours</label> 
                                <input name="hours1" class="form-control" type="text" placeholder="Work hours details">
                                @error('hours1')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Work hours</label> 
                                <input name="hours2" class="form-control" type="text" placeholder="Work hours details extra">
                                @error('hours2')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Work hours</label> 
                                <input name="email" class="form-control" type="email" placeholder="Email">
                                @error('email')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                         <div class="col-12">
                               <label for="text" class="col-form-label">Web link</label> 
                                <input name="web" class="form-control" type="text" placeholder="Site link">
                                @error('web')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                            <div class="col-12 mt-3">
                                <button name="submit" type="submit" class="btn btn-primary">Add get in touch</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12">
        <div class="ec-cat-list card card-default">
            <div class="card-header">
                <h2>Get in touch</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Web</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($touch as $sl=>$touch)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$touch->location}}</td>
                                <td>{{$touch->phone1}}</td>
                                <td>{{$touch->web}}</td>
                                <td>{{$touch->email}}</td>
                                <td>
                                    <a href="{{route('touch.delete', $touch->id)}}" class="badge badge-danger">Delete</a>
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
<div class="row mb-5">
    <div class="col-xl-6 col-lg-6">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Follow us</h4>
                    <form class="row" method="POST" action="{{route('follow')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Social name</label> 
                                <input id="text" name="name" class="form-control" type="text" placeholder="name">
                                @error('name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Social icon name (font-awesome 5.12.1)</label> 
                                <input name="icon" class="form-control" type="text" placeholder="icon">
                                @error('icon')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12">
                               <label for="text" class="col-form-label">Social url</label> 
                                <input name="url" class="form-control" type="text" placeholder="url">
                                @error('url')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Add social</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="ec-cat-list card card-default">
            <div class="card-header">
                <h2>Get in touch</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Font awesome</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($social as $sl=>$social)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$social->name}}</td>
                                <td>{{$social->icon}}</td>
                                <td>{{$social->url}}</td>
                                <td>
                                    <a href="{{route('social.delete', $social->id)}}" class="badge badge-danger">Delete</a>
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