<?php

namespace App\Http\Controllers;

use App\Models\Restoranas;
use Illuminate\Http\Request;
use App\Models\Patiekalas;

class RestoranasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restoranas.index', [
            'restoranas' => Restoranas::orderBy('updated_at', 'desc')->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restoranas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Restoranas::create([
            'title' => $request->title,
            'town' => $request->town,
            'address' => $request->address,
            'work_time' => $request->work_time,
        ]);
        return redirect()->route('r_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restoranas  $restoranas
     * @return \Illuminate\Http\Response
     */
    public function show(Restoranas $restoranas)
    {
        return view('restoranas.show', [
            'restoranas' => $restoranas
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restoranas  $restoranas
     * @return \Illuminate\Http\Response
     */
    public function edit(Restoranas $restoranas)
    {
        return view('restoranas.edit', [
            'restoranas' => $restoranas
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restoranas  $restoranas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restoranas $restoranas)
    {
        $restoranas->update([
            'title' => $request->title,
            'town' => $request->town,
            'address' => $request->address,
            'work_time' => $request->work_time
            ]);
        return redirect()->route('r_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restoranas  $restoranas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restoranas $restoranas)
    {
        if ($restoranas->patiekalai()->count()) {
            return 'Negalima.';
        }

        $restoranas->delete();
        return redirect()->route('r_index');
    }
}
