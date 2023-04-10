<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $thisWeek = Carbon::today()->subDays(7);
        // $users = App\Models\User::where('created_at','>=',$date)->get();
        // dd($users);

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();

        $thisweekorder = Order::whereDate('created_at','>=',$thisWeek)->count();

        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();

        $totalUser = User::count();
        $todayUser = User::whereDate('created_at', $todayDate)->count();
        $thisMonthUser = User::whereMonth('created_at', $thisMonth)->count();
        $thisYearUser = User::whereYear('created_at', $thisYear)->count();
        return view('home', [
            'totalOrder' => $totalOrder,
            'todayOrder' => $todayOrder,
            'thisweekorder' => $thisweekorder,
            'thisMonthOrder' => $thisMonthOrder,
            'thisYearOrder' => $thisYearOrder,
            'totalUser' => $totalUser,
            'todayUser' => $todayUser,
            'thisMonthUser' => $thisMonthUser,
            'thisYearUser' => $thisYearUser,
        ]);
    }
}
