<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Feature;
use App\Models\Featurebottom;
use App\Models\Service;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Str;

class AboutController extends Controller
{
    //about
    function about_add() {
        return view('backend.about.about_add');
    }
    function about_store(Request $request) {
        $request->validate([
            'year' => 'required',
            'left_desc' => 'required',
            'right_desc' => 'required',
            'preview_one' => 'required|image',
            'preview_two' => 'required|image',
        ]);
        $about_id = About::insertGetId([
            'year' => $request->year,
            'left_desc' => $request->left_desc,
            'right_desc' => $request->right_desc,
            'created_at' => Carbon::now(),
        ]);

        // Preview one
        $uploaded_file_one = $request->preview_one;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'About'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(705, 500)->save(public_path('uploads/about/'.$file_name_one));
        About::find($about_id)->update([
            'preview_one' => $file_name_one
        ]);
        // Preview two
        $uploaded_file_two = $request->preview_two;
        $extension = $uploaded_file_two->getClientOriginalExtension();
        $file_name_two = 'About'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_two)->resize(705, 500)->save(public_path('uploads/about/'.$file_name_two));
        About::find($about_id)->update([
            'preview_two' => $file_name_two
        ]);

        return back()->withSuccess('About added successfully.');
    }

    // about
    function about() {
        $services = Service::all();
        $about_info = About::latest()->take(1);
        $teams = Team::all();
        $feature_top = Feature::latest()->take(1);
        $feature_bottom = Featurebottom::latest()->take(1);
        return view('frontend.about.about', [
            'about_info' => $about_info,
            'services' => $services,
            'teams' => $teams,
            'feature_top' => $feature_top,
            'feature_bottom' => $feature_bottom,
        ]);
    }
    // about_list
    function about_list() {
        $about_info = About::all();
        return view('backend.about.about_list', [
            'about_info' => $about_info
        ]);
    }

    // about_delete
    function about_delete($about_id) {
        $preview_image_one = About::where('id', $about_id)->get();
        $delete_preview_one = public_path('uploads/about/'. $preview_image_one->first()->preview_one);
        unlink($delete_preview_one);
        if(About::find($about_id)->first()->preview_two != null) {
            $preview_image_two = about::where('id', $about_id)->get();
            $delete_preview_two = public_path('uploads/about/'. $preview_image_two->first()->preview_two);
            unlink($delete_preview_two);
        } 
        about::find($about_id)->delete();
        return back()->withSuccess('about item deleted successfully');
    }
}
