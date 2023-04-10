<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    //profile
    function profile() {
        return view('backend.user.user_profile');
    }

    // profile update
    function profile_update(Request $request) {
        $upload_file = $request->image;
        if($upload_file == null) {
            if($request->password == null) {
                User::find(Auth::id())->update([
                    'name'=> $request->name,
                    'email' => $request->email,
                ]);
                return back()->withSuccess('Profile successfully updated.');
            } else {
                if($request->password == $request->password_confirmation) {
                    User::find(Auth::id())->update([
                        'name'=> $request->name,
                        'password' => bcrypt($request->password),
                        'email' => $request->email,
                    ]);
                    return back()->withSuccess('Profile successfully updated.');
                } else {
                    return back()->withError('Password credentials do not matched.');
                }
            }
            
            
        } else {
            if(Auth::user()->image == null) {
                if($request->password == null) {
                    $ext = $upload_file->getClientOriginalExtension();
                    $file_name = Auth::id().'.'.$ext;
                    Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                    User::find(Auth::id())->update([
                        'name'=> $request->name,
                        'email' => $request->email,
                        'image' => $file_name,
                    ]);
                    return back()->withSuccess('Profile successfully updated without password.');
                } else {
                    if($request->password == $request->password_confirmation) {
                        $ext = $upload_file->getClientOriginalExtension();
                        $file_name = Auth::id().'.'.$ext;
                        Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                        User::find(Auth::id())->update([
                            'name'=> $request->name,
                            'password' => bcrypt($request->password),
                            'email' => $request->email,
                            'image' => $file_name,
                        ]);
                        return back()->withSuccess('Profile successfully updated.');
                    } else {
                        return back()->withError('Password credentials do not match');
                    }
                }
            } else {
                if($request->password == null) {
                    $delete_from = public_path('uploads/users/'.Auth::user()->image);
                    unlink($delete_from);
                    $ext = $upload_file->getClientOriginalExtension();
                    $file_name = Auth::id().'.'.$ext;
                    Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                    User::find(Auth::id())->update([
                        'name'=> $request->name,
                        'email' => $request->email,
                        'image' => $file_name,
                    ]);
                    return back()->withSuccess('Profile successfully updated without password.');
                } else {
                    if($request->password == $request->password_confirmation) {
                        $delete_from = public_path('uploads/users/'.Auth::user()->image);
                        unlink($delete_from);
                        $ext = $upload_file->getClientOriginalExtension();
                        $file_name = Auth::id().'.'.$ext;
                        Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                        User::find(Auth::id())->update([
                            'name'=> $request->name,
                            'password' => bcrypt($request->password),
                            'email' => $request->email,
                            'image' => $file_name,
                        ]);
                        return back()->withSuccess('Profile successfully updated.');
                    } else {
                        return back()->withError('Password credentials do not match');
                    }
                }
            }
        }
        
    }

    // Users
    function user_list() {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('backend.user.user_list', [
            'users' => $users,
        ]);
    }

    // user edit
    function user_edit($user_id) {
        $users = User::find($user_id);
        return view('backend.user.user_update', [
            'user' => $users,
        ]);
    }

    // User update
    function user_update(Request $request) {
        // $users = User::where('id', $request->user_id)->first();
        // print_r($users);
        $upload_file = $request->image;
        print_r($upload_file);
        if($upload_file == null) {
            if($request->password == null) {
                User::where('id', $request->user_id)->update([
                    'name'=> $request->name,
                    'email' => $request->email,
                ]);
                return redirect()->route('user.list')->withSuccess('Profile successfully updated.');
            } else {
                if($request->password == $request->password_confirmation) {
                    User::where('id', $request->user_id)->update([
                        'name'=> $request->name,
                        'password' => bcrypt($request->password),
                        'email' => $request->email,
                    ]);
                    return redirect()->route('user.list')->withSuccess('Profile successfully updated.');
                } else {
                    return back()->withError('Password credentials do not matched.');
                }
            }
            
            
        }  else {
            if(User::where('id', $request->user_id)->first()->image == null) {
                if($request->password == null) {
                    $ext = $upload_file->getClientOriginalExtension();
                    $file_name = $request->user_id.'.'.$ext;
                    Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                    User::where('id', $request->user_id)->update([
                        'name'=> $request->name,
                        'email' => $request->email,
                        'image' => $file_name,
                    ]);
                    return redirect()->route('user.list')->withSuccess('Profile successfully updated without password.');
                } else {
                    if($request->password == $request->password_confirmation) {
                        $ext = $upload_file->getClientOriginalExtension();
                        $file_name = $request->user_id.'.'.$ext;
                        Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                        User::where('id', $request->user_id)->update([
                            'name'=> $request->name,
                            'password' => bcrypt($request->password),
                            'email' => $request->email,
                            'image' => $file_name,
                        ]);
                        return redirect()->route('user.list')->withSuccess('Profile successfully updated.');
                    } else {
                        return back()->withError('Password credentials do not match');
                    }
                }
            } else {
                if($request->password == null) {
                    $delete_from = public_path('uploads/users/'.User::where('id', $request->user_id)->first()->image);
                    unlink($delete_from);
                    $ext = $upload_file->getClientOriginalExtension();
                    $file_name = $request->user_id.'.'.$ext;
                    Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                    User::where('id', $request->user_id)->update([
                        'name'=> $request->name,
                        'email' => $request->email,
                        'image' => $file_name,
                    ]);
                    return redirect()->route('user.list')->withSuccess('Profile successfully updated without password.');
                } else {
                    if($request->password == $request->password_confirmation) {
                        $delete_from = public_path('uploads/users/'.User::where('id', $request->user_id)->first()->image);
                        unlink($delete_from);
                        $ext = $upload_file->getClientOriginalExtension();
                        $file_name = $request->user_id.'.'.$ext;
                        Image::make($upload_file)->save(public_path('uploads/users/'.$file_name));
                        User::where('id', $request->user_id)->update([
                            'name'=> $request->name,
                            'password' => bcrypt($request->password),
                            'email' => $request->email,
                            'image' => $file_name,
                        ]);
                        return redirect()->route('user.list')->withSuccess('Profile successfully updated.');
                    } else {
                        return back()->withError('Password credentials do not match');
                    }
                }
            }
        }
    }
}
