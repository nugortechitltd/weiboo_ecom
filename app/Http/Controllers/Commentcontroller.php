<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Commentcontroller extends Controller
{
    //comment
    function comment(Request $request) {
        $request->validate([
            'message' => 'required',
        ]);
        Comment::insert([
            'name' => $request->name,
            'user_id' => Auth::guard('customerauth')->id(),
            'email' => $request->email,
            'parent_id' => $request->parent_id,
            'post_id' => $request->post_id,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Comment has been sent');
    }
}
