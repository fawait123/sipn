<?php

namespace App\Http\Controllers;

use App\Models\Keterampilan;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KeterampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siswa = Siswa::where('tingkat',$request->tingkat)->get();
        dd($siswa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keterampilan $keterampilan)
    {
        //
    }








    public function mapel()
    {
        $guru = Guru::with('gurumapel.mapel')->where('nip',auth()->user()->username)->first();
        return view('pages.keterampilan.mapel',compact('guru'));
    }
}
