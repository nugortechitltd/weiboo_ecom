<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //service
    function service() {
        return view('backend.service.service');
    }

    // service_store
    function service_store(Request $request) {
        $request->validate([
            'service_list' => 'required',
        ]);
        Service::insert([
            'service_list' => $request->service_list,
        ]);
        return back()->withSuccess('Service added successfully');
    }

    // service delete
    function service_delete($service_id) {
        Service::find($service_id)->delete();
        return back()->withSuccess('Service deleted successfully');
    }
}
