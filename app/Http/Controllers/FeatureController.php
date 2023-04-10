<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Featurebottom;
use App\Models\Footerfeature;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class FeatureController extends Controller
{
    //feature
    function feature() {
        return view('backend.feature.feature');
    }

    // Feature store top
    function feature_store_top(Request $request) {
        $request->validate([
            'title' => 'required',
            'button' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);
        $feature_id = Feature::insertGetId([
            'title' => $request->title,
            'button' => $request->button,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $uploaded_file_one = $request->image;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'feature'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(705, 440)->save(public_path('uploads/feature/'.$file_name_one));
        Feature::find($feature_id)->update([
            'image' => $file_name_one
        ]);

        return back()->withSuccess('Feature top added successfully.');
    }
    // Feature store bottom
    function feature_store_bottom(Request $request) {
        $feature_id = Featurebottom::insertGetId([
            'title' => $request->title,
            'button' => $request->button,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $uploaded_file_one = $request->image;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'feature'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(705, 440)->save(public_path('uploads/feature/'.$file_name_one));
        Featurebottom::find($feature_id)->update([
            'image' => $file_name_one
        ]);

        return back()->withSuccess('Feature bottom added successfully.');
    }

    // feature list
    function feature_list() {
        $feature_top = Feature::all();
        $feature_bottom = Featurebottom::all();
        $feature_footer = Footerfeature::all();
        return view('backend.feature.feature_list', compact('feature_top', 'feature_bottom', 'feature_footer'));
    }

    // feature_top_delete
    function feature_top_delete($feature_id) {
        $feature_image = feature::where('id', $feature_id)->first()->image;
        $delete_from = public_path('uploads/feature/'.$feature_image);
        unlink($delete_from);
        Feature::find($feature_id)->delete();
        return back()->withSuccess('feature item deleted successfully');
    }
    // feature_bottom_delete
    function feature_bottom_delete($feature_id) {
        $feature_image = Featurebottom::where('id', $feature_id)->first()->image;
        $delete_from = public_path('uploads/feature/'.$feature_image);
        unlink($delete_from);
        Featurebottom::find($feature_id)->delete();
        return back()->withSuccess('feature item deleted successfully');
    }


    // Footer feature
    function footer_feature() {
        return view('backend.feature.footer_feature');
    }

    // footer_feature_store
    function footer_feature_store(Request $request) {
        $request->validate([
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'title4' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'description3' => 'required',
            'description4' => 'required',
        ]);

        Footerfeature::insert([
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'title4' => $request->title4,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'description3' => $request->description3,
            'description4' => $request->description4,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Footer feature added successfully');
    }

    // footer_feature_delete
    function footer_feature_delete($feature_id) {
        Footerfeature::find($feature_id)->delete();
        return back()->withSuccess('Footer feature deleted successfully');
    }
}
