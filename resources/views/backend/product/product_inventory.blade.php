@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Inventory</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Inventory</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-body">
                    
                    

                    {{--  --}}
                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">
                                    <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('inventory.store')}}">
                                        @csrf
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Size name</label>
                                            <input type="text" name="product_name" readonly class="form-control" placeholder="Product name" value="{{$product->product_name}}">
                                            <input type="hidden" name="product_id" class="form-control" placeholder="Product name" value="{{$product->id}}">
                                            @error('product_name')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Color</label>
                                            <select name="color_id">
                                                <option value="">Select color</option>
                                                @foreach ($colors as $color)
                                                 <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('color_id')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Color</label>
                                            <select name="size_id">
                                                <option value="">Select size</option>
                                                @foreach ($sizes as $size)
                                                 <option value="{{$size->id}}">{{$size->size_name == null ? "NA" : $size->size_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('size_id')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" placeholder="Product quantity">
                                            @error('quantity')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <button type="submit" class="btn btn-primary">Add inventory</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table2" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($inventories as $sl=>$inventory)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>
                                        @if ($inventory->rel_to_color == null)
                                            deleted
                                        @else
                                        {{$inventory->rel_to_color->color_name == null ? 'NA': $inventory->rel_to_color->color_name}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($inventory->rel_to_size == null)
                                            deleted
                                        @else
                                            {{$inventory->rel_to_size->size_name == null ? 'NA': $inventory->rel_to_size->size_name}}
                                        @endif
                                    </td>
                                    <td>{{$inventory->rel_to_product->product_name == null ? 'NA': $inventory->rel_to_product->product_name}}</td>
                                    <td>{{$inventory->quantity}}</td>
                                    <td><a href="" class="badge badge-danger">Delete</a></td>
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