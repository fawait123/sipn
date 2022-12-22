<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.siswa.form',[
            'prodi'=>Prodi::all()
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
        siswa::create(array_merge($request->all(),['kd_siswa'=>AutoCode::code('SW')]));
        return redirect()->route('siswa.index')->with(['message' =>'Tambah data siswa berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        $id = $siswa->kd_siswa;
        $prodi = Prodi::all();
        return view('pages.siswa.form',compact('siswa','id','prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with(['message'=>'Ubah data siswa berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with(['message'=>'Hapus data siswa berhasil']);
    }
}
