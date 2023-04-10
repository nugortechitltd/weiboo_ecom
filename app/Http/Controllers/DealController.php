<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DealController extends Controller
{
    //deal
    function deal() {
        $deals = Deal::all();
        return view('backend.deal.deal', [
            'deals' => $deals,
        ]);
    }

    // deal_store
    function deal_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content1' => 'required',
            'content2' => 'required',
            'description' => 'required',
        ]);
        Deal::insert([
            'title' => $request->title,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Deal added successfully');
    }

    // deal_delete
    function deal_delete($deal_id) {
        Deal::find($deal_id)->delete();
        return back()->withSuccess('Deal deleted successfully');
    }
}
