<?php

namespace App\Http\Controllers\Admin;

use App\Harvest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HarvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harvests = Harvest::orderBy('created_at', 'ASC')->paginate(10);

        return view('admin.harvest.index', compact('harvests'));
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
            'month'     => 'required|date',
            'production'=> 'required|integer'
        ]);

        $forecast = null;

        Harvest::create([
            'month'     => $request->month,
            'production'=> $request->production,
            'forecast'  => $forecast,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $harvest = Harvest::findOrFail($id);

        return view('admin.harvest.edit', compact('harvest'));
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
            'month'     => 'required|date',
            'production'=> 'required|integer'
        ]);

        $harvest = Harvest::findOrFail($id);
        $forecast = null;

        $harvest->update([
            'month'     => $request->month,
            'production'=> $request->production,
            'forecast'  => $forecast,
        ]);

        return redirect()->route('admin.harvest.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $harvest = Harvest::findOrFail($id);
        $harvest->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus']);
    }
}
