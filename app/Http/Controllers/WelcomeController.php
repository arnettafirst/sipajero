<?php

namespace App\Http\Controllers;

use App\Information;

class WelcomeController extends Controller
{
    public function index()
    {
        $informations = Information::orderBy('created_at', 'ASC')->get()->take(3);

        return view('welcome', compact('informations'));
    }

    public function information()
    {
        $informations = Information::orderBy('created_at', 'ASC')->paginate(9);

        return view('information', compact('informations'));
    }

    public function informationDetail($slug)
    {
        $information = Information::where('slug', $slug)->firstOrFail();

        return view('information-detail', compact('information'));
    }

    public function discussion()
    {
        return view('discussion');
    }
}
