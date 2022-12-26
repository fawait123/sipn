<?php

namespace App\Http\Controllers;

use App\Models\catatan;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;
use App\Models\Wali;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class CatatanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.catatan.index');
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
        return view('pages.catatan.form',compact('ajaran','siswa'));
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
        catatan::create(array_merge($request->all(),['kd_cat'=>AutoCode::code('PKR'),'kd_wali'=>$wali->kd_wali,'tingkat'=>$wali->tingkat]));
        return redirect()->route('catatan.wali')->with(['message'=>'Data nilai catatan berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(catatan $catatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(catatan $catatan)
    {
        $siswa = $catatan->kd_siswa;
        $ajaran = Ajaran::all();
        $id = $catatan->kd_cat;
        return view('pages.catatan.form', compact('catatan','ajaran','id','siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, catatan $catatan)
    {
        $catatan->update($request->all());
        return redirect()->route('catatan.wali')->with(['message'=>'Ubah nilai catatan berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(catatan $catatan)
    {
        $catatan->delete();
        return redirect()->route('catatan.wali')->with(['message'=>'Hapus nilai catatan berhasil']);
    }


    public function wali()
    {
        $wali = Wali::query();
        if(auth()->user()->akses == 'wali'){
            $wali = $wali->where('nip',auth()->user()->kode);
        }
        $wali = $wali->with('guru');
        $wali = $wali->get();
        return view('pages.catatan.siswa',compact('wali'));
    }
}
