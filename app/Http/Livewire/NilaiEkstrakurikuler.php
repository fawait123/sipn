<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ajaran;
use App\Models\Wali;
use App\Models\Siswa;
use App\Models\Ekskul;

class NilaiEkstrakurikuler extends Component
{
    public function render()
    {
        $ekskul = Ekskul::all();
        $ajaran = Ajaran::all();
        $wali = Wali::where('nip',auth()->user()->kode)->first();
        $siswa = Siswa::where('kd_prodi',$wali->kd_prodi)->where('tingkat',$wali->tingkat)->where('kelas',$wali->kelas)->get();
        $tingkat = $wali->tingkat;
        $kd_wali = $wali->kd_wali;
        $kelas = $wali->kelas;
        return view('livewire.nilai-ekstrakurikuler',compact('ajaran','siswa','tingkat','kd_wali','kelas','ekskul'));
    }
}
