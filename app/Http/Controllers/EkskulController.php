<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use App\Helpers\AutoCode;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ekskul.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ekskul.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ekskul::create(array_merge($request->all(),['kd_ekskul'=>AutoCode::code('EKS')]));
        return redirect()->route('ekskul.index')->with(['message'=>'Tambah data ekskul berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show(ekskul $ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit(ekskul $ekskul)
    {
        return view('pages.ekskul.form',[
            'id'=>$ekskul->kd_ekskul,
            'ekskul'=>$ekskul
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ekskul $ekskul)
    {
        $ekskul->update($request->all());
        return redirect()->route('ekskul.index')->with(['message'=>'Ubah data ekskul berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(ekskul $ekskul)
    {
        $ekskul->delete();
        return redirect()->route('ekskul.index')->with(['message'=>'Hapus data ekskul berhasil']);
    }
}
