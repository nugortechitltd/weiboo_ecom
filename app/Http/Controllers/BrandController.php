<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class BrandController extends Controller
{
    // Product brand
    function product_brand() {
        return view('backend.product.product_brand');
    }

    // Brand Name 
    function brand() {
        $brands = Brand::all();
        return view('backend.brand.brand', [
            'brands'=> $brands,
        ]);
    }

    // Brand store
    function brand_store(Request $request) {
        $request->validate([
            'brand_name' => 'required|unique:brands',
            'brand_image' => 'required|mimes:jpg,jpeg,gif,png,webp|file|max:5000',
        ]);

        $brand_id = Brand::insertGetId([
            'brand_name' => $request->brand_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        $brand_image = $request->brand_image;
        $extension = $brand_image->getClientOriginalExtension();
        $after_replace = str_replace(' ', '-', $request->brand_name);
        $file_name = Str::lower($after_replace).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($brand_image)->save(public_path('uploads/brand/'.$file_name));
        
        Brand::find($brand_id)->update([
            'brand_image' => $file_name,
        ]);
        return back()->withSuccess('brand added successfully.');
    }

    // Brand list
    function brand_list() {
        $brands = Brand::all();
        return view('backend.product.product_brand_list', [
            'brands' => $brands,
        ]);
    }

    // brand edit
    function brand_edit($brand_id) {
        $brands = Brand::find($brand_id);
        return view('backend.product.product_brand_edit', [
            'brand' => $brands,
        ]);
    }

    // Brand update
    function brand_update(Request $request) {
        $request->validate([
            'brand_name' => 'required',
        ]);
        if($request->brand_image == null) {
            Brand::find($request->brand_id)->update([
                'brand_name' => $request->brand_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('brand updated successfully');
        } else {
            $brand_img_del = Brand::where('id', $request->brand_id)->first()->brand_image;
            $delete_from = public_path('uploads/brand/'.$brand_img_del);
            unlink($delete_from);
            $upload_img = $request->brand_image;
            $extension = $upload_img->getClientOriginalExtension();
            $after_replace = str_replace(' ', '-', $request->brand_name);
            $file_name = $after_replace.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($upload_img)->save(public_path('uploads/brand/'.$file_name));
            brand::find($request->brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $file_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('brand updated successfully');
        }
    }

    // Brand Delete
    function brand_delete($brand_id) {
        $brand_image = Brand::where('id', $brand_id)->first()->brand_image;
        $delete_from = public_path('uploads/brand/'.$brand_image);
        unlink($delete_from);
        Brand::find($brand_id)->delete();
        return back()->withSuccess('brand item deleted successfully');
    }
}
