<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.prodi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.prodi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        prodi::create(array_merge($request->all(),['kd_prodi'=>AutoCode::code('PRD')]));
        return redirect()->route('prodi.index')->with(['message' =>'Tambah data prodi berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(prodi $prodi)
    {
        $id = $prodi->kd_prodi;
        return view('pages.prodi.form',compact('prodi','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prodi $prodi)
    {
        $prodi->update($request->all());
        return redirect()->route('prodi.index')->with(['message'=>'Ubah data prodi berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with(['message'=>'Hapus data prodi berhasil']);
    }
}
