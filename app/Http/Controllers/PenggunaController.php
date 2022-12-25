<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Helpers\AutoCode;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pengguna.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        pengguna::create(array_merge($request->all(),['kd_pengguna'=>AutoCode::code('PGN'),'password'=>md5($request->password)]));
        return redirect()->route('pengguna.index')->with(['message'=>'Tambah data pengguna berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(pengguna $pengguna)
    {
        return view('pages.pengguna.form',[
            'id'=>$pengguna->kd_pengguna,
            'pengguna'=>$pengguna
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengguna $pengguna)
    {
        $password = $request->new_password != null ? md5($request->new_password) : $request->password;
        $pengguna->update(array_merge($request->all(),['password' => $password]));
        return redirect()->route('pengguna.index')->with(['message'=>'Ubah data pengguna berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with(['message'=>'Hapus data pengguna berhasil']);
    }
}
