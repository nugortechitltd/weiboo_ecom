<?php

namespace App\Http\Controllers;

use App\Models\Orderproduct;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //review_store
    function review_store(Request $request) {
        Orderproduct::where('customer_id', $request->customer_id)->where('product_id', $request->product_id)->update([
            'review' => $request->review,
            'star' => $request->rate,
        ]);
        return back()->withSuccess('You give '.$request->rate.' star rating');
    }
}
