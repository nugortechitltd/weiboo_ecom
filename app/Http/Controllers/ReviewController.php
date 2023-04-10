<?php

namespace App\Http\Controllers;

use App\Models\Orderproduct;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //Review
    function review() {
        $reviews = Orderproduct::all();
        return view('backend.reviews.review', [
            'reviews' => $reviews,
        ]);
    }

    // review_edit
    function review_edit($review_id) {
        $products = Orderproduct::find($review_id);
        return view('backend.reviews.review_edit', [
            'review' => $products,
        ]);
    }

    // review_udpate
    function review_udpate(Request $request)  {
        // print_r($request->all());
        Orderproduct::where('id', $request->review_id)->update([
            'star' => $request->star,
        ]);
        return back()->withSuccess('Review updated successfully');
    }
}
