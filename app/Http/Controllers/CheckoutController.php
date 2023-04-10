<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Charge;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //checkout
    function checkout() {
        $carts = Cart::where('customer_id', Auth::guard('customerauth')->id())->get();
        $payments = Payment::latest()->take(1);
        $charge_details = Charge::latest()->take(1)->get();
        return view('frontend.checkout.checkout', [
            'cart' => $carts,
            'payments' => $payments,
            'charge_details' => $charge_details,
            
        ]);
    }
}
