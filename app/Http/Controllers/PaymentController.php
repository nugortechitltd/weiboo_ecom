<?php

namespace App\Http\Controllers;

use App\Models\Billingdetails;
use App\Models\Charge;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //payment
    function payment() {
        $payment = Payment::all();
        return view('backend.payment.payment', compact('payment'));
    }

    function payment_store(Request $request) {
        $request->validate([
            'bkash' => 'required',
            'rocket' => 'required',
            'type1' => 'required',
            'type2' => 'required',
            'description1' => 'required',
            'description2' => 'required',
        ]);
        Payment::insert([
            'bkash' => $request->bkash,
            'rocket' => $request->rocket,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'type1' => $request->type1,
            'type2' => $request->type2,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Payment details added successfully');
    }

    // payment_delete
    function payment_delete($payment_id) {
        Payment::find($payment_id)->delete();
        return back()->withSuccess('Payment deleted successfully');
    }

    // Transaction list
    function transaction_list() {
        $transaction = Order::all();
        return view('backend.payment.transaction_list', [
            'transaction' => $transaction,
        ]);
    }

    // transaction_delete
    function transaction_delete($payment_id) {
        Order::find($payment_id)->delete();
        return back()->withSuccess('Transaction deleted successfully');
    }

    // Transaction charge ammount
    function transaction_charge() {
        $charges = Charge::all();
        return view('backend.payment.transaction_charge', [
            'charges' => $charges,
        ]);
    }

    // transaction_charge_store
    function transaction_charge_store(Request $request) {
        $request->validate([
            'location1'=> 'required',
            'location2'=> 'required',
            'charge1'=> 'required',
            'charge2'=> 'required',
        ]);
        Charge::insert([
            'location1'=> $request->location1,
            'location2'=> $request->location2,
            'charge1'=> $request->charge1,
            'charge2'=> $request->charge2,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Charge details added successfully');
    }

    // charge_delete
    function charge_delete($charge_id) {
        Charge::find($charge_id)->delete();
        return back()->withSuccess('Charge details deleted successfully');
    }
}
