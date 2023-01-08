<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GuruMapel;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;

class NilaiPengetahuan extends Component
{
    public $gurumapel;
    protected $queryString = ['gurumapel'];


    public function render()
    {
        $guru = Guru::where('nip',auth()->user()->kode)->first();
        $mapel = GuruMapel::with('mapel')->where('kd_guru',$guru->kd_guru)->get();
        $ajaran = Ajaran::all();
        $selected = GuruMapel::where('kd_gumap',$this->gurumapel)->first();
        $kd = $this->gurumapel;
        $siswa = Siswa::where('kelas',$selected->kelas ?? null)->where('tingkat',$selected->tingkat ?? null)->get();
        return view('livewire.nilai-pengetahuan',compact('mapel','ajaran','siswa','selected','kd'));
    }
}
