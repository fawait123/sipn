<?php

namespace App\Http\Controllers;

use App\Models\ekstrakurikuler;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;
use App\Models\Wali;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ekstrakurikuler.index');
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
            $ekskul = Ekskul::all();
            return view('pages.ekstrakurikuler.form',compact('ajaran','siswa','ekskul'));
        }

        return view('pages.ekstrakurikuler.create');
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
        ekstrakurikuler::create(array_merge($request->all(),['kd_nekskul'=>AutoCode::code('PKR'),'kd_wali'=>$wali->kd_wali,'tingkat'=>$wali->tingkat]));
        return redirect()->route('ekstrakurikuler.wali')->with(['message'=>'Data nilai ekstrakurikuler berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function show(ekstrakurikuler $ekstrakurikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function edit(ekstrakurikuler $ekstrakurikuler)
    {
        $siswa = $ekstrakurikuler->kd_siswa;
        $ajaran = Ajaran::all();
        $ekskul = Ekskul::all();
        $id = $ekstrakurikuler->kd_nekskul;
        return view('pages.ekstrakurikuler.form', compact('ekstrakurikuler','ajaran','id','siswa','ekskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->update($request->all());
        return redirect()->route('ekstrakurikuler.wali')->with(['message'=>'Ubah nilai ekstrakurikuler berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return redirect()->route('ekstrakurikuler.wali')->with(['message'=>'Hapus nilai ekstrakurikuler berhasil']);
    }


    public function wali()
    {
        $wali = Wali::query();
        if(auth()->user()->akses == 'wali'){
            $wali = $wali->where('nip',auth()->user()->kode);
        }
        $wali = $wali->with('guru');
        $wali = $wali->get();
        return view('pages.ekstrakurikuler.siswa',compact('wali'));
    }

    public function bulk(Request $request)
    {
        $kd_siswa = $request->kd_siswa;
        $predikat = $request->predikat;

        for($i=0; $i<count($kd_siswa); $i++){
            ekstrakurikuler::create([
                'kd_nekskul'=>AutoCode::code('PKR'),
                'kd_wali'=>$request->kd_wali,
                'tingkat'=>$request->tingkat,
                'kelas'=>$request->kelas,
                'semester'=>$request->semester,
                'kd_tahun'=>$request->kd_tahun,
                'kd_ekskul'=>$request->kd_ekskul,
                'kd_siswa'=>$kd_siswa[$i],
                'predikat'=>$predikat[$i],
            ]);
        }

        return redirect()->route('ekstrakurikuler.wali')->with(['message'=>'Tambah nilai ekstrakurikuler berhasil']);
    }
}
