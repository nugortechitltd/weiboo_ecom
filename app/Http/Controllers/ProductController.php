<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Maincategory;
use App\Models\Product;
use App\Models\Producthumb;
use App\Models\Size;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class ProductController extends Controller
{
    //product blade
    function product() {
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.product', [
            'categories' => $categories,
            'brand' => $brands,
        ]);
    }

    // get subcategory
    function getSubcategory(Request $request) {
        $str = '<option>Select subcategory</option>';
        $subcategory_info = Subcategory::where('category_id', $request->categoryid)->get();
        foreach ($subcategory_info as $subcategory) {
            $str .= '<option value="'.$subcategory->id.'">'.$subcategory->subcategory_name.'</option>';
        }
        echo $str;
    }

    // product store
    function product_store(Request $request) {
        $request->validate([
            'category_id'=> 'required',
            'subcategory_id'=> 'required',
            'product_name'=> 'required',
            'product_price'=> 'required',
            'short_desp'=> 'required',
            'long_desc'=> 'required',
            'preview_one' => 'required|mimes:jpg,jpeg,gif,png,webp|max:5000',
            'preview_two' => 'mimes:jpg,jpeg,gif,png,webp|max:5000',
            'thumbnail' => 'required',
            'thumbnail.*' => 'image|mimes:jpg,jpeg,gif,png,webp',
        ], [
            'long_desc.required' => 'The description field is required.',
            'short_desp.required' => 'The short description field is required.',
        ]);
        $active = 1;
        
        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'brand_id' => $request->brand_id,
            'discount' => $request->discount,
            'short_desp' => $request->short_desp,
            'long_desc' => $request->long_desc,
            'featured' => $active,
            'additional_desc' => $request->additional_desc,
            'slug' => str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999),
            'after_discount' => $request->product_price - ($request->product_price * $request->discount)/100,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        // Preview one
        $uploaded_file_one = $request->preview_one;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(338, 450)->save(public_path('uploads/products/preview/'.$file_name_one));
        Product::find($product_id)->update([
            'preview_one' => $file_name_one
        ]);
        // Preview two
        if($request->preview_two != null) {
            $uploaded_file_two = $request->preview_two;
            $extension = $uploaded_file_two->getClientOriginalExtension();
            $file_name_two = str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999).'.'.$extension;
            Image::make($uploaded_file_two)->resize(338, 450)->save(public_path('uploads/products/preview/'.$file_name_two));
            Product::find($product_id)->update([
                'preview_two' => $file_name_two
            ]);
        }
        // Thumbnails
        $uploaded_thumbnails = $request->thumbnail;
        foreach ($uploaded_thumbnails as $thumbnail) {
            $thumb_extension = $thumbnail->getClientOriginalExtension();
            $thumb_name = str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000,9999).'.'.$thumb_extension;
            Image::make($thumbnail)->resize(450, 511)->save(public_path('uploads/products/thumbnail/'.$thumb_name));
            Producthumb::insert([
                'product_id' => $product_id,
                'added_by' => Auth::id(),
                'thumbnail' => $thumb_name
            ]);
        }

        return back()->withSuccess('Product added successfully.');
    }

    // product list
    function product_list() {
        $products = Product::all();
        return view('backend.product.product_list', [
            'products' => $products,
        ]);
    }

    // product delete
    function product_delete($product_id) {
        $preview_image_one = Product::where('id', $product_id)->get();
        $delete_preview_one = public_path('uploads/products/preview/'. $preview_image_one->first()->preview_one);
        unlink($delete_preview_one);
        if(Product::find($product_id)->first()->preview_two != null) {
            $preview_image_two = Product::where('id', $product_id)->get();
            $delete_preview_two = public_path('uploads/products/preview/'. $preview_image_two->first()->preview_two);
            unlink($delete_preview_two);
        } 
        Product::find($product_id)->delete();
        $thumb_image = Producthumb::where('product_id', $product_id)->get();
        foreach($thumb_image as $thumb) {
            $delete_thumbnails = public_path('uploads/products/thumbnail/'. $thumb->thumbnail);
            unlink($delete_thumbnails);
            Producthumb::find($thumb->id)->delete();
        }
        $inventories = Inventory::where('product_id', $product_id)->get();
        foreach($inventories as $inventory) {
            Inventory::find($inventory->id)->delete();
        }
        return back()->withSuccess('Product item deleted successfully');
    }

    // Inventory
    function inventory($product_id) {
        $product_info = Product::find($product_id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventories = Inventory::where('product_id', $product_id)->get();
        return view('backend.product.product_inventory', [
            'product' => $product_info,
            'colors' => $colors,
            'sizes' => $sizes,
            'inventories' => $inventories,
        ]);
    }

    // Inventory store
    function inventory_store(Request $request) {
        $request->validate([
            'color_id'=> 'required',
            'size_id'=> 'required',
            'quantity'=> 'required',
        ]);
        if(Inventory::where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->exists()) {
            Inventory::where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->increment('quantity', $request->quantity);
            return back()->withSuccess('Quantity increment successfully');
        } else {
            Inventory::insert([
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity,
            ]);
            return back()->withSuccess('Inventory added successfully');
        }
        
    }

    // product status
    function product_status($product_id) {
        $product_info = Product::find($product_id);
        if($product_info->featured == 0) {
            Product::find($product_id)->update([
                'featured' => 1,
            ]);
        } else {
            Product::find($product_id)->update([
                'featured' => 0,
            ]);
        }
        return back();
    }

    
    
}
