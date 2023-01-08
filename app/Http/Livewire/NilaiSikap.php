<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ajaran;
use App\Models\Wali;
use App\Models\Siswa;

class NilaiSikap extends Component
{
    public function render()
    {
        $ajaran = Ajaran::all();
        $wali = Wali::where('nip',auth()->user()->kode)->first();
        $siswa = Siswa::where('kd_prodi',$wali->kd_prodi)->where('tingkat',$wali->tingkat)->where('kelas',$wali->kelas)->get();
        $tingkat = $wali->tingkat;
        $kd_wali = $wali->kd_wali;
        $kelas = $wali->kelas;
        return view('livewire.nilai-sikap',compact('ajaran','siswa','tingkat','kd_wali','kelas'));
    }
}
