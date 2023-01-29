<?php

namespace App\Http\Controllers;

use App\Models\sikap;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;
use App\Models\Wali;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class SikapController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.sikap.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->filled('siswa')){
            $siswa = $request->siswa;
            $ajaran = Ajaran::all();
            return view('pages.sikap.form',compact('ajaran','siswa'));
        }

        return view('pages.sikap.create');
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
        sikap::create(array_merge($request->all(),['kd_nsikap'=>AutoCode::code('PKR'),'kd_wali'=>$wali->kd_wali,'tingkat'=>$siswa->tingkat,'kelas'=>$siswa->kelas]));
        return redirect()->route('sikap.wali')->with(['message'=>'Data nilai sikap berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sikap  $sikap
     * @return \Illuminate\Http\Response
     */
    public function show(sikap $sikap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sikap  $sikap
     * @return \Illuminate\Http\Response
     */
    public function edit(sikap $sikap)
    {
        $siswa = $sikap->kd_siswa;
        $ajaran = Ajaran::all();
        $id = $sikap->kd_nsikap;
        return view('pages.sikap.form', compact('sikap','ajaran','id','siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sikap  $sikap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sikap $sikap)
    {
        $sikap->update($request->all());
        return redirect()->route('sikap.wali')->with(['message'=>'Ubah nilai sikap berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sikap  $sikap
     * @return \Illuminate\Http\Response
     */
    public function destroy(sikap $sikap)
    {
        $sikap->delete();
        return redirect()->route('sikap.wali')->with(['message'=>'Hapus nilai sikap berhasil']);
    }


    public function wali()
    {
        $wali = Wali::query();
        if(auth()->user()->akses == 'wali'){
            $wali = $wali->where('nip',auth()->user()->kode);
        }
        $wali = $wali->with('guru');
        $wali = $wali->get();
        return view('pages.sikap.siswa',compact('wali'));
    }

    public function bulk(Request $request)
    {
        $kd_siswa = $request->kd_siswa;
        $sikap = $request->sikap;

        for($i=0; $i<count($kd_siswa); $i++){
            $siswa = Siswa::find($kd_siswa[$i]);
            sikap::create([
                'kd_nsikap'=>AutoCode::code('PKR'),
                'kd_wali'=>$request->kd_wali,
                'tingkat'=>$siswa->tingkat,
                // 'kelas'=>$request->kelas,
                'semester'=>$request->semester,
                'kd_tahun'=>$request->kd_tahun,
                'kd_siswa'=>$kd_siswa[$i],
                'sikap'=>$sikap[$i],
            ]);
        }

        return redirect()->route('sikap.wali')->with(['message'=>'Tambah nilai sikap berhasil']);
    }
}
