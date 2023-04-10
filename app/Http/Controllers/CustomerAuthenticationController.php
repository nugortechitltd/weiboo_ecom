<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerAuthenticationRequest;
use App\Models\Customerauth;
use App\Models\CustomerEmailVerify;
use App\Models\Order;
use App\Notifications\CustomerEmailVerifyNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Image;

class CustomerAuthenticationController extends Controller
{
    // customer_account
    function customer_account() {
        $orders = Order::where('customer_id', Auth::guard('customerauth')->id())->get();
        return view('frontend.authentication.customer_account', [
            'orders' => $orders,
        ]);
    }
    //customer_register_store
    function customer_register_store(CustomerAuthenticationRequest $request) {
        if ($request->password == $request->password_confirmation) {
            Customerauth::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'created_at' => Carbon::now(),
            ]);
            
            $customer = Customerauth::where('email', $request->email)->firstOrFail();
            $customer_info = CustomerEmailVerify::create([
                'customer_id' => $customer->id,
                'token' => uniqid(),
                'created_at' => Carbon::now(),
            ]);
            Notification::send($customer, new CustomerEmailVerifyNotification($customer_info));
            return back()->withSuccess('We have sent you an email verification link! please check your email');
        } else {
            return back()->withError('Cutomer password credentials do not matched.');
        }
        
    }

    // Customer email verify
    function customer_email_verify($token) {
        $customer = CustomerEmailVerify::where('token', $token)->firstOrFail();
        Customerauth::find($customer->customer_id)->update([
            'email_verified_at' => Carbon::now()->format('Y-m-d'),
        ]);
        $customer->delete();
        return redirect()->route('customer.login')->withSuccess('Your email verified Successfully! Now you can login');
    }

    // customer_login_store
    function customer_login_store(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('customerauth')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            if(Auth::guard('customerauth')->user()->email_verified_at == null) {
                Auth::guard('customerauth')->logout();
                return redirect()->route('customer.login')->withError('Your account is not verified yet. Please check your email and verify your email');
            } else {
                return redirect()->route('site')->withSuccess('Customer logged in succesfully');
            }
        } else {
            return redirect()->route('customer.register')->withError('Please create an account');
        }
        return back();
    }


    // customer_update
    function customer_update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'mimes:png,jpg,webp,jpg|file|max:10000',
        ], [
            'image.max' => 'Image size maximum 10mb',
        ]);
        if($request->password == null) {
            if($request->image == null) {
                Customerauth::find(Auth::guard('customerauth')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country' => $request->country,
                    'address' => $request->address,
                ]);
                return back()->withSuccess('Updated successfully without password or image.');
            } else {
                if(Auth::guard('customerauth')->user()->image != null) {
                    $delete_from = public_path('uploads/customer/'.Auth::guard('customerauth')->user()->image);
                    unlink($delete_from);
                }
                $uploaded_image = $request->image;
                $ext = $uploaded_image->getClientOriginalExtension();
                $file_name = Auth::guard('customerauth')->id().'.'.$ext;
                Image::make($uploaded_image)->resize(300, 200)->save(public_path('uploads/customer/'.$file_name));
                Customerauth::find(Auth::guard('customerauth')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country' => $request->country,
                    'address' => $request->address,
                    'image' => $file_name,
                ]);
                return back()->withSuccess('Updated successfully without password.');
            }
        } else {
           if($request->password == $request->password_confirmation) {
            if($request->image == null) {
                Customerauth::find(Auth::guard('customerauth')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country' => $request->country,
                    'address' => $request->address,
                    'password' => bcrypt($request->password),
                ]);
                return back()->withSuccess('Updated successfully without image');
            } else {
                if(Auth::guard('customerauth')->user()->image != null) {
                    $delete_from = public_path('uploads/customer/'.Auth::guard('customerauth')->user()->image);
                    unlink($delete_from);
                }
                $uploaded_image = $request->image;
                $ext = $uploaded_image->getClientOriginalExtension();
                $file_name = Auth::guard('customerauth')->id().'.'.$ext;
                Image::make($uploaded_image)->resize(300, 200)->save(public_path('uploads/customer/'.$file_name));
                Customerauth::find(Auth::guard('customerauth')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country' => $request->country,
                    'address' => $request->address,
                    'image' => $file_name,
                    'password' => bcrypt($request->password),
                ]);
                return back()->withSuccess('Updated successfully.');
            }
           } else {
            return back()->withError('Passwords do not matched');
           }
        }

    }
}
