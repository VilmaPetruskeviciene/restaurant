<?php

namespace App\Http\Controllers;

use App\Models\Patiekalas;
use App\Models\Restoranas;
use Illuminate\Http\Request;


class PatiekalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patiekalas.index', [
            'patiekalas' => Patiekalas::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patiekalas.create', [
            'restoranas' => Restoranas::orderBy('updated_at', 'desc')->get()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Patiekalas::create([
            'title' => $request->title,
            'price' => $request->price,
            'restoranas_id' => $request->restoranas_id,
        ])->addImages($request->file('photo'));
        return redirect()->route('p_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patiekalas  $patiekalas
     * @return \Illuminate\Http\Response
     */
    public function show(Patiekalas $patiekalas)
    {
        return view('patiekalas.show', [
            'patiekalas' => $patiekalas
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patiekalas  $patiekalas
     * @return \Illuminate\Http\Response
     */
    public function edit(Patiekalas $patiekalas)
    {
        return view('patiekalas.edit', [
            'patiekalas' => $patiekalas,
            'restoranas' => Restoranas::orderBy('updated_at', 'desc')->get()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patiekalas  $patiekalas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patiekalas $patiekalas)
    {
        $patiekalas->update([
            'title' => $request->title,
            'price' => $request->price,
            'restoranas_id' => $request->restoranas_id,
        ]);
        $patiekalas
        ->removeImages($request->delete_photo)
        ->addImages($request->file('photo'));
        return redirect()->route('p_index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patiekalas  $patiekalas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patiekalas $patiekalas)
    {
        if ($patiekalas->getPhotos()->count()) {
            $delIds = $patiekalas->getPhotos()->pluck('id')->all();
            $patiekalas->removeImages($delIds);
        }
        $patiekalas->delete();
        return redirect()->route('p_index');

    }
}
