<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class KepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.kepalasekolah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kepalasekolah.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        kepalasekolah::create(array_merge($request->all(),['kd_kepsek'=>AutoCode::code('KPL')]));
        return redirect()->route('kepalasekolah.index')->with(['message'=>'Tambah data kepalasekolah berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kepalasekolah  $kepalasekolah
     * @return \Illuminate\Http\Response
     */
    public function show(kepalasekolah $kepalasekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kepalasekolah  $kepalasekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(kepalasekolah $kepalasekolah)
    {
        return view('pages.kepalasekolah.form',[
            'id'=>$kepalasekolah->kd_kepsek,
            'kepalasekolah'=>$kepalasekolah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kepalasekolah  $kepalasekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kepalasekolah $kepalasekolah)
    {
        $kepalasekolah->update($request->all());
        return redirect()->route('kepalasekolah.index')->with(['message'=>'Ubah data kepalasekolah berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kepalasekolah  $kepalasekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(kepalasekolah $kepalasekolah)
    {
        $kepalasekolah->delete();
        return redirect()->route('kepalasekolah.index')->with(['message'=>'Hapus data kepalasekolah berhasil']);
    }
}
