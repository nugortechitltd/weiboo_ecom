<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use App\Models\Contact;
use App\Models\Customerauth;
use App\Models\User;
use App\Notifications\ContactNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //contact
    function contact() {
        return view('frontend.contact.contact');
    }

    // contact_store
    function message_send(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        
        $contact_info = Contact::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        
        $emaill = "sarwebdev@gmail.com";
        
        Mail::to($emaill)->send(new MessageMail($contact_info));

        return redirect()->route('contact')->withSuccess('Message has been sent.');
    }

    // messages
    function message() {
        $messages = Contact::latest()->get();
        return view('backend.message.message', [
            'messages' => $messages,
        ]);
    }

    // Message delete 
    function message_delete($message_id) {
        Contact::find($message_id)->delete();
        return back()->withSuccess('Message deleted successfully');
    }
}
