<?php

namespace App\Http\Controllers;

use App\Models\prakerin;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;
use App\Models\Wali;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class PrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.prakerin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siswa = $request->siswa;
        $ajaran = Ajaran::all();
        return view('pages.prakerin.form',compact('ajaran','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wali = Wali::where('nip',auth()->user()->kode)->first();
        $siswa = Siswa::where('kd_siswa',$request->kd_siswa)->first();
        Prakerin::create(array_merge($request->all(),['kd_npkl'=>AutoCode::code('PKR'),'kd_wali'=>$wali->kd_wali,'tingkat'=>$wali->tingkat]));
        return redirect()->route('prakerin.wali')->with(['message'=>'Data nilai prakerin berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function show(prakerin $prakerin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function edit(prakerin $prakerin)
    {
        $siswa = $prakerin->kd_siswa;
        $ajaran = Ajaran::all();
        $id = $prakerin->kd_npkl;
        return view('pages.prakerin.form', compact('prakerin','ajaran','id','siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prakerin $prakerin)
    {
        $prakerin->update($request->all());
        return redirect()->route('prakerin.wali')->with(['message'=>'Ubah nilai prakerin berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function destroy(prakerin $prakerin)
    {
        $prakerin->delete();
        return redirect()->route('prakerin.wali')->with(['message'=>'Hapus nilai prakerin berhasil']);
    }


    public function wali()
    {
        $wali = Wali::query();
        if(auth()->user()->akses == 'wali'){
            $wali = $wali->where('nip',auth()->user()->kode);
        }
        $wali = $wali->with('guru');
        $wali = $wali->get();
        return view('pages.prakerin.siswa',compact('wali'));
    }
}
