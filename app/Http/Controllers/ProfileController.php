<?php

namespace App\Http\Controllers;

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
        $this->validate($request, [
            'photo'     => 'required|image|mimes:png,jpeg,jpg',
            'firstname' => 'required|string|alpha|max:46',
            'lastname'  => 'nullable|string|alpha|max:46',
            'username'  => 'required|string|max:64|unique:users,id',
            'email'     => 'required|string|email|max:255|unique:users,id',
            'password'  => 'required|string|min:8'
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('local')->delete('public/photo/' . Auth::user()->photo);
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/photo/' . $filename, file_get_contents($file));
        }

        Auth::user()->update([
            'photo'         => $filename,
            'firstname'     => $request->firstname,
            'lastname'      => $request->lastname,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => $request->password,
            'old_password'  => $request->password
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
}
