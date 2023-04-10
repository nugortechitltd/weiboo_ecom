@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Add payment details</h1>
            <p class="breadcrumbs"><span><a href="{{ route('home') }}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Payment
            </p>
        </div>
        <div>
            {{-- <a href="{{route('payment.list')}}" class="btn btn-primary">All payment</a> --}}
        </div>

    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default mb-24px">
                <div class="card-body">
                    <div class="ec-cat-form">
                        <h4>Add payment details</h4>
                        {{--  --}}
                        <form class="row" method="POST" action="{{route('payment.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">bKash number</label>
                                <input id="text" name="bkash" class="form-control" type="tel"
                                    placeholder="bKash number">
                                @error('bkash')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">bKash number type</label>
                                <input id="text" name="type1" class="form-control" type="tel" placeholder="bKash number type">
                                @error('type1')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">Rocket number</label>
                                <input id="text" name="rocket" class="form-control" type="tel"
                                    placeholder="rocket number">
                                @error('rocket')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">Rocket number type</label>
                                <input id="text" name="type2" class="form-control" type="tel" placeholder="rocket number type">
                                @error('type2')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">bKash description</label>
                                <textarea id="text" name="description1" class="form-control" type="tel" placeholder="bKash description"></textarea>
                                @error('description1')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">Rocket description</label>
                                <textarea id="text" name="description2" class="form-control" type="tel" placeholder="rocket description"></textarea>
                                @error('description2')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <button name="submit" type="submit" class="btn btn-primary">Add payment details</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>bKash number</th>
                                    <th>bKash type</th>
                                    <th>bKash text</th>
                                    <th>Rocket number</th>
                                    <th>Rocket type</th>
                                    <th>Rocket text</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach ($payment as $sl => $payment)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$payment->bkash}}</td>
                                    <td>{{$payment->type1}}</td>
                                    <td>{{Str::limit($payment->description1, '60', '...')}}</td>
                                    <td>{{$payment->rocket}}</td>
                                    <td>{{$payment->type2}}</td>
                                    <td>{{Str::limit($payment->description2, '60', '...')}}</td>
                                    <td><a href="{{route('payment.delete', $payment->id)}}" class="badge badge-danger">Delete</a></td>
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
