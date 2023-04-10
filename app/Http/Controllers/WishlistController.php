<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //wishlist
    function wishlist() {
        $wishlists = Wishlist::all();
        return view('frontend.wishlist.wishlist', [
            'wishlists' => $wishlists,
        ]);
    }
    // wishlist_delete
    function wishlist_delete($wishlist_id) {
        Wishlist::find($wishlist_id)->delete();
        return back()->withSuccess('Wishlist deleted successfully.');
    }

    function cart_store_wishlist($wishlist_id) {
        $customer= Wishlist::find($wishlist_id);
        Cart::insert([
            'customer_id' => $customer->customer_id,
            'product_id' => $customer->product_id,
            'color_id' => $customer->color_id,
            'size_id' => $customer->size_id,
            'quantity' => $customer->quantity,
            'created_at' => Carbon::now(),
        ]);
        Wishlist::find($wishlist_id)->delete();
        return back()->withSuccess('Cart added successfully');
    }

    // wishlist_add_single
    function wishlist_add_single($product_id) {
        if(Auth::guard('customerauth')->check()) {
            $product_info = Product::find($product_id);
            if($product_info->quantity == null) {
                $quantity = 1;
            }
            if($product_info->color_id == null) {
                $color_id = 1;
            }
            if($product_info->size_id == null) {
                $size_id = 1;
            }
            
            if(Inventory::where('product_id', $product_id)->where('color_id', $color_id)->where('size_id', $size_id)->exists()) {
                echo 'valid';
                Wishlist::insert([
                    'customer_id' => Auth::guard('customerauth')->id(),
                    'product_id' => $product_id,
                    'color_id' => $color_id,
                    'size_id' => $size_id,
                    'quantity' => $quantity,
                    'created_at' => Carbon::now(),
                ]);
                return back()->withSuccess('wishlist added successfully');
            } else {
                return back()->withError('Product has color and size');
                echo 'not valid';
            }
        } else {
            return redirect()->route('customer.login')->withError('Please login first to add cart.');
        }
    }
}
