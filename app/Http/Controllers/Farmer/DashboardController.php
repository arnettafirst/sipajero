<?php

namespace App\Http\Controllers\Farmer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('farmer.dashboard.index');
    }
}
