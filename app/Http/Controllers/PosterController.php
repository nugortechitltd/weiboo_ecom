<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class PosterController extends Controller
{
    //poster
    function poster() {
        $poster = Poster::all();
        return view('backend.poster.poster', [
            'poster' => $poster,
        ]);
    }

    // poster_store
    function poster_store(Request $request) {
        $request->validate([
            'pretitle1' => 'required',
            'pretitle2' => 'required',
            'pretitle3' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'text' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ]);
        $poster_id = Poster::insertGetId([
            'pretitle1' => $request->pretitle1,
            'pretitle2' => $request->pretitle2,
            'pretitle3' => $request->pretitle3,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'text' => $request->text,
            'created_at' => Carbon::now(),
        ]);
        $uploaded_file_one = $request->image1;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'Poster'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(168, 95)->save(public_path('uploads/poster/'.$file_name_one));
        Poster::find($poster_id)->update([
            'image1' => $file_name_one
        ]);
        $uploaded_file_two = $request->image2;
        $extension = $uploaded_file_two->getClientOriginalExtension();
        $file_name_two = 'Poster'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_two)->resize(450, 442)->save(public_path('uploads/poster/'.$file_name_two));
        Poster::find($poster_id)->update([
            'image2' => $file_name_two
        ]);
        $uploaded_file_three = $request->image3;
        $extension = $uploaded_file_three->getClientOriginalExtension();
        $file_name_three = 'Poster'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_three)->resize(110, 140)->save(public_path('uploads/poster/'.$file_name_three));
        Poster::find($poster_id)->update([
            'image3' => $file_name_three
        ]);

        return back()->withSuccess('Poster added successfully');
    }

    // poster_delete
    function poster_delete($poster_id) {
        $preview_image_one = Poster::where('id', $poster_id)->get();
        $delete_preview_one = public_path('uploads/poster/'. $preview_image_one->first()->image1);
        unlink($delete_preview_one);
        $preview_image_two = Poster::where('id', $poster_id)->get();
        $delete_preview_two = public_path('uploads/poster/'. $preview_image_two->first()->image2);
        unlink($delete_preview_two);
        $preview_image_three = Poster::where('id', $poster_id)->get();
        $delete_preview_three = public_path('uploads/poster/'. $preview_image_three->first()->image3);
        unlink($delete_preview_three);
        Poster::find($poster_id)->delete();
        return back()->withSuccess('Product item deleted successfully');
    }
}
