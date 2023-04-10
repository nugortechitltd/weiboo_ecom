{{-- @extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Role</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Role</p>
    </div>
    <div>
    </div>
        
</div>
<div class="row">
    <div class="col-xl-8 col-lg-8 m-auto">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add permission</h4>
                    <form class="row" method="POST" action="{{route('permission.store')}}">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">Permission name</label> 
                                <input id="text" name="permission" class="form-control" type="text" placeholder="Permission name">
                                @error('permission')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Add permission</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-7 col-lg-7 mb-5">
        <div class="ec-cat-list card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $sl=>$role)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach ($role->getAllPermissions() as $permisssion)
                                        <div class="badge badge-success mb-2">{{$permisssion->name}}</div>
                                    @endforeach
                                </td>
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
                                            <a class="dropdown-item" href="{{route('edit.role', $role->id)}}">Edit</a>
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
    <div class="col-xl-5 col-lg-5 mb-5">
        
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add role</h4>
                    <form class="row" method="POST" action="{{route('role.store')}}">
                        @csrf
                        <div class="col-12 mb-3">
                               <label for="text" class="col-form-label">Role name</label> 
                                <input id="text" name="role" class="form-control" type="text" placeholder="Role name">
                                @error('role')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="">
                            <label for="text" class="col-form-label">Select Permission</label> 
                            <div class="form-group">
                                @foreach ($permission as $permission)
                                <div class="form-check form-check-inline mt-3">
                                    <input type="checkbox" name="permission[]" class="form-check-input" id="flexCheckDefault" value="{{$permission->id}}">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$permission->name}}
                                    </label>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Add role</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-7 col-lg-7 mb-5">
        <div class="ec-cat-list card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table2" class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $sl=>$user)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @forelse ($user->getRoleNames() as $role)
                                        <span class="badge badge-success my-2">{{$role}}</span>
                                        @empty
                                        <span>not assigned yet</span>
                                    @endforelse
                                </td>
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
                                            
                                            <a class="dropdown-item" href="{{route('remove.user.role', $user->id)}}">Remove</a>
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
    <div class="col-xl-5 col-lg-5 mb-5">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Assign Role</h4>
                    <form class="row" method="POST" action="{{route('role.assign')}}">
                        @csrf
                        <div class="mb-3 col-md-12 col-xl-12">
                            <select name="user_id" class="form-control user_id" id="user">
                                <option value="">-- Select user --</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-12 col-xl-12">
                            <select name="role_id" class="form-control role_id" id="role">
                                <option value="">-- Select role --</option>
                                
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Assign role</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection --}}