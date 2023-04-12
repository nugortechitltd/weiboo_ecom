<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Deal;
use App\Models\Inventory;
use App\Models\Maincategory;
use App\Models\Orderproduct;
use App\Models\Poster;
use App\Models\Product;
use App\Models\Producthumb;
use App\Models\Size;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //website page
    function home() {
        $categories = Category::all();
        $maincategories = Maincategory::all();
        $products = Product::latest()->take(9)->get();
        // $featured = Product::where('featured', '1')->get();
        $featured = Product::where('featured', '1')->latest()->take(4)->get();
        // $featured = Product::all();
        $brands = Brand::latest()->take(6)->get();
        $coupon = Coupon::all();
        $site = Aboutus::latest()->take(1);
        $socials = Social::all();
        $deals = Deal::latest()->take(1)->get();
        $poster = Poster::latest()->take(1)->get();
        $blog_latest = Blog::latest()->take(3)->get();

        $total_review = Orderproduct::where('product_id', $featured->first()->id)->where('review', '!=', null)->count();
        $total_star = OrderProduct::where('product_id', $featured->first()->id)->where('review', '!=', null)->sum('star');

        
        return view('frontend.index.index', [
            'categories' => $categories,
            'maincategories' => $maincategories,
            'products' => $products,
            'featured' => $featured,
            'brands' => $brands,
            'coupon' => $coupon,
            'site' => $site,
            'socials' => $socials,
            'deals' => $deals,
            'poster' => $poster,
            'blog_latest' => $blog_latest,
            'total_review' => $total_review,
            'total_star' => $total_star,
        ]);
    }

    // Product details
    function product_details($slug) {
        $details = Product::where('slug', $slug)->get();
        $related_products = Product::where('category_id', $details->first()->category_id)->where('id', '!=', $details->first()->id)->get();
        $thumbnails = Producthumb::where('product_id', $details->first()->id)->get();
        $available_colors = Inventory::where('product_id', $details->first()->id)
        ->groupBy('color_id')
        ->selectRaw('count(*) as total, color_id')
        ->get();

        // Review
        $reviews = OrderProduct::where('product_id', $details->first()->id)->where('review', '!=', null)->get();
        $total_review = OrderProduct::where('product_id', $details->first()->id)->where('review', '!=', null)->count();
        $total_star = OrderProduct::where('product_id', $details->first()->id)->where('review', '!=', null)->sum('star');
        
        // if($total_review != 0) {
        //     $total_rating = $total_star / $total_review;
        // } else {
        //     $total_rating = 0;
        // }

        $sizes = Size::all();
        return view('frontend.product_details.product_details', [
            'details' => $details,
            'thumbnails' => $thumbnails,
            'related_products' => $related_products,
            'available_colors' => $available_colors,
            'sizes' => $sizes,
            'reviews' => $reviews,
            'total_review' => $total_review,
            'total_star' => $total_star,
        ]);
    }

    // getSize
    function getSize(Request $request) {
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        
        $str = '';
        foreach ($sizes as $size) {
        $str .= '<div class="form-check size-option form-option form-check-inline mb-2 size-label">
        <input class="form-check-input" value="'.$size->rel_to_size->id.'" type="radio" name="size_id" id="size'.$size->rel_to_size->id.'">
        <label class="form-option-label form-option-size" for="size'.$size->rel_to_size->id.'"><span >'.$size->rel_to_size->size_name.'</span></label>
        </div>';
        }

        echo $str;
    }

    // Customer register
    function customer_register() {
        return view('frontend.authentication.customer_register');
    }
    // Customer login
    function customer_login() {
        return view('frontend.authentication.customer_login');
    }

    function customer_logout() {
        Auth::guard('customerauth')->logout();
        return redirect()->route('site')->withSuccess('Customer successfully logout');
    }

    // Show product details
    function showDetails(Request $request) {

        $product_id = $request->product_id;
        $product_info = Product::find($product_id);
        $thumbnails = Producthumb::where('product_id', $product_id)->get();
       
        $hello = '<div class="details-product-area">
        <div class="product-thumb-area">
            <div class="thumb-wrapper figure">
                <div class="product-thumb"><img src="uploads/products/preview/'.$product_info->preview_one.'" alt="product-thumb">
                </div>
            </div>
        </div>
        <div class="contents">
            <h2 class="product-title">'.$product_info->product_name.'</h2>
            
            
            <span class="product-price">'.$product_info->after_discount.' Tk</span>
            <p>
            '.$product_info->short_desp.'
            </p>
            <div class="product-bottom-action">
                <a href="'.route('cart.add.single', $product_info->id).'" class="addto-cart-btn action-item"><i class="rt-basket-shopping"></i>
                    Add To
                    Cart</a>
            </div>
            <div class="product-uniques">
                <span class="catagorys product-unipue"><span>Categories: </span> '.$product_info->rel_to_maincategory->maincategory_name.', '.$product_info->rel_to_category->category_name.', '.$product_info->rel_to_subcategory->subcategory_name.'</span>
            </div>
        </div>
    </div>';
       echo $hello;
    }

    // product_quick_view
    function product_quick_view($id) {
        $product = Product::where('id', $id)->first();
        $thumbnails = Producthumb::where('product_id', $id)->get();


        $total_review = Orderproduct::where('product_id', $product->id)->where('review', '!=', null)->count();
        $total_star = OrderProduct::where('product_id', $product->id)->where('review', '!=', null)->sum('star');
        
        return view('frontend.index.product_quick_view.quick_view', compact('product', 'thumbnails', 'total_review', 'total_star'));
    }

    
}


