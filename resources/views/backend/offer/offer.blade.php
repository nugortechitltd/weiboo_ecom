@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Edit offer</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Offer</p>
    </div>
    {{-- <div>
        <a href="{{route('offer')}}" class="btn btn-primary">All offer</a>
    </div> --}}
        
</div>
<div class="row">
    <div class="col-xl-8 offset-lg-2 col-lg-12">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add New offer</h4>

                    <form class="row" method="POST" action="{{route('offer.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                               <input type="number" name="price" class="col-form-label" placeholder="Price">
                               @error('price')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div> 
                        <div class="col-12 mt-3">
                            <label class="form-label">Star</label>
                            <select name="coupon_id" class="form-select">
                                <option value="">-- Select Coupon --</option>
                                @foreach ($coupon as $coupon)
                                <option value="{{$coupon->id}}">{{$coupon->coupon_name}}</option>
                                @endforeach
                            </select>
                            @error('coupon_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add offer</button>
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
                                <th>Price(Tk)</th>
                                <th>Coupon</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($offers as $sl=>$offer)
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$offer->price}}</td>
                                <td>{{$offer->rel_to_coupon->coupon_name}}</td>
                                <td>
                                    <a href="{{route('offer.status.change', $offer->id)}}" class="badge badge-{{$offer->status == 0 ? 'danger': 'success'}}">{{$offer->status == 0 ? 'Deactive': 'active'}}</a>
                                </td>
                                <td>
                                    <a href="{{route('offer.delete', $offer->id)}}" class="badge badge-danger">Delete</a>
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