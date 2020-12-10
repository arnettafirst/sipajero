<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmers = User::where('role', 'farmer')->orderBy('firstname', 'ASC')->paginate(10);

        return view('admin.farmer.index', compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'photo'     => 'required|image|mimes:png,jpeg,jpg',
            'firstname' => 'required|string',
            'lastname'  => 'nullable|string',
            'username'  => 'required|string',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/photo/' . $filename, file_get_contents($file));
        }

        User::create([
            'photo'         => $filename,
            'role'          => 2,
            'firstname'     => $request->firstname,
            'lastname'      => $request->lastname,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => $request->password,
            'old_password'  => $request->password
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $farmer = User::where('role', 'farmer')->findOrFail($id);

        return view('admin.farmer.show', compact('farmer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'photo'     => 'nullable|image|mimes:png,jpeg,jpg',
            'firstname' => 'required|string',
            'lastname'  => 'nullable|string',
            'username'  => 'required|string',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8'
        ]);

        if ($request->hasFile('photo')) {
            $farmer = User::where('role', 'farmer')->findOrFail($id);
            Storage::disk('local')->delete('public/photo/' . $farmer->photo);
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/photo/' . $filename, file_get_contents($file));
        }

        $farmer->update([
            'photo'         => $filename,
            'role'          => 2,
            'firstname'     => $request->firstname,
            'lastname'      => $request->lastname,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'old_password'  => $request->password
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmer = User::where('role', 'farmer')->findOrFail($id);
        Storage::disk('local')->delete('public/photo/' . $farmer->photo);
        $farmer->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus']);
    }
}
