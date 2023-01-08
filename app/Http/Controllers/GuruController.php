<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\GuruMapel;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.guru.form',[
            'mapel'=>Mapel::all(),
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
        Guru::create(array_merge($request->all(),['kd_guru'=>AutoCode::code('G')]));
        return redirect()->route('guru.index')->with(['message'=>'Tambah data guru berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('pages.guru.form',[
            'mapel'=>Mapel::all(),
            'id'=>$guru->kd_guru,
            'guru'=>$guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $guru->update($request->all());
        return redirect()->route('guru.index')->with(['message'=>'Ubah data guru berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with(['message'=>'Hapus data guru berhasil']);
    }


    public function gurMap($id)
    {
        $guru = Guru::find($id);
        $mapel = Mapel::all();
        if($guru){
            return view('pages.guru.mapel',compact('guru','mapel'));
        }

        return abort(404);
    }


    public function gurMapEdit($id)
    {
        $guru = GuruMapel::find($id);
        $mapel = Mapel::all();
        if($guru){
            return view('pages.guru.mapel',compact('guru','mapel','id'));
        }

        return abort(404);
    }

    public function mapel(Request $request,$id)
    {
        GuruMapel::create(array_merge($request->all(),['kd_gumap'=>AutoCode::code('GRM'),'kd_guru'=>$id]));
        return redirect()->route('guru.index')->with(['message'=>'Berhasil menambahkan data pelajaran']);
    }

    public function mapelUpdate(Request $request,GuruMapel $gurmap)
    {
        $gurmap->update($request->all());
        return redirect()->route('guru.index')->with(['message'=>'Ubah data matapelajaran guru berhasil']);
    }

    public function mapelDelete(GuruMapel $gurmap)
    {
        $gurmap->delete();
        return redirect()->route('guru.index')->with(['message'=>'Hapus data matapelajaran guru berhasil']);
    }
}
