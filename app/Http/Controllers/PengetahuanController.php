<?php

namespace App\Http\Controllers;

use App\Models\pengetahuan;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class PengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pengetahuan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->filled('tingkat') && $request->filled('kelas') && $request->filled('mapel')){
            $siswa = Siswa::where('tingkat',$request->tingkat)->where('kelas',$request->kelas)->get();
            $tingkat = $request->tingkat;
            $mapel = $request->mapel;
            $kelas = $request->kelas;
            $ajaran = Ajaran::all();
            return view('pages.pengetahuan.form',compact('siswa','tingkat','mapel','ajaran','kelas'));
        }
        return view('pages.pengetahuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $harian = $request->harian;
        $uts = $request->uts;
        $uas = $request->uas;
        $siswa = $request->kd_siswa;
        $deskripsi_k = $request->deskripsi_k;
        $guru = Guru::where('nip',auth()->user()->username)->first();
        for ($i=0; $i < count($siswa); $i++) {
            pengetahuan::create([
                'kd_mapel'=>$request->kd_mapel,
                'tingkat'=>$request->tingkat,
                'kelas'=>$request->kelas,
                'semester'=>$request->semester,
                'kd_tahun'=>$request->kd_tahun,
                'kd_siswa'=>$siswa[$i],
                'harian'=>$harian[$i],
                'uts'=>$uts[$i],
                'uas'=>$uas[$i],
                'deskripsi_k'=>$deskripsi_k[$i],
                'kd_guru'=>$guru->kd_guru,
                'kd_np'=>AutoCode::code('NK')
            ]);
        }

        return redirect()->route('pengetahuan.mapel')->with(['message'=>'Data nilai pengetahuan berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengetahuan  $pengetahuan
     * @return \Illuminate\Http\Response
     */
    public function show(pengetahuan $pengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengetahuan  $pengetahuan
     * @return \Illuminate\Http\Response
     */
    public function edit(pengetahuan $pengetahuan)
    {
        $ajaran = Ajaran::all();
        return view('pages.pengetahuan.edit', compact('pengetahuan','ajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengetahuan  $pengetahuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengetahuan $pengetahuan)
    {
        $pengetahuan->update($request->all());
        return redirect()->route('pengetahuan.mapel')->with(['message'=>'Ubah nilai pengetahuan berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengetahuan  $pengetahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengetahuan $pengetahuan)
    {
        $pengetahuan->delete();
        return redirect()->route('pengetahuan.mapel')->with(['message'=>'Hapus nilai pengetahuan berhasil']);
    }








    public function mapel()
    {
        $guru = Guru::query();
        if(auth()->user()->akses == 'guru'){
            $guru = $guru->where('nip',auth()->user()->username);
        }
        $guru = $guru->with('gurumapel.mapel');
        $guru = $guru->get();
        return view('pages.pengetahuan.mapel',compact('guru'));
    }
}
