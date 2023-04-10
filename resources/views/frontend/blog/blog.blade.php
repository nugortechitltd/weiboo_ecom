@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">News</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="">News</a></li>
            </ul>
        </div>
    </div>
</div>

<!--news-feed-area start-->
<section class="news-feed-area pt-120 pb-75 pt-md-60 pb-md-15 pt-xs-50 pb-xs-10">
    <div class="container">
        <div class="row mb-15">
            <div class="col-lg-8 pe-xl-0">
                <div class="news-left">
                    <div class="row">
                        {{-- {{$blog_in}} --}}
                        @forelse ($blog_info as $blog)
                        <div class="col-xl-12">
                            <div class="feed-item2">
                                <a href="{{route('blog.details', $blog->slug)}}" class="feed-image"><img src="{{asset('uploads/blog')}}/{{$blog->feat_image}}" alt="feed-image"></a>
                                <div class="feed-content">
                                    <span class="feed-catagory">{{$blog->rel_to_category->category_name}}</span>
                                    <div class="author">
                                        @if ($blog->rel_to_user->image == null)
                                            <img class="cat-thumb" src="{{Avatar::create($blog->rel_to_user->name)->toBase64()}}" alt="">
                                            @else
                                            <img class="cat-thumb" src="{{asset('uploads/users')}}/{{$blog->rel_to_user->image}}" alt="Author Image" />
                                        @endif
                                         {{$blog->rel_to_user->name}}
                                    </div>
                                    <h2 class="feed-title"><a href="{{route('blog.details', $blog->slug)}}">{{$blog->title}}</a></h2>
                                    <p>{!! (Str::limit($blog->description, '500', '...')) !!}</p>
                                    <div class="feed-info">
                                        <span class="feed-date">
                                            <i class="rt-calendar-days"></i> {{$blog->created_at->format('F d, Y')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12 feed-item2">
                            <div class="text-center">
                                <h2 class="text-danger">No Search Found!</h2>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="row justify-content-center text-center mb-30">
                        <div class="col-lg-12">
                            <div class="page-navigation">
                                {{$blog_info->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pl-30 pl-lg-15 pl-md-15 pl-xs-15">
                <div class="news-right-widget">
                    <div class="widget widget-search mb-40">
                        <div class="widget-title-box pb-25 mb-30">
                            <h4 class="widget-sub-title2 fs-20">Search Here</h4>
                        </div>
                        {{-- <form action="{{url('search/btn')}}" method="GET" role="search">
                            <input id="searchInput1" name="search" value="{{Request::get('search')}}" class="search-input" type="text" placeholder="Search by keyword or #">
                            <button class="btn btn-secondary btn-lg" type="submit">Search</button>
                        </form>  --}}
                        <form class="subscribe-form mb-10" action="{{url('blog/search')}}" method="GET" role="search">
                            <input id="searchBlog" name="query" value="{{Request::get('query')}}" class="search-blog-input" type="text" placeholder="Searching...">
                            <button class="widget-btn" type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget-post mb-40">
                        <div class="widget-title-box pb-25 mb-30">
                            <h4 class="widget-sub-title2 fs-20">Recent Posts</h4>
                        </div>
                        <ul class="post-list">
                            @foreach ($recent_blog as $blog)
                            <li>
                                <div class="blog-post mb-30">
                                    <a href="{{route('blog.details', $blog->slug)}}"><img width="80" src="{{asset('uploads/blog')}}/{{$blog->feat_image}}" alt="Post Img"></a>
                                    <div class="post-content">
                                        <h6 class="mb-10"><a href="{{route('blog.details', $blog->slug)}}">{{Str::limit($blog->title, '34', '')}}</a></h6>
                                        <span class="fs-14"><i class="fal fa-calendar-alt"></i> {{$blog->created_at->format('d F Y')}}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget-categories-list mb-40">
                        <div class="widget-title-box pb-25 mb-30">
                            <h4 class="widget-sub-title2 fs-20">Categories</h4>
                        </div>
                        <ul class="list-none">
                            @foreach ($categories as $category)
                            <li><a href="#">{{$category->category_name}} <span class="f-right">({{App\Models\Blog::where('category_id', $category->id)->count()}})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget-categories-tag mb-40">
                        <div class="widget-title-box pb-25 mb-25">
                            <h4 class="widget-sub-title2 fs-20">Instagram Feeds</h4>
                        </div>
                        <div class="tag-list">
                            @foreach ($tags as $tag)
                            <a href="">{{$tag->tag}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--news-feed-area end-->
@endsection