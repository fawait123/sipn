<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengetahuan;
use App\Models\Prakerin;
use App\Models\Keterampilan;
use App\Models\Siswa;
use App\Models\Sikap;
use App\Models\Catatan;

class NilaiController extends Controller
{
    protected $semester = 'ganjil';
    public function index()
    {
        return view('pages.nilai.index');
    }

    public function download()
    {
        $isShow = true;
        $siswa = Siswa::with('prodi')->where('nis',auth()->user()->kode)->first();
        $pengetahuan = Pengetahuan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $keterampilan = keterampilan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $prakerin = prakerin::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $sikap = sikap::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $catatan = catatan::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $semester = 'genap';
        return view('pages.nilai.download',compact('isShow','siswa','pengetahuan','keterampilan','prakerin','catatan','semester'));
    }
}
