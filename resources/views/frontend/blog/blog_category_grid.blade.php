@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">News-Grid</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">News-Grid</a></li>
            </ul>
        </div>
    </div>
</div>

<!--news-feed-area start-->
<div class="rts-featured-product-section3">
    <div class="container">
        <div class="rts-featured-product-section-inner">
            <div class="row">
                @forelse ($blogs as $blog)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="full-wrapper wrapper-1 wrapper-4">
                        <div class="image-part">
                            <a href="{{route('blog.details', $blog->slug)}}" class="image"><img src="{{asset('uploads/blog')}}/{{$blog->feat_image}}" alt="Featured Image"></a>
                        </div>
                        <div class="blog-content">
                            <span class="date-full">
                                <span class="day">{{$blog->created_at->format('d')}}</span>
                                <br>
                                <span class="month">{{$blog->created_at->format('M')}}</span>
                            </span>
                            <ul class="blog-meta">
                                <li><a href="">{{$blog->rel_to_category->category_name}}</a></li>
                            </ul>
                            <div class="title">
                                <a href="{{route('blog.details', $blog->slug)}}">{{Str::limit($blog->title, '90', '...')}}</a>
                            </div>
                            <div class="author-info d-flex align-items-center">
                                <div class="avatar">
                                    @if ($blog->rel_to_user->image == null)
                                        <img class="cat-thumb" src="{{Avatar::create($blog->rel_to_user->name)->toBase64()}}" alt="Author Image">
                                    @else
                                        <img class="cat-thumb" src="{{asset('uploads/users')}}/{{$blog->rel_to_user->image}}" alt="Author Image" />
                                    @endif
                                </div>
                                <div class="info">
                                    <p class="author-name"> {{$blog->rel_to_user->name}}</p>
                                    <p class="author-dsg">Author</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="full-wrapper wrapper-1 wrapper-4">
                        <div class="text-danger">No search blog found</div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!--news-feed-area end-->
@endsection