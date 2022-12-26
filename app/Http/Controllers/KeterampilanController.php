<?php

namespace App\Http\Controllers;

use App\Models\Keterampilan;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class KeterampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.keterampilan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siswa = Siswa::where('tingkat',$request->tingkat)->get();
        $tingkat = $request->tingkat;
        $mapel = $request->mapel;
        $ajaran = Ajaran::all();
        return view('pages.keterampilan.form',compact('siswa','tingkat','mapel','ajaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proses = $request->proses;
        $produk = $request->produk;
        $proyek = $request->proyek;
        $siswa = $request->kd_siswa;
        $deskripsi_k = $request->deskripsi_k;
        $guru = Guru::where('nip',auth()->user()->username)->first();
        for ($i=0; $i < count($siswa); $i++) {
            Keterampilan::create([
                'kd_mapel'=>$request->kd_mapel,
                'tingkat'=>$request->tingkat,
                'semester'=>$request->semester,
                'kd_tahun'=>$request->kd_tahun,
                'kd_siswa'=>$siswa[$i],
                'produk'=>$produk[$i],
                'proyek'=>$proyek[$i],
                'proses'=>$proses[$i],
                'deskripsi_k'=>$deskripsi_k[$i],
                'kd_guru'=>$guru->kd_guru,
                'kd_nk'=>AutoCode::code('NK')
            ]);
        }

        return redirect()->route('keterampilan.mapel')->with(['message'=>'Data nilai keterampilan berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function show(Keterampilan $keterampilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keterampilan $keterampilan)
    {
        $ajaran = Ajaran::all();
        return view('pages.keterampilan.edit', compact('keterampilan','ajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keterampilan $keterampilan)
    {
        $keterampilan->update($request->all());
        return redirect()->route('keterampilan.mapel')->with(['message'=>'Ubah nilai keterampilan berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keterampilan $keterampilan)
    {
        $keterampilan->delete();
        return redirect()->route('keterampilan.mapel')->with(['message'=>'Hapus nilai keterampilan berhasil']);
    }








    public function mapel()
    {
        $guru = Guru::with('gurumapel.mapel')->where('nip',auth()->user()->username)->first();
        return view('pages.keterampilan.mapel',compact('guru'));
    }
}
