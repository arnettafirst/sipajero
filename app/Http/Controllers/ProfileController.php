<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return view('profile');
        } else {
            return abort(404);
        }
    }

    public function update(Request $request)
    {

    }
}
