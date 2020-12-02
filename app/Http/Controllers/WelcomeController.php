<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Information;

class WelcomeController extends Controller
{
    public function index()
    {
        $informations = Information::orderBy('created_at', 'ASC')->get()->take(3);
        $discussions = Discussion::orderBy('created_at', 'ASC')->get()->take(3);

        return view('welcome', compact('informations', 'discussions'));
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
        $discussions = Discussion::orderBy('updated_at', 'ASC')->paginate(10);

        return view('discussion', compact('discussions'));
    }
}
