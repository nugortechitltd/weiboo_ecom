<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Billingdetails;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Orderproduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
    // order
    function order() {
        $orders = Order::all();
        return view('backend.order.order', [
            'orders' => $orders,
        ]);
    }
    // Order status
     function order_status(Request $request) {
        $after_explode = explode(',', $request->status);
        $order_id = $after_explode[0];
        $status = $after_explode[1];
        Order::where('order_id', $order_id)->update([
            'status' => $status,
        ]);
        return back()->withSuccess('Order status updated Successfully');
     }
    //order store
    function order_store(Request $request) {
        if($request->payment_method == 1) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
            $order_id = '#'.'ORDER'.'-'.rand(10000, 99999);
            Order::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customerauth')->id(),
                'subtotal' => $request->subtotal,
                'discount' => $request->discount,
                'charge' => $request->charge,
                'total' => $request->subtotal + $request->charge,
                'payment_method' => $request->payment_method,
                'created_at' => Carbon::now(),
            ]);
    
            Billingdetails::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customerauth')->id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]);
    
            $carts = Cart::where('customer_id', Auth::guard('customerauth')->id())->get();
    
            foreach($carts as $cart) {
                Orderproduct::insert([
                    'order_id' => $order_id,
                    'customer_id' => Auth::guard('customerauth')->id(),
                    'product_id' => $cart->product_id,
                    'price' => $cart->rel_to_product->after_discount,
                    'color_id' => $cart->color_id,
                    'size_id' => $cart->size_id,
                    'quantity' => $cart->quantity,
                    'created_at' => Carbon::now(),
                ]);
                Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);
            }
    
            Cart::where('customer_id', Auth::guard('customerauth')->id())->delete();
    
            // Invoice mail
            Mail::to($request->email)->send(new InvoiceMail($order_id));
    
            // sms
            $apikey = "API_Key_Here";
            $clientid = $request->name; //client name
            $senderid = "SenderID_Here"; //username
            $senderid = urlencode($senderid);
            $message = "Congratulations! you order has been successfully placed. Please ready Tk: ".$request->subtotal + $request->charge;;
            $message  = urlencode($message);
            $mobilenumbers = $request->phone; //8801700000000 or 8801700000000,9100000000
            $url = "https://api.smsq.global/api/v2/SendSMS?ApiKey=$apikey&ClientId=$clientid&SenderId=$senderid&Message=$message&MobileNumbers=$mobilenumbers";
            // $data = [
            //     "apikey" => $apikey,
            //     "senderid" => $senderid,
            //     "number" => $mobilenumbers,
            //     "message" => $message
            // ];
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            echo $response;
    
            return redirect()->route('order.success')->withSuccess("Order delivered successfully")->withOrder($order_id);
        }
        elseif($request->payment_method == 2) {
            $request->validate([
                'bkashtran_number'=> 'required',
                'bkashtran_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ], [
                'bkashtran_number.required' => 'bkash transaction field is required.',
                'bkashtran_id.required' => 'bkash transaction ID field is required.',
            ]);
            $order_id = '#'.'ORDER'.'-'.rand(10000, 99999);
            Order::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customerauth')->id(),
                'subtotal' => $request->subtotal,
                'discount' => $request->discount,
                'charge' => $request->charge,
                'tran_id' => $request->bkashtran_id,
                'tran_number' => $request->bkashtran_number,
                'total' => $request->subtotal + $request->charge,
                'payment_method' => $request->payment_method,
                'created_at' => Carbon::now(),
            ]);
    
            Billingdetails::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customerauth')->id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'tran_id' => $request->tran_id,
                'tran_number' => $request->tran_number,
                'address' => $request->address,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]);
    
            $carts = Cart::where('customer_id', Auth::guard('customerauth')->id())->get();
    
            foreach($carts as $cart) {
                Orderproduct::insert([
                    'order_id' => $order_id,
                    'customer_id' => Auth::guard('customerauth')->id(),
                    'product_id' => $cart->product_id,
                    'tran_id' => $request->tran_id,
                    'tran_number' => $request->tran_number,
                    'price' => $cart->rel_to_product->after_discount,
                    'color_id' => $cart->color_id,
                    'size_id' => $cart->size_id,
                    'quantity' => $cart->quantity,
                ]);
                Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);
            }
    
            Cart::where('customer_id', Auth::guard('customerauth')->id())->delete();
    
            // Invoice mail
            Mail::to($request->email)->send(new InvoiceMail($order_id));
    
            // sms
            $apikey = "API_Key_Here";
            $clientid = $request->name; //client name
            $senderid = "SenderID_Here"; //username
            $senderid = urlencode($senderid);
            $message = "Congratulations! you order has been successfully placed. Please ready Tk: ".$request->subtotal + $request->charge;;
            $message  = urlencode($message);
            $mobilenumbers = $request->phone; //8801700000000 or 8801700000000,9100000000
            $url = "https://api.smsq.global/api/v2/SendSMS?ApiKey=$apikey&ClientId=$clientid&SenderId=$senderid&Message=$message&MobileNumbers=$mobilenumbers";
            // $data = [
            //     "apikey" => $apikey,
            //     "senderid" => $senderid,
            //     "number" => $mobilenumbers,
            //     "message" => $message
            // ];
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            echo $response;
    
            return redirect()->route('order.success')->withSuccess("Order delivered successfully")->withOrder($order_id);
        } 
        else {
            $request->validate([
                'tran_number'=> 'required',
                'tran_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ], [
                'tran_number.required' => 'Rocket transaction field is required.',
                'tran_id.required' => 'Rocket transaction ID field is required.',
            ]);

            $order_id = '#'.'ORDER'.'-'.rand(10000, 99999);
            Order::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customerauth')->id(),
                'subtotal' => $request->subtotal,
                'discount' => $request->discount,
                'charge' => $request->charge,
                'tran_id' => $request->tran_id,
                'tran_number' => $request->tran_number,
                'total' => $request->subtotal + $request->charge,
                'payment_method' => $request->payment_method,
                'created_at' => Carbon::now(),
            ]);
    
            Billingdetails::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customerauth')->id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'tran_id' => $request->tran_id,
                'tran_number' => $request->tran_number,
                'address' => $request->address,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]);
    
            $carts = Cart::where('customer_id', Auth::guard('customerauth')->id())->get();
    
            foreach($carts as $cart) {
                Orderproduct::insert([
                    'order_id' => $order_id,
                    'customer_id' => Auth::guard('customerauth')->id(),
                    'product_id' => $cart->product_id,
                    'tran_id' => $request->tran_id,
                    'tran_number' => $request->tran_number,
                    'price' => $cart->rel_to_product->after_discount,
                    'color_id' => $cart->color_id,
                    'size_id' => $cart->size_id,
                    'quantity' => $cart->quantity,
                ]);
                Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);
            }
    
            Cart::where('customer_id', Auth::guard('customerauth')->id())->delete();
    
            // Invoice mail
            Mail::to($request->email)->send(new InvoiceMail($order_id));
    
            // sms
            $apikey = "API_Key_Here";
            $clientid = $request->name; //client name
            $senderid = "SenderID_Here"; //username
            $senderid = urlencode($senderid);
            $message = "Congratulations! you order has been successfully placed. Please ready Tk: ".$request->subtotal + $request->charge;;
            $message  = urlencode($message);
            $mobilenumbers = $request->phone; //8801700000000 or 8801700000000,9100000000
            $url = "https://api.smsq.global/api/v2/SendSMS?ApiKey=$apikey&ClientId=$clientid&SenderId=$senderid&Message=$message&MobileNumbers=$mobilenumbers";
            // $data = [
            //     "apikey" => $apikey,
            //     "senderid" => $senderid,
            //     "number" => $mobilenumbers,
            //     "message" => $message
            // ];
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            echo $response;
    
            return redirect()->route('order.success')->withSuccess("Order delivered successfully")->withOrder($order_id);
        }
    }
    // ORDER SUCCESS
    function order_success() {
        if(session('order')) {
            $order_id = session('order');
            return view('frontend.order.order_success', [
                'order_id' => $order_id,
            ]);
        } else {
            abort('404');
        }
    }
    // INVOICE DOWNLOAD
    function invoice_download($order_id) {
        $order_info = Order::find($order_id);
        $pdf = Pdf::loadView('frontend.invoice.invoice_download', [
            'order_id' => $order_info->order_id,
        ]);
        return $pdf->download('invoice.pdf');
    }
}

            