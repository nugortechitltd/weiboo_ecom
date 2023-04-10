@extends('layouts.dashboard')
@section('content')
<div class="breadcrumb-wrapper breadcrumb-contacts">
    <div>
        <h1>Add Faq</h1>
        <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Add faq</p>
    </div>
    <div>
        <a href="{{route('faq.list')}}" class="btn btn-primary">All faq</a>
    </div>
        
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add left side faq</h4>

                    <form class="row" method="POST" action="{{route('faq.add')}}">
                        @csrf
                        <div class="col-12">
                               <label class="col-form-label">faq question</label> 
                                <input name="faq_title" class="form-control" type="text" placeholder="Question">
                                @error('faq_title')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Faq answer</label>
                            <textarea name="faq_desc" class="form-control" placeholder="Answer"></textarea>
                            @error('faq_desc')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add faq</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Add right side faq</h4>

                    <form class="row" method="POST" action="{{route('faq.add.r')}}">
                        @csrf
                        <div class="col-12">
                               <label for="text" class="col-form-label">faq question</label> 
                                <input id="text" name="faq_title_r" class="form-control" type="text" placeholder="Question">
                                @error('faq_title_r')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Faq answer</label>
                            <textarea name="faq_desc_r" class="form-control" placeholder="Answer"></textarea>
                            @error('faq_desc_r')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add faq</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection