<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Str;

class SubcategoryController extends Controller
{
    //subcategory blade
    function subcategory() {
        $categories = Category::all();
        return view('backend.subcategory.subcategory', [
            'categories' => $categories,
        ]);
    }

    // subcategory store
    function subcategory_store(Request $request) {
        $request->validate([
            'subcategory_name'=> 'required',
        ]);
        $subcategory_id = Subcategory::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        $subcategory_image = $request->subcategory_image;
        $extension = $subcategory_image->getClientOriginalExtension();
        $after_replace = str_replace(' ', '-', $request->subcategory_name);
        $file_name = Str::lower($after_replace).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($subcategory_image)->resize(300, 200)->save(public_path('uploads/subcategory/'.$file_name));

        Subcategory::find($subcategory_id)->update([
            'subcategory_image'=> $file_name,
        ]);
        return back()->withSuccess('Subcategory added successfully');
    }
    // Subcategory list
    function subcategory_list() {
        $subcategories = Subcategory::all();
        return view('backend.subcategory.subcategory_list', [
            'subcategories' => $subcategories,
        ]);
    }

    // subcategory edit
    function subcategory_edit($subcategory_id) {
        $subcategories = Subcategory::find($subcategory_id);
        return view('backend.subcategory.subcategory_edit', [
            'subcategory' => $subcategories,
        ]);
    }

    // subcategory update
    function subcategory_update(Request $request) {
        $request->validate([
            'subcategory_name'=> 'required',
        ]);

        if($request->subcategory_image == null) {
            Subcategory::find($request->subcategory_id)->update([
                'subcategory_name' => $request->subcategory_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('Subcategory updated successfully!');
        } else{
            $subcategory_img_del = Subcategory::where('id', $request->subcategory_id)->first()->subcategory_image;
            $delete_from = public_path('uploads/subcategory/'.$subcategory_img_del);
            unlink($delete_from);
            $subcategory_image = $request->subcategory_image;
            $extension = $subcategory_image->getClientOriginalExtension();
            $after_replace = str_replace(' ', '-', $request->subcategory_name);
            $file_name = Str::lower($after_replace).'-'.rand(1000, 9999).'.'.$extension;
            Image::make($subcategory_image)->resize(300, 200)->save(public_path('uploads/subcategory/'.$file_name));
            Subcategory::find($request->subcategory_id)->update([
                'subcategory_name' => $request->subcategory_name,
                'subcategory_image' => $file_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now()
            ]);  
            return back()->withSuccess('Subcategory updated successfully!');
        }
    }

    // subcategory delete
    function subcategory_delete($subcategory_id) {
        $subcategory_image = Subcategory::where('id', $subcategory_id)->first()->subcategory_image;
        $delete_from = public_path('uploads/subcategory/'.$subcategory_image);
        unlink($delete_from);
        Subcategory::find($subcategory_id)->delete();
        return back()->withSuccess('Subcategory single item deleted successfully');
    }
}
