<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengetahuan;
use App\Models\Prakerin;
use App\Models\Keterampilan;
use App\Models\Siswa;
use App\Models\Ekstrakurikuler;
use App\Models\Absen;
use App\Models\Sikap;
use App\Models\Catatan;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiController extends Controller
{
    protected $semester = 'ganjil';
    public function index()
    {
        return view('pages.nilai.index');
    }

    public function download(Request $request)
    {
        $isShow = true;
        $siswa = Siswa::with('prodi')->where('nis',auth()->user()->kode)->first();
        $pengetahuan = Pengetahuan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$request->semester)->where('tingkat',$request->tingkat)->get();
        $keterampilan = keterampilan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$request->semester)->where('tingkat',$request->tingkat)->get();
        $prakerin = prakerin::where('kd_siswa',$siswa->kd_siswa)->where('semester',$request->semester)->where('tingkat',$request->tingkat)->get();
        $sikap = sikap::with('wali.guru')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$request->semester)->where('tingkat',$request->tingkat)->get();
        $catatan = catatan::with('wali.guru')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$request->semester)->where('tingkat',$request->tingkat)->get();
        $ekskul = Ekstrakurikuler::with('ekskul')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$request->semester)->where('tingkat',$request->tingkat)->get();
        $absen = Absen::with('wali')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$request->semester)->where('tingkat',$request->tingkat)->get();
        $semester = $request->semester;
        $tingkat = $request->tingkat;
        $kelas = $request->kelas;

        $pdf = Pdf::loadView('pages.nilai.download',compact('isShow','siswa','pengetahuan','keterampilan','prakerin','catatan','semester','sikap','ekskul','absen','tingkat','kelas'))->setPaper('letter');
        return $pdf->download('rekap-nilai.pdf');
    }
}
