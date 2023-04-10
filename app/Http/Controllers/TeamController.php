<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Image;


class TeamController extends Controller
{
    //team
    function team() {
        return view('backend.team.team');
    }
    // team_store
    function team_store(Request $request) {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|image'
        ]);
        $team_id = Team::insertGetId([
            'name' => $request->name,
            'position' => $request->position,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        // Preview one
        $uploaded_file_one = $request->image;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'Team'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(600, 600)->save(public_path('uploads/team/'.$file_name_one));
        Team::find($team_id)->update([
            'image' => $file_name_one
        ]);

        return back()->withSuccess('Team addede successfully');
    }

    // Team list
    function team_list() {
        $teams = Team::all();
        return view('backend.team.team_list', [
            'teams' => $teams
        ]);
    }

    // Team delete
    function team_delete($team_id) {
        $team_image = team::where('id', $team_id)->first()->image;
        $delete_from = public_path('uploads/team/'.$team_image);
        unlink($delete_from);
        team::find($team_id)->delete();
        return back()->withSuccess('team single item deleted successfully');
    }

    // Team edit
    function team_edit($team_id) {
        $team = Team::find($team_id);
        return view('backend.team.team_edit', [
            'team' => $team,
        ]);
    }

    // Team update 
    function team_update(Request $request) {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
        ]);
        if($request->image == null) {
            Team::find($request->team_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
            ]);
            return back()->withSuccess('team updated successfully!');
        } else{
            $team_img_del = team::where('id', $request->team_id)->first()->image;
            $delete_from = public_path('uploads/team/'.$team_img_del);
            unlink($delete_from);
            $team_image = $request->image;
            $extension = $team_image->getClientOriginalExtension();
            $file_name = 'Team'.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($team_image)->resize(600, 600)->save(public_path('uploads/team/'.$file_name));
            Team::find($request->team_id)->update([
                'image' => $file_name,
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
            ]);  
            return back()->withSuccess('team updated successfully!');
        }
    }
}
