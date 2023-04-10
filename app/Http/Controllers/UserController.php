<?php

namespace App\Http\Controllers;

use App\Models\Passwordreset;
use App\Models\User;
use App\Notifications\PasswordResetNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //forgot_password
    function forgot_password() {
        return view('auth.reset_password');
    }

    // password reset send link to gmail
    function password_reset_send(Request $request) {
        $request->validate([
            'email' => 'required',
        ]);
        $admin_info = User::where('email', $request->email)->firstOrFail();
        Passwordreset::where('admin_id', $admin_info->id)->delete();
        $admin_insert_info = Passwordreset::create([
            'admin_id' => $admin_info->id,
            'token' => uniqid(),
            'created_at' => Carbon::now(),
        ]);
        Notification::send($admin_info, new PasswordResetNotification($admin_insert_info));
        return back()->withSuccess('We have sent you a password reset link! Please check your email');
    }

    // password reset form blade
    function password_reset_form($token) {
        return view('auth.password_reset_form', [
            'token' => $token,
        ]);
    }

    // password_reset_set
    function password_reset_set(Request $request) {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        if($request->password == $request->password_confirmation) {
            $admin = Passwordreset::where('token', $request->token)->firstOrFail();
            User::findOrFail($admin->admin_id)->update([
                'password' => Hash::make($request->password),
            ]);
            $admin->delete();
            return redirect()->route('login')->withSuccess('Password reset successfully.');
        } else {
            return back()->withError('Password credectials do not matched');
        }
        
    }

    // user register
    function user_register() {
        return view('backend.user.user_register');
    }

    // user store
    function user_store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        if($request->password == $request->password_confirmation) {
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'created_at' => Carbon::now()
            ]);
            return back()->withSuccess('Successfully registered');
        } else {
            return back()->withError('Your password credentials do not matched');
        }
        return back();
    }

    //user_single_delete
    function user_single_delete($user_id) {
        if(User::find($user_id)->first()->image != null) {
            $image = User::find($user_id)->first()->image;
            $delete_from = public_path('uploads/users/'.$image);
            unlink($delete_from);
            User::find($user_id)->delete();
        } else {
            User::find($user_id)->delete(); 
        }
        return back()->withSuccess('Successfully deleted');
    }

    // user_single_edit
    function user_single_edit($user_id) {
        $user = User::find($user_id);
        return view('backend.user.user_edit', [
            'user' => $user,
        ]);
    }

    
}
