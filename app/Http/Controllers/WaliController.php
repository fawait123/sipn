<?php

namespace App\Http\Controllers;

use App\Models\Wali;
use App\Models\Guru;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.wali.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.wali.form',[
            'guru'=>Guru::all(),
            'prodi'=>Prodi::all(),
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
        $guru = Guru::find($request->kd_guru);
        wali::create(array_merge($request->all(),['kd_wali'=>AutoCode::code('WL'),'nip'=>$guru->nip,'tgl_lahir'=>$guru->tgl_lahir]));
        return redirect()->route('wali.index')->with(['message' =>'Tambah data wali berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function show(wali $wali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function edit(wali $wali)
    {
        $id = $wali->kd_wali;
        $prodi = Prodi::all();
        $guru = Guru::all();
        return view('pages.wali.form',compact('wali','id','prodi','guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wali $wali)
    {
        $guru = Guru::find($request->kd_guru);
        $wali->update(array_merge($request->all(),['nip'=>$guru->nip,'tgl_lahir'=>$guru->tgl_lahir]));
        return redirect()->route('wali.index')->with(['message'=>'Ubah data wali berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function destroy(wali $wali)
    {
        $wali->delete();
        return redirect()->route('wali.index')->with(['message'=>'Hapus data wali berhasil']);
    }
}
