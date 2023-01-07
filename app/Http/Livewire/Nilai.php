<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengetahuan;
use App\Models\Prakerin;
use App\Models\Keterampilan;
use App\Models\Siswa;
use App\Models\Sikap;
use App\Models\Catatan;
use Barryvdh\DomPDF\Facade\Pdf;

class Nilai extends Component
{
    protected $isShow = false;
    protected $semester = 'ganjil';
    public function render()
    {
        $isShow = $this->isShow;
        $siswa = Siswa::with('prodi')->where('nis',auth()->user()->kode)->first();
        $pengetahuan = Pengetahuan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $keterampilan = keterampilan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $prakerin = prakerin::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $sikap = sikap::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $catatan = catatan::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $semester = $this->semester;
        return view('livewire.nilai',compact('isShow','siswa','pengetahuan','keterampilan','prakerin','catatan','semester'));
    }


    public function show($data)
    {
        $this->semester = $data['semester'];
        $this->isShow = true;
    }

    public function download()
    {
        $isShow = $this->isShow;
        $siswa = Siswa::with('prodi')->where('nis',auth()->user()->kode)->first();
        $pengetahuan = Pengetahuan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $keterampilan = keterampilan::with('mapel')->where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $prakerin = prakerin::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $sikap = sikap::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $catatan = catatan::where('kd_siswa',$siswa->kd_siswa)->where('semester',$this->semester)->get();
        $semester = $this->semester;
        $pdf = Pdf::loadView('pages.nilai.download',compact('isShow','siswa','pengetahuan','keterampilan','prakerin','catatan','semester'));
        return $pdf->download('rekap-nilai.pdf');
    }
}
