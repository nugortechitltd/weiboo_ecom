<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //coupon
    function coupon() {
        return view('backend.coupon.coupon');
    }
    // coupon_store
    function coupon_store(Request $request) {
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_type' => $request->coupon_type,
            'coupon_amount' => $request->coupon_amount,
            'validity' => $request->validity,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Cupon added successfully');
    }
    // coupon_list
    function coupon_list() {
        $coupons = Coupon::all();
        return view('backend.coupon.coupon_list', [
            'coupons' => $coupons,
        ]);
    }
    // coupon_delete
    function coupon_delete($coupon_id) {
        Coupon::find($coupon_id)->delete();
        return back()->withSuccess('Coupon single item deleted successfully');
    }

    // offer
    function offer(){
        $coupon = Coupon::all();
        $offers = Offer::all();
        return view('backend.offer.offer', compact('coupon', 'offers'));
    }

    function offer_store(Request $request) {
        $request->validate([
            'price' => 'required',
            'coupon_id' => 'required',
        ], [
            'coupon_id.required' => 'Coupon is required',
        ]);
        $status = 0;
        Offer::insert([
            'price' => $request->price,
            'coupon_id' => $request->coupon_id,
            'status' => $status,
        ]);

        return back()->withSuccess('Offer added successfully');
    }

    // offer_status_change
    function offer_status_change($offer_id) {
        $offer_info = Offer::find($offer_id);
        if($offer_info->status == 1) {
            Offer::find($offer_id)->update([
                'status' => 0,
            ]);
        } else {
            foreach(Offer::all() as $offer) {
                Offer::find($offer->id)->update([
                    'status' => 0,
                ]);
                Offer::find($offer_id)->update([
                    'status' => 1,
                ]);
            }
        }
        return back();
    }

    // offer_delete
    function offer_delete($offer_id) {
        Offer::find($offer_id)->delete();
        return back()->withSuccess('Offer deleted successfully');
    }
}
