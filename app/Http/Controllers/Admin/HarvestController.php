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
        $harvests = Harvest::orderBy('month', 'ASC')->paginate(10);

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

        if (Harvest::count() >= 3) {
            $data = Harvest::latest()->take(3)->get();
            $forecast = ($data[2]->production * 1 + $data[1]->production * 2 + $data[0]->production * 3) / 6;
        } else {
            $forecast = null;
        }

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

    }
}
