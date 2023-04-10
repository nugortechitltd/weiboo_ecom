{{-- @extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Edit role</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Edit role</p>
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
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add role</h4>
                    <form class="row" method="POST" action="{{route('role.update')}}">
                        @csrf
                        <div class="col-12 mb-3">
                               <label for="text" class="col-form-label">Role name</label> 
                               <input type="hidden" name="role_id" value="{{$role->id}}" placeholder="enter role" class="form-control">
                                <input id="text" name="role" class="form-control" type="text" placeholder="Role name" value="{{$role->name}}" readonly>
                                @error('role')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="">
                            <label for="text" class="col-form-label">Select Permission</label> 
                            <div class="form-group">
                                @foreach ($permission as $permission)
                                <div class="form-check form-check-inline mt-3">
                                    <input type="checkbox" {{($role->hasPermissionTo($permission->name))?'checked': ''}} name="permission[]" class="form-check-input" id="flexCheckDefault" value="{{$permission->id}}">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$permission->name}}
                                    </label>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Update role</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection --}}