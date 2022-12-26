<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;
use App\Models\Wali;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.absen.index');
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
        return view('pages.absen.form',compact('ajaran','siswa'));
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
        absen::create(array_merge($request->all(),['kd_nabsen'=>AutoCode::code('PKR'),'kd_wali'=>$wali->kd_wali,'tingkat'=>$wali->tingkat]));
        return redirect()->route('absen.wali')->with(['message'=>'Data nilai absen berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(absen $absen)
    {
        $siswa = $absen->kd_siswa;
        $ajaran = Ajaran::all();
        $id = $absen->kd_nabsen;
        return view('pages.absen.form', compact('absen','ajaran','id','siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, absen $absen)
    {
        $absen->update($request->all());
        return redirect()->route('absen.wali')->with(['message'=>'Ubah nilai absen berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(absen $absen)
    {
        $absen->delete();
        return redirect()->route('absen.wali')->with(['message'=>'Hapus nilai absen berhasil']);
    }


    public function wali()
    {
        $wali = Wali::query();
        if(auth()->user()->akses == 'wali'){
            $wali = $wali->where('nip',auth()->user()->kode);
        }
        $wali = $wali->with('guru');
        $wali = $wali->get();
        return view('pages.absen.siswa',compact('wali'));
    }
}
