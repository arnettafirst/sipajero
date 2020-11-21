<?php

namespace App\Http\Controllers\Admin;

use App\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::orderBy('created_at', 'ASC')->paginate(10);

        return view('admin.information.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create');
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
            'thumbnail' => 'required|image|mimes:png,jpeg,jpg',
            'title'     => 'required|string',
            'contents'  => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/thumbnail/' . $filename, file_get_contents($file));
        }

        Information::create([
            'thumbnail' => $filename,
            'title'     => $request->title,
            'slug'      => strtolower($request->title),
            'contents'  => $request->contents,
            'excerpt'   => Str::words(strip_tags(html_entity_decode($request->contents)), 8)
        ]);

        return redirect()->route('information')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $information = Information::where('slug', $slug)->firstOrFail();

        return view('information-detail', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $information = Information::where('slug', $slug)->firstOrFail();

        return view('admin.information.edit', compact('information'));
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
            'thumbnail' => 'required|image|mimes:png,jpeg,jpg',
            'title'     => 'required|string',
            'contents'  => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $information = Information::findOrFail($id);
            Storage::disk('local')->delete('public/thumbnail/' . $information->thumbnail);
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/thumbnail/' . $filename, file_get_contents($file));
        }

        $information->update([
            'thumbnail' => $filename,
            'title'     => $request->title,
            'slug'      => strtolower($request->title),
            'contents'  => $request->contents,
            'excerpt'   => Str::words(strip_tags(html_entity_decode($request->contents)), 8)
        ]);

        return redirect()->route('information.detail', $information->slug)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        Storage::disk('local')->delete('public/thumbnail/' . $information->thumbnail);
        $information->delete();

        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus']);
    }
}
