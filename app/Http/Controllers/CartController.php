<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class CartController extends Controller
{
    // cart page
    function cart(Request $request) {
        $discount = 0;
        $message = null;
        $coupon_code = $request->coupon;
        $type = null;

        if($coupon_code == null) {
            $discount = 0;
        } else {
            if(Coupon::where('coupon_name', $coupon_code)->exists()) {
                
                if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_code)->first()->validity) {
                    $discount = 0;
                    $message = 'Coupon code is Expired.';
                } else {
                    $discount = Coupon::where('coupon_name', $coupon_code)->first()->coupon_amount;
                    $type = Coupon::where('coupon_name', $coupon_code)->first()->coupon_type;
                }
            } else {
                $discount = 0;
                $message = 'Invalid Coupon Code!';
            }
        }
        
        return view('frontend.cart.cart', [
            'discount' => $discount,
            'coupon_code' => $coupon_code,
            'message' => $message,
            'type' => $type,
        ]);
    }
    //cart store
    function cart_store(Request $request) {
        $request->validate([
            'size_id' => 'required',
            'color_id' => 'required',
        ]);
        if($request->abcd == 1) {
            if(Auth::guard('customerauth')->check()) {
                if($request->color_id == null) {
                    $color_id = 1;
                } else {
                    $color_id = $request->color_id;
                }
                if($request->size_id == null) {
                    $size_id = 1;
                } else {
                    $size_id = $request->size_id;
                }
        
                if(($request->quantity) > (Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity)) {
                    return back()->with('total_stock', 'Total Stock ' . Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity);
                } else {
                    Cart::insert([
                        'customer_id' => Auth::guard('customerauth')->id(),
                        'product_id' => $request->product_id,
                        'color_id' => $color_id,
                        'size_id' => $size_id,
                        'quantity' => $request->quantity,
                        'created_at' => Carbon::now(),
                    ]);
                    return back()->withSuccess('Cart added successfully');
                }
            } else {
                return redirect()->route('customer.login')->withError('Please login first to add cart.');
            }
        } else {
            if(Auth::guard('customerauth')->check()) {
                if($request->color_id == null) {
                    $color_id = 1;
                } else {
                    $color_id = $request->color_id;
                }
                if($request->size_id == null) {
                    $size_id = 1;
                } else {
                    $size_id = $request->size_id;
                }
        
                if(($request->quantity) > (Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity)) {
                    return back()->with('total_stock', 'Total Stock ' . Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity);
                } else {
                    Wishlist::insert([
                        'customer_id' => Auth::guard('customerauth')->id(),
                        'product_id' => $request->product_id,
                        'color_id' => $color_id,
                        'size_id' => $size_id,
                        'quantity' => $request->quantity,
                        'created_at' => Carbon::now(),
                    ]);
                    return back()->withSuccess('Wishlist added successfully');
                }
            } else {
                return redirect()->route('customer.login')->withError('Please login first to add cart.');
            }
        }
        
        
    }

    // cart_single_delete
    function cart_single_delete($cart_id) {
        Cart::find($cart_id)->delete();
        return back()->withSuccess('Cart single item removed successfully');
    }

    // cart_update
    function cart_update(Request $request) {
        foreach($request->quantity as $cart_id => $quantity) {
            Cart::find($cart_id)->update([
                'quantity' => $quantity,
            ]);
        }
        return back()->withSuccess('Cart updated successfully');
    }

    // cart_add_single
    function cart_add_single($product_id) {
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
                Cart::insert([
                    'customer_id' => Auth::guard('customerauth')->id(),
                    'product_id' => $product_id,
                    'color_id' => $color_id,
                    'size_id' => $size_id,
                    'quantity' => $quantity,
                    'created_at' => Carbon::now(),
                ]);
                return back()->withSuccess('Cart added successfully');
            } else {
                return back()->withError('Product has color and size');
            }
        } else {
            return redirect()->route('customer.login')->withError('Please login first to add cart.');
        }
    }

    // product_add
    function product_add(Request $request) {
        if($request->abcd == 1) {
            if(Auth::guard('customerauth')->check()) {
                if($request->color_id == null) {
                    $color_id = 1;
                } else {
                    $color_id = $request->color_id;
                }
                if($request->size_id == null) {
                    $size_id = 1;
                } else {
                    $size_id = $request->size_id;
                }
        
                if(Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->exists()) {
                    if(($request->quantity) > (Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity)) {
                        return back()->withError('Total Stock ' . Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity);
                    } else {
                        Cart::insert([
                            'customer_id' => Auth::guard('customerauth')->id(),
                            'product_id' => $request->product_id,
                            'color_id' => $color_id,
                            'size_id' => $size_id,
                            'quantity' => $request->quantity,
                            'created_at' => Carbon::now(),
                        ]);
                        return back()->withSuccess('Cart added successfully');
                    }
                } else {
                    return back()->withError('Product has color and size');
                }
            
            } else {
                return redirect()->route('customer.login')->withError('Please login first to add cart.');
            }
        } else {
            if(Auth::guard('customerauth')->check()) {
                if($request->color_id == null) {
                    $color_id = 1;
                } else {
                    $color_id = $request->color_id;
                }
                if($request->size_id == null) {
                    $size_id = 1;
                } else {
                    $size_id = $request->size_id;
                }
        
                if(Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->exists()) {
                    if(($request->quantity) > (Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity)) {
                        return back()->withError('Total Stock ' . Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity);
                    } else {
                        Wishlist::insert([
                            'customer_id' => Auth::guard('customerauth')->id(),
                            'product_id' => $request->product_id,
                            'color_id' => $color_id,
                            'size_id' => $size_id,
                            'quantity' => $request->quantity,
                            'created_at' => Carbon::now(),
                        ]);
                        return back()->withSuccess('Wishlist added successfully');
                    }
                } else {
                    return back()->withError('Product has color and size');
                }
            
            } else {
                return redirect()->route('customer.login')->withError('Please login first to add wishlist.');
            }
        }
        
    }
}
