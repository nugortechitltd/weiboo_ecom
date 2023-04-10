@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">News Details</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">News Details</a></li>
            </ul>
        </div>
    </div>
</div>
    <!--news-feed-area start-->
    <section class="news-feed-area pt-120 pb-75 pt-md-60 pb-md-15 pt-xs-50 pb-xs-10">
        <div class="container">
            <div class="row mb-15">
                <div class="col-lg-8 pe-xl-0">
                    <div class="news-left2">
                        <div class="news-top">
                            <div class="icon-text">
                                {{-- <span class="viewers fs-10"><a href="#"><i class="fal fa-eye"></i> 100 Views</a></span> --}}
                                {{-- <span class="comment fs-10"><a href="#"><i class="fal fa-comments"></i> 30 Comments</a></span> --}}
                                <span class="date fs-10"><a href="#"><i class="fal fa-calendar-alt"></i> {{$blog_info->first()->created_at->format('d F Y')}}</a></span>
                            </div>
                            {!! $blog_info->first()->description !!}
                        </div>
                        {{-- <div class="feature-section">
                            <h2 class="section-title">Ecommerce operates in all four of the following major market
                                segments. These are:</h2>
                            <ul class="title-inner">
                                <li class="sect-title">
                                    <h3>Business to business (B2B), which is the direct sale of goods and
                                        services between businesses</h3>
                                </li>
                                <li class="sect-title">
                                    <h3>Providing goods and services isn't as easy as it may seem. It
                                        a lot of research about the products</h3>
                                </li>
                                <li class="sect-title">
                                    <h3>Consumer to consumer, which allows individuals to sell to one
                                        usually through a third-party site like eBay</h3>
                                </li>
                                <li class="sect-title">
                                    <h3>Services you wish to sell, the market, audience, competition, as
                                        as expected business costs.</h3>
                                </li>
                            </ul>
                        </div>
                        <div class="quote-section text-center">
                            <div class="icon">
                                <img src="assets/images/blog-details/quote.png" alt="">
                            </div>
                            <div class="text">
                                <h3>“ Once that's determined, you need to come up with a name and set up a legal
                                    structure, such as a corporation. Next, set up an ecommerce site with a payment
                                    gateway.
                                    For instance, a small business owner who runs a dress shop ”</h3>
                            </div>
                            <div class="author2">
                                <span class="name">Rosalina D. William </span>
                                <span class="intro"> / Head Of Idea, Rosalina Co.</span>
                            </div>
                        </div> --}}
                        {{-- <p class="description2">
                            {!! $blog_info->first()->description !!}
                        </p> --}}
                        <div class="button-area">
                            <div class="row justify-content-between">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="tag-area">
                                        <h3>Related Tags</h3>
                                        <div class="button-tag">
                                            <ul>
                                                @php
                                                    $after_explode = explode(',', $blog_info->first()->tag_id);
                                                @endphp
                                                @foreach ($after_explode as $tag_id)
                                                    @php
                                                        $tags = App\Models\Tag::where('id', $tag_id)->get();
                                                    @endphp
                                                    @foreach ($tags as $tag) 
                                                        <li><a href="">{{$tag->tag}}</a></li>
                                                        {{-- <li><a href="{{route('tag.search', $tag->id)}}">{{$tag->tag}}</a></li> --}}
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 text-sm-end text-start">
                                    <div class="social-area">
                                        <div class="social-title">
                                            <h3>Social Share</h3>
                                        </div>
                                        <div class="social-icon">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="post-area">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-lg-4 col-sm-4 col-12 text-start">
                                        <div class="previous-post">
                                            <div class="post-img">
                                                <a href="#"><img src="assets/images/blog-details/prev-post.jpg"
                                                        alt="prev-post"></a>
                                            </div>
                                            <div class="post-text">
                                                <h3 class="sub-title">Prev Post</h3>
                                                <h2 class="sect-title"><a href="#">Tips On Minimalist</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12 text-sm-center text-start">
                                        <div class="icon-area">
                                            <a href="#"><img src="assets/images/blog-details/shape.png" alt="img"></a>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 col-sm-4 col-12 text-sm-end text-start justify-content-sm-end justify-content-start">
                                        <div class="next-post">
                                            <div class="post-text">
                                                <h3 class="sub-title">Next Post</h3>
                                                <h2 class="sect-title"><a href="#">Less Is More</a></h2>
                                            </div>
                                            <div class="post-img">
                                                <a href="#"><img src="assets/images/blog-details/next-post.jpg"
                                                        alt="next-post"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="comment-header">
                                <div class="comment">
                                    <h3>04 Comment</h3>
                                </div>
                                <div class="icon">
                                    <a href=""><i class="fal fa-comments"></i></a>
                                </div>
                            </div>
                            @foreach ($comments as $comment)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comment-section">
                                        <div class="comment-text">
                                            <div class="commentator">
                                                @if ($comment->rel_to_user->image != null)
                                                    <a href="#"><img style="width: 100px; height: 100px" src="{{asset('uploads/customer')}}/{{$comment->rel_to_user->image}}"
                                                        alt="commentator"></a>
                                                @else
                                                <a href="#"><img src="{{Avatar::create($comment->name)->toBase64()}}"
                                                    alt="commentator"></a>
                                                @endif
                                                
                                                        
                                            </div>
                                            <div class="text">
                                                <div class="section-title">
                                                    <div class="title">
                                                        <h2 class="sub-title">{{$comment->rel_to_user->name}}</h2>
                                                        <span class="sect-title"><a href="#"><i class="fal fa-calendar-alt"></i> {{$comment->created_at->format('d M Y')}}</a></span>
                                                    </div>
                                                    <div class="button reply">
                                                        <a href="#reply_form" data-parent="{{$comment->id}}" class="comment-reply"><i class="fal fa-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                                <p class="description">{{$comment->message}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($comment->replies as $reply)
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div class="comment-section">
                                        <div class="comment-text">
                                            <div class="commentator">
                                                @if ($reply->rel_to_user->image != null)
                                                    <a href="#"><img style="width: 100px; height: 100px" src="{{asset('uploads/customer')}}/{{$reply->rel_to_user->image}}"
                                                        alt="commentator"></a>
                                                @else
                                                <a href="#"><img src="{{Avatar::create($reply->name)->toBase64()}}"
                                                    alt="commentator"></a>
                                                @endif
                                                {{-- <a href="#"><img src="{{}}" alt="commentator"></a> --}}
                                            </div>
                                            <div class="text">
                                                <div class="section-title">
                                                    <div class="title">
                                                        <h2 class="sub-title">{{$reply->name}}</h2>
                                                        <span class="sect-title"><a href="#"><i
                                                                    class="fal fa-calendar-alt"></i> {{$reply->created_at->format('d M Y')}}</a></span>
                                                    </div>
                                                    <div class="button reply">
                                                        <a href="#reply_form" data-parent="{{$reply->parent_id}}" class="comment-reply"><i class="fal fa-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                                <p class="description">{{$reply->message}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                            {{-- <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div class="comment-section">
                                        <div class="comment-text">
                                            <div class="commentator">
                                                <a href="#"><img src="assets/images/blog-details/commentator-3.jpg"
                                                        alt="commentator"></a>
                                            </div>
                                            <div class="text">
                                                <div class="section-title">
                                                    <div class="title">
                                                        <h2 class="sub-title">Miranda Halim</h2>
                                                        <span class="sect-title"><a href="#"><i
                                                                    class="fal fa-calendar-alt"></i>
                                                                24th
                                                                March
                                                                2022</a></span>
                                                    </div>
                                                    <div class="button">
                                                        <a href="#"><i class="fal fa-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                                <p class="description">commerce has changed the way people shop and
                                                    consume products and services. More and more people are turning to
                                                    their computers and smart devices to order goods, which can easily
                                                    be delivered to their homes. As such, it has disrupted the retail
                                                    landscape. Amazon and Alibaba have gained considerable popularity
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="rating-area">
                                <div class="rating-text">
                                    <h2 class="text">Give Your Opinion</h2>
                                </div>
                                <div class="rating-icon">
                                    <span class="one"><a href="#"> <i class="fas fa-star"></i></a></span>
                                    <span class="two"><a href="#"> <i class="fas fa-star"></i></a></span>
                                    <span class="three"><a href="#"> <i class="fas fa-star"></i></a></span>
                                    <span class="four"><a href="#"> <i class="fal fa-star"></i></a></span>
                                    <span class="five"><a href="#"> <i class="fal fa-star"></i></a></span>
                                </div>
                            </div> --}}
                            @auth('customerauth')
                            <form action="{{route('comment')}}" method="POST" id="reply_form">
                                @csrf
                            <div class="comment-form mb-10">
                                <div class="contact-form">
                                    <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="input-box text-input mb-20">
                                                    <textarea name="message" cols="30" rows="10"placeholder="Type Your Comments..."></textarea>
                                                        @error('message')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="col-lg-12">
                                                    <div class="input-box mb-20">
                                                        <input type="text" name="name" placeholder="Type Your Name..." value="{{Auth::guard('customerauth')->user()->name}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="input-box mail-input mb-20">
                                                        <input type="text" name="email" id="validationDefault03" placeholder="Type Your E-mail..."  value="{{Auth::guard('customerauth')->user()->email}}" readonly>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="post_id" class="parent" value="{{$blog_info->first()->id}}">
                                                <input type="hidden" name="parent_id" class="parent">
                                                <div class="col-12 mb-15">
                                                    <button class="form-btn form-btn4" type="submit">
                                                        <i class="fal fa-comment">
                                                        </i>
                                                        Post Comments
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                            @else
                            <div class="text-center">You are not logged in yet. Please <a href="{{route('customer.login')}}" class="btn btn-warning text-white">Log in</a> now </div>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pl-30 pl-lg-15 pl-md-15 pl-xs-15">
                    <div class="news-right-widget">
                        {{-- <div class="widget widget-search mb-40">
                            <div class="widget-title-box pb-25 mb-30">
                                <h4 class="widget-sub-title2 fs-20">Search Here</h4>
                            </div>
                            <form class="subscribe-form mb-10" action="#">
                                <input type="text" placeholder="Search your keyword...">
                                <button class="widget-btn"><i class="fal fa-search"></i></button>
                            </form>
                        </div> --}}
                        <div class="widget widget-post mb-40">
                            <div class="widget-title-box pb-25 mb-30">
                                <h4 class="widget-sub-title2 fs-20">Popular Feeds</h4>
                            </div>
                            <ul class="post-list">
                                @foreach ($recent_blog as $blog)
                                <li>
                                    <div class="blog-post mb-30">
                                        <a href="{{route('blog.details', $blog->slug)}}"><img width="80" height="auto" src="{{asset('uploads/blog')}}/{{$blog->feat_image}}" alt="Post Img"></a>
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
                                <li><a href="{{route('blog.category.search', $category->id)}}">{{$category->category_name}} <span class="f-right">{{App\Models\Blog::where('category_id', $category->id)->count()}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget-categories-tag mb-40">
                            <div class="widget-title-box pb-25 mb-25">
                                <h4 class="widget-sub-title2 fs-20">Instagram Feeds</h4>
                            </div>
                            <div class="tag-list">
                                @foreach ($tag_all as $tag)
                                <a href="#">{{$tag->tag}}</a>
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

@section('footer_script')
    <script>
        $('.comment-reply').click(function() {
            var parent_id = $(this).attr('data-parent');
            $('.parent').attr('value', parent_id);
        })
    </script>
@endsection