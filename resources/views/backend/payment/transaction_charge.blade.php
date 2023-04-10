@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Add Charge Amount</h1>
            <p class="breadcrumbs"><span><a href="{{ route('home') }}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Charge amount
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
                        <h4>Add charge amount</h4>
                        {{--  --}}
                        <form class="row" method="POST" action="{{route('charge.store')}}">
                            @csrf
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">Location one</label>
                                <input id="text" name="location1" class="form-control" type="text"
                                    placeholder="Location">
                                @error('location1')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">Charge one</label>
                                <input id="text" name="charge1" class="form-control" type="number"
                                    placeholder="Charge">
                                @error('charge1')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">Location two</label>
                                <input id="text" name="location2" class="form-control" type="text"
                                    placeholder="location">
                                @error('location2')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">Charge two</label>
                                <input id="text" name="charge2" class="form-control" type="number"
                                    placeholder="Charge">
                                @error('charge2')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            {{-- <div class="col-6 mt-2">
                                <label for="text" class="col-form-label">bKash number type</label>
                                <input id="text" name="type1" class="form-control" type="tel" placeholder="bKash number type">
                                @error('type1')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div> --}}
                            <div class="col-12 mt-3">
                                <button name="submit" type="submit" class="btn btn-primary">Add charge details</button>
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
                                    <th>Location one</th>
                                    <th>Charge one (Tk)</th>
                                    <th>Location two</th>
                                    <th>Charge two (Tk)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach ($charges as $sl => $charge)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$charge->location1}}</td>
                                    <td>{{$charge->charge1}}</td>
                                    <td>{{$charge->location2}}</td>
                                    <td>{{$charge->charge2}}</td>
                                    {{-- <td>{{$payment->bkash}}</td>
                                    <td>{{$payment->type1}}</td>
                                    <td>{{Str::limit($payment->description1, '60', '...')}}</td>
                                    <td>{{$payment->rocket}}</td>
                                    <td>{{$payment->type2}}</td>
                                    <td>{{Str::limit($payment->description2, '60', '...')}}</td> --}}
                                    <td><a href="{{route('charge.delete', $charge->id)}}" class="badge badge-danger">Delete</a></td>
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
