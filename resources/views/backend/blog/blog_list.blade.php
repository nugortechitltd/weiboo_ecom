@extends('layouts.dashboard')
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>All Blog</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>All blog
            </p>
        </div>

        <div>
            <a href="{{route('blog.add')}}" class="btn btn-primary">Add blog</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Tags</th>
                                    <th>Feat image</th>
                                    <th>Crated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($mypost as $sl=>$blog)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$blog->rel_to_category->category_name}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        {{-- {{$blog->tag_id}} --}}
                                        @php
                                            $after_explode = explode(',', $blog->tag_id)
                                        @endphp
                                        @foreach ($after_explode as $tag_id)
                                            @php
                                                $tags = App\Models\Tag::where('id', $tag_id)->get()
                                            @endphp
                                            @foreach ($tags as $tag)
                                                <span class="badge badge-primary">{{$tag->tag}}</span>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($blog->feat_image)
                                            
                                        <img width="60" src="{{asset('uploads/blog')}}/{{$blog->feat_image}}" alt="">
                                        @else
                                           <div>NA</div> 
                                        @endif
                                    </td>
                                    <td>{{$blog->created_at->format('d M Y')}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-outline-success">Info</button>
                                            <button type="button"
                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                                <span class="sr-only">Info</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('blog.edit', $blog->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('blog.delete', $blog->id)}}">Delete</a>
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