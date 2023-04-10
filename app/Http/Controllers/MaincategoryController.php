<?php

namespace App\Http\Controllers;

use App\Models\Maincategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class MaincategoryController extends Controller
{
    //maincategory blade
    function maincategory() {
        return view('backend.maincategory.maincategory');
    }

    // maincategory store
    function maincategory_store(Request $request) {
        $request->validate([
            'maincategory_name' => 'required|unique:maincategories',
            'maincategory_image' => 'required|mimes:jpg,jpeg,gif,png,webp|file|max:5000',
        ]);

        $maincategory_id = Maincategory::insertGetId([
            'maincategory_name' => $request->maincategory_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        $maincategory_image = $request->maincategory_image;
        $extension = $maincategory_image->getClientOriginalExtension();
        $after_replace = str_replace(' ', '-', $request->maincategory_name);
        $file_name = Str::lower($after_replace).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($maincategory_image)->resize(338, 450)->save(public_path('uploads/maincategory/'.$file_name));
        
        Maincategory::find($maincategory_id)->update([
            'maincategory_image' => $file_name,
        ]);
        return back()->withSuccess('Maincategory added successfully.');
    }

    // maincategory list
    function maincategory_list() {
        $maincategories = Maincategory::all();
        return view('backend.maincategory.maincategory_list', [
            'categories' => $maincategories,
        ]);
    }

    // maincategory edit
    function maincategory_edit($maincategory_id) {
        $maincategories = Maincategory::find($maincategory_id);
        return view('backend.maincategory.maincategory_edit', [
            'maincategories' => $maincategories,
        ]);
    }

    // maincategory update
    // function maincategory_update(Request $request) {
    //     $request->validate([
    //         'maincategory_name' => 'required',
    //     ]);
    //     if($request->maincategory_image == null) {
    //         Maincategory::find($request->maincategory_id)->update([
    //             'maincategory_name' => $request->maincategory_name,
    //             'added_by' => Auth::id(),
    //             'updated_at' => Carbon::now(),
    //         ]);
    //         return back()->withSuccess('Category updated successfully');
    //     } else {
    //         $category_img_del = Maincategory::where('id', $request->maincategory_id)->first()->maincategory_image;
    //         $delete_from = public_path('uploads/maincategory/'.$category_img_del);
    //         unlink($delete_from);
    //         $upload_img = $request->maincategory_image;
    //         $extension = $upload_img->getClientOriginalExtension();
    //         $after_replace = str_replace(' ', '-', $request->maincategory_name);
    //         $file_name = $after_replace.'-'.rand(1000, 9999).'.'.$extension;
    //         Image::make($upload_img)->resize(338, 450)->save(public_path('uploads/maincategory/'.$file_name));
    //         Maincategory::find($request->maincategory_id)->update([
    //             'maincategory_name' => $request->maincategory_name,
    //             'maincategory_image' => $file_name,
    //             'added_by' => Auth::id(),
    //             'updated_at' => Carbon::now(),
    //         ]);
    //         return back()->withSuccess('Maincategory updated successfully');
    //     }
    // }

    // maincategory delete
    // function maincategory_delete($maincategory_id) {
    //     $category_image = Maincategory::where('id', $maincategory_id)->first()->maincategory_image;
    //     $delete_from = public_path('uploads/maincategory/'.$category_image);
    //     unlink($delete_from);
    //     Maincategory::find($maincategory_id)->delete();
    //     return back()->withSuccess('Maincategory item deleted successfully');
    // }
}
