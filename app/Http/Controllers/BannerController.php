<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    //Banner
    function banner() {
        $banners = Banner::all();
        return view('backend.banner.banner', compact('banners'));
    }
    // banner_store
    function banner_store(Request $request) {
        $request->validate([
            'head' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);
        Banner::insert([
            'head' => $request->head,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        return back()->withSuccess('Banner successfully added.');
    }

    // banner_delete
    function banner_delete($banner_id) {
        Banner::find($banner_id)->delete();
        return back()->withSuccess('Banner deleted successfully.');
    }
}
