<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class AjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ajaran.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ajaran::create(array_merge($request->all(),['kd_tahun'=>AutoCode::code('AJR')]));
        return redirect()->route('ajaran.index')->with(['message'=>'Tambah data ajaran berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ajaran  $ajaran
     * @return \Illuminate\Http\Response
     */
    public function show(ajaran $ajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ajaran  $ajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(ajaran $ajaran)
    {
        return view('pages.ajaran.form',[
            'id'=>$ajaran->kd_tahun,
            'ajaran'=>$ajaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ajaran  $ajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ajaran $ajaran)
    {
        $ajaran->update($request->all());
        return redirect()->route('ajaran.index')->with(['message'=>'Ubah data ajaran berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ajaran  $ajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(ajaran $ajaran)
    {
        $ajaran->delete();
        return redirect()->route('ajaran.index')->with(['message'=>'Hapus data ajaran berhasil']);
    }
}
