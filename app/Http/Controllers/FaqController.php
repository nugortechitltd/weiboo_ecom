<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Faqright;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //faq
    function faq_store() {
        return view('backend.faq.faq_store');
    }

    // faq add
    function faq_add(Request $request) {
        $request->validate([
            'faq_title' => 'required',
            'faq_desc' => 'required',
        ], [
            'faq_title.required' => 'The faq question field is required.',
            'faq_desc.required' => 'The faq answer field is required.'
        ]);
        Faq::insert([
            'faq_title' => $request->faq_title,
            'faq_desc' => $request->faq_desc,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Faq added successfully');
    }
    // faq add right
    function faq_add_right(Request $request) {
        $request->validate([
            'faq_title_r' => 'required',
            'faq_desc_r' => 'required',
        ], [
            'faq_title_r.required' => 'The faq question field is required.',
            'faq_desc_r.required' => 'The faq answer field is required.'
        ]);
        Faqright::insert([
            'faq_title_r' => $request->faq_title_r,
            'faq_desc_r' => $request->faq_desc_r,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Faq added successfully');
    }

    // faq
    function faq() {
        $faq_left = Faq::all();
        $faq_right = Faqright::all();
        return view('frontend.faq.faq', [
            'faq_left' => $faq_left,
            'faq_right' => $faq_right,
        ]);
    }
    // faq
    function faq_list() {
        $faq_left = Faq::all();
        $faq_right = Faqright::all();
        return view('backend.faq.faq_list', [
            'faq_left' => $faq_left,
            'faq_right' => $faq_right,
        ]);
    }

    // faq_delete_left
    function faq_delete_left($faq_id) {
        Faq::find($faq_id)->delete();
        return back()->withSuccess('Faq deleted successfully');
    }
    // faq_delete_right
    function faq_delete_right($faq_id) {
        Faqright::find($faq_id)->delete();
        return back()->withSuccess('Faq deleted successfully');
    }
}
