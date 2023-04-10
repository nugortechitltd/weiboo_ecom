<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class BlogController extends Controller
{
    // tag
    function blog_tag() {
        $tags = Tag::all();
        return view('backend.blog.blog_tag', [
            'tags' => $tags,
        ]);
    }
    // tag store
    function tag_store(Request $request) {
        $request->validate([
            'tag' => 'required',
        ]);
        Tag::insert([
            'tag' => $request->tag,
        ]);
        return back()->withSuccess('Tag added successfully');
    }


    // tag delete
    function tag_delete($tag_id) {
        Tag::find($tag_id)->delete();
        return back()->withSuccess('Tag deleted successfully');
    }

    //blog
    function blog_add() {
        $category = Category::all();
        $tags = Tag::all();
        return view('backend.blog.blog_add', [
            'categories' => $category,
            'tags' => $tags,
        ]);
    }

    // Blog category search
    function blog_category_search($blog_id) {
        $blogs = Blog::where('category_id', $blog_id)->get();
        return view('frontend.blog.blog_category_grid', [
            'blogs' => $blogs,
        ]);
    }

    // blog_store
    function blog_store(Request $request) {
        $after_implode_tag = implode(',',$request->tag_id);
        $slug = Str::lower(str_replace(' ', '-', $request->title)).'-'.rand(100000, 999999);
        $blog_id = Blog::insertGetId([
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'tag_id' => $after_implode_tag,
            'slug' => $slug,
            'created_at' => Carbon::now(),
        ]);

        $uploaded_file = $request->feat_image;
        $ext = $uploaded_file->getClientOriginalExtension();
        $file_name = Str::lower(Auth::user()->name).'-'.rand(1000000, 9999999).'.'.$ext;
        // $file_name = Str::lower(str_replace(' ', '-', substr($request->title, 1, 10))).'-'.rand(1000000, 9999999).'.'.$ext;

        Image::make($uploaded_file)->save(public_path('uploads/blog/'.$file_name));

        $update = Blog::find($blog_id)->update([
            'feat_image' => $file_name,
        ]);

        return back()->withSuccess('Blog added successfully');
    }

    // Blog list
    function blog_list() {
        // $mypost = Blog::where('author_id', Auth::id())->get();
        $mypost = Blog::all();
        return view('backend.blog.blog_list', [
            'mypost' => $mypost,
        ]);
    }

    // blog_delete
    function blog_delete($blog_id) {
        if (Blog::where('id', $blog_id)->first()->feat_image != null) {
            $blog_img = Blog::where('id', $blog_id)->first()->feat_image;
            $delete_from = public_path('uploads/blog/'.$blog_img);
            $blog_img = Blog::where('id', $blog_id)->first()->feat_image;
            unlink($delete_from);
        }
        // Comment::where('post_id', $blog_id)->where('parent_id', $blog_id)->delete();
        // Comment::where('post_id', $blog_id)->delete();
        // if(Comment::where('post_id', $blog_id)->where('parent_id', $blog_id)) {
        //     Comment::where('id', $blog_id)->delete();
        // }
        Blog::find($blog_id)->delete();
        return back()->withSuccess('Blog item deleted successfully');
    }

    // blog_edit
    function blog_edit($blog_id) {
        $category = Category::all();
        $blogs = Blog::find($blog_id);
        $tag_main = Tag::all();
        $blog_info = Blog::find($blog_id);
        $after_explode = explode(',', $blog_info->tag_id);
        foreach($after_explode as $tag_id) {
            $tags = Tag::where('id', $tag_id)->get();
        }
        return view('backend.blog.blog_edit', [
            'categories' => $category,
            'blog_info' => $blogs,
            'tags' => $tags,
            'tag_main' => $tag_main,
        ]);
    }

    // blog update
    function blog_update(Request $request) {
        $after_implode_tag = implode(',', $request->tag_id);
        
        if($request->feat_image == '') {
            Blog::find($request->blog_id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'tag_id' => $after_implode_tag,
            ]);
            return back()->withSuccess('Blog updated successfully');
        } else {
            $blog_img_del = Blog::where('id', $request->blog_id)->first()->feat_image;
            $delete_from = public_path('uploads/blog/'.$blog_img_del);
            unlink($delete_from);
            $uploaded_file = $request->feat_image;
            $ext = $uploaded_file->getClientOriginalExtension();
            $file_name = Str::lower(Auth::user()->name).'-'.rand(1000000, 9999999).'.'.$ext;
            Image::make($uploaded_file)->save(public_path('uploads/blog/'.$file_name));
            Blog::find($request->blog_id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'tag_id' => $after_implode_tag,
                'feat_image' => $file_name,
            ]);
            return back()->withSuccess('Blog updated successfully');
        }
    }

    // blog
    function blog(Request $request) {
        $recent_blog = Blog::latest()->take(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $blog_info = Blog::Paginate(7);
        return view('frontend.blog.blog', [
            'blog_info' => $blog_info,
            'recent_blog' => $recent_blog,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    // blog_grid 
    function blog_grid() {
        $blogs = Blog::latest()->get();
        return view('frontend.blog.blog_grid', [
            'blogs' => $blogs,
        ]);
    }

    // blog details
    function blog_details($blog_slug) {
        $blog_info = Blog::where('slug', $blog_slug)->get();
        $comments = Comment::with('replies')->where('post_id', $blog_info->first()->id)->whereNull('parent_id')->get();
        $recent_blog = Blog::latest()->take(4)->get();
        $categories = Category::all();
        $tag_all = Tag::all();
        return view('frontend.blog.blog_details', [
            'blog_info' => $blog_info,
            'recent_blog' => $recent_blog,
            'categories' => $categories,
            'tag_all' => $tag_all,
            'comments' => $comments,
        ]);
    }

    // blog_comment
    function blog_comment() {
        $comments = Comment::all();
        return view('backend.blog.blog_comment', [
            'comments' => $comments,
        ]);
    }

    // comment delete
    function comment_delete($comment_id) {
        Comment::find($comment_id)->delete();
        return back()->withSuccess('Comment deleted successfully');
    }
}
