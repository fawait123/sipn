<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Mapel;
use  App\Models\Guru;
use  App\Models\Siswa;
use  App\Models\Prodi;
use  App\Models\Ekskul;
use  App\Models\Pengguna;

class HomeController extends Controller
{
    public function index()
    {
        $total_mapel = Mapel::count();
        $mapel_last_update = Mapel::latest()->first();

        $total_guru = guru::count();
        $guru_last_update = guru::latest()->first();

        $total_siswa = siswa::count();
        $siswa_last_update = siswa::latest()->first();

        $total_prodi = prodi::count();
        $prodi_last_update = prodi::latest()->first();

        $total_ekskul = ekskul::count();
        $ekskul_last_update = ekskul::latest()->first();

        $total_pengguna = pengguna::count();
        $pengguna_last_update = pengguna::latest()->first();
        return view('home',compact(
            'total_mapel',
            'mapel_last_update',
            'total_guru',
            'guru_last_update',
            'total_siswa',
            'siswa_last_update',
            'total_prodi',
            'prodi_last_update',
            'total_ekskul',
            'ekskul_last_update',
            'total_pengguna',
            'pengguna_last_update',
        ));
    }
}
