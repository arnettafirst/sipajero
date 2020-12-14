<?php

namespace App\Http\Controllers\Admin;

use App\Discussion;
use App\Http\Controllers\Controller;
use App\Information;
use App\Report;
use App\User;

class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $farmers = User::where('role', 'farmer')->count();
        $informations = Information::count();
        $reports = Report::count();
        $discussions = Discussion::count();

        return view('admin.dashboard.index', compact('farmers', 'informations', 'reports', 'discussions'));
    }
}
