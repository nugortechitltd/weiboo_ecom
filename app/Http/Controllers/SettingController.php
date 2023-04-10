<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Favicon;
use App\Models\Metadesc;
use App\Models\Metakeyword;
use App\Models\Sitename;
use App\Models\Social;
use App\Models\Touch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    //setting
    function setting() {
        $aboutus = Aboutus::all();
        $touch = Touch::all();
        $social = Social::all();
        $site = Sitename::all();
        return view('backend.setting.setting', compact('aboutus', 'touch', 'social', 'site'));
    }

    // site_store
    function site_store(Request $request) {
        $request->validate([
            'location' => 'required',
            'about' => 'required',
            'logo' => 'required|image',
        ]);
        $site_id = Aboutus::insertGetId([
            'about' => $request->about,
            'location' => $request->location,
            'created_at' => Carbon::now(),
        ]);

        $uploaded_file_one = $request->logo;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'Logo'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(200, 33)->save(public_path('uploads/logo/'.$file_name_one));
        Aboutus::find($site_id)->update([
            'logo' => $file_name_one
        ]);

        return back()->withSuccess('Successfully added.');
    }

    // About us delete
    function aboutus_delete($about_id) {
        $site_image = Aboutus::where('id', $about_id)->first()->logo;
        $delete_from = public_path('uploads/logo/'.$site_image);
        unlink($delete_from);
        Aboutus::find($about_id)->delete();
        return back()->withSuccess('Site details deleted successfully');
    }

    // Get in touch
    function touch(Request $request) {
        $request->validate([
            'location' => 'required',
            'phone1' => 'required',
            'hours1' => 'required',
            'email' => 'required',
            'web' => 'required',
        ], [
            'phone1' => 'The phone field is required.',
            'hours1' => 'The Work Hours field is required.',
        ]);
        Touch::insert([
            'location' => $request->location,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'hours1' => $request->hours1,
            'hours2' => $request->hours2,
            'email' => $request->email,
            'web' => $request->web,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Added successfully ');
    }

    // Touch delete
    function touch_delete($touch_id) {
        Touch::find($touch_id)->delete();
        return back()->withSuccess('Deleted successfully');
    }

    // Social
    function follow(Request $request) {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);
        Social::insert([
            'name' => $request->name,
            'icon' => $request->icon,
            'url' => $request->url,
        ]);
        return back()->withSuccess('Added successfully');
    }

    // Social delete
    function social_delete($social_id) {
        Social::find($social_id)->delete();
        return back()->withSuccess('Deleted successfully');
    }

    // favicon
    function favicon() {
        $favicon= Favicon::all();
        return view('backend.favicon.favicon', compact('favicon'));
    }

    // favicon store
    function favicon_store(Request $request) {
        $uploaded_file_one = $request->favicon;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'favicon'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(32, 32)->save(public_path('uploads/favicon/'.$file_name_one));
        Favicon::insert([
            'favicon' => $file_name_one,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Favicon added successfully');
    }

    // favicon_delete
    function favicon_delete($favicon_id) {
        $favicon_image = Favicon::where('id', $favicon_id)->first()->favicon;
        $delete_from = public_path('uploads/favicon/'.$favicon_image);
        unlink($delete_from);
        Favicon::find($favicon_id)->delete();
        return back()->withSuccess('favicon item deleted successfully');
    }

    // web meta details
    function webdetails() {
        $metas = Metadesc::all();
        $keywords = Metakeyword::all();
        return view('backend.web_details.web_details', [
            'metas' => $metas,
            'keywords' => $keywords,
        ]);
    }

    // meta_desc_store
    function meta_desc_store(Request $request) {
        $request->validate([
            'desc' => 'required',
        ]);

        Metadesc::insert([
            'desc' => $request->desc,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Meta description added successfully');
    }

    // meta description delete
    function meta_desc_delete($meta_id) {
        Metadesc::find($meta_id)->delete();
        return back()->withSuccess('Meta description deleted successfully');
    }
    // keywords_store
    function keywords_store(Request $request) {
        $request->validate([
            'content' => 'required',
        ]);
        Metakeyword::insert([
            'content' => $request->content,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Meta keywords added successfully');
    }
    // meta keyword delete
    function meta_keyword_delete($meta_id) {
        Metakeyword::find($meta_id)->delete();
        return back()->withSuccess('Meta keyword deleted successfully');
    }

    // site_name_store
    function site_name_store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        Sitename::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Site name added successfully');
    }

    // site name delete
    function site_name_delete($site_id) {
        Sitename::find($site_id)->delete();
        return back()->withSuccess('Site name deleted successfully');
    }
}
