<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Str;

class CategoryController extends Controller
{
    //category blade
    function category() {
        return view('backend.category.category');
    }

    // category store
    function category_store(Request $request) {
        $request->validate([
            'category_name' => 'required|unique:categories',
            'category_image' => 'required|mimes:jpg,jpeg,gif,png,webp|file|max:5000',
        ]);

        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        $category_image = $request->category_image;
        $extension = $category_image->getClientOriginalExtension();
        $after_replace = str_replace(' ', '-', $request->category_name);
        $file_name = Str::lower($after_replace).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($category_image)->resize(300, 200)->save(public_path('uploads/category/'.$file_name));
        
        Category::find($category_id)->update([
            'category_image' => $file_name,
        ]);
        return back()->withSuccess('Category added successfully.');
    }

    // category list
    function category_list() {
        $categories = Category::all();
        return view('backend.category.category_list', [
            'categories' => $categories,
        ]);
    }

    // category edit
    function category_edit($category_id) {
        $categories = Category::find($category_id);
        return view('backend.category.category_edit', [
            'categories' => $categories,
        ]);
    }

    // category update
    function category_update(Request $request) {
        $request->validate([
            'category_name' => 'required',
        ]);
        if($request->category_image == null) {
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('Category updated successfully');
        } else {
            $category_img_del = Category::where('id', $request->category_id)->first()->category_image;
            $delete_from = public_path('uploads/category/'.$category_img_del);
            unlink($delete_from);
            $upload_img = $request->category_image;
            $extension = $upload_img->getClientOriginalExtension();
            $after_replace = str_replace(' ', '-', $request->category_name);
            $file_name = $after_replace.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($upload_img)->resize(300, 200)->save(public_path('uploads/category/'.$file_name));
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'category_image' => $file_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('Category updated successfully');
        }
    }

    // Category delete
    function category_delete($category_id) {
        $category_image = Category::where('id', $category_id)->first()->category_image;
        $delete_from = public_path('uploads/category/'.$category_image);
        unlink($delete_from);
        Category::find($category_id)->delete();
        return back()->withSuccess('Category item deleted successfully');
    }
}
