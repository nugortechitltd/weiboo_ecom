<?php

namespace App\Http\Controllers;

use App\Models\Customerauth;
use App\Models\CustomerPassReset;
use App\Notifications\CustomerPassResetNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class CustomerPasswordResetController extends Controller
{
    //customer_pass_reset_req
    function customer_pass_reset_req() {
        return view('frontend.authentication.customer_password_reset');
    }

    // customer_pass_reset_send
    function customer_pass_reset_send(Request $request) {
        $request->validate([
            'email' => 'required',
        ]);
        $customer_info = Customerauth::where('email', $request->email)->firstOrFail();
        
        CustomerPassReset::where('customer_id', $customer_info->id)->delete();
        $customer_inserted_info  = CustomerPassReset::create([
            'customer_id' => $customer_info->id,
            'token' => uniqid(),
            'created_at' => Carbon::now(),
        ]);
        Notification::send($customer_info, new CustomerPassResetNotification($customer_inserted_info));
        return back()->withSuccess('We have sent you a password reset link! Please check your email');

    }

    // customer_pass_reset_form
    function customer_pass_reset_form($token) {
        return view('frontend.password_reset.password_reset_form', [
            'token' => $token,
        ]);
    }

    // Password reset set
    function customer_pass_update(Request $request) {
        $request->validate([
            'password' => 'required', 
            'password_confirmation' => 'required',
        ]);
        if($request->password == $request->password_confirmation) {
            $customer = CustomerPassReset::where('token', $request->token)->firstOrFail();
            Customerauth::findOrFail($customer->customer_id)->update([
               'password'  => Hash::make($request->password),
            ]);
            $customer->delete();
            return redirect()->route('customer.login')->withSuccess("Password reset successfully! Now you can login with your new password");
        } else {
            return back()->withError('Sorry, Password credentials do not matched.');
        }
        
    }
}
