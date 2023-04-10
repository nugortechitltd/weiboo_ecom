@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>All Products</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All product</p>
        </div>
        <div>
            <a href="{{route('product')}}" class="btn btn-primary"> Add Porduct</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Category</th>
                                    <th>Subategory</th>
                                    <th>Price(Tk)</th>
                                    <th>Discount(%)</th>
                                    <th>Price(Discount*)(Tk)</th>
                                    <th>Brand</th>
                                    <th>Added</th>
                                    <th>Featured</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $sl=>$product)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td><img class="tbl-thumb" src="{{asset('uploads/products/preview')}}/{{$product->preview_one}}" alt="Product Image" /></td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->rel_to_category->category_name}}</td>
                                    <td>{{$product->rel_to_subcategory->subcategory_name}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->discount == null ? 'Na' : $product->discount}}</td>
                                    <td>{{$product->after_discount}}</td>
                                    <td>@if ($product->rel_to_brand == null)
                                        NA
                                    @else
                                        {{$product->rel_to_brand->brand_name}}
                                    @endif</td>
                                    <td>{{$product->rel_to_user->name}}</td>
                                    <td><a href="{{route('product.status', $product->id)}}" class="badge badge-{{($product->featured == 0)? 'danger': 'success'}}">{{($product->featured == 0)? 'deactive': 'active'}}</a></td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <button type="button"
                                                class="btn btn-outline-success">Info</button>
                                            <button type="button"
                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                                <span class="sr-only">Info</span>
                                            </button>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('inventory', $product->id)}}">Inventory</a>
                                                <a class="dropdown-item" href="{{route('product.delete', $product->id)}}">Delete</a>
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
    </div>
@endsection