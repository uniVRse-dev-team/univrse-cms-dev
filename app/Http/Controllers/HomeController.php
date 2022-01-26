<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        return view('home');
    }

    public function dashboard() {
        $count_user = DB::table('users')->count();
        $count_spo = DB::table('sponsors')->count();
        $count_exh = DB::table('exhibitors')->count();
        $count_sch = DB::table('schedules')->count();

        return view('dashboard', compact('count_user','count_spo','count_exh','count_sch'));
    }
}
