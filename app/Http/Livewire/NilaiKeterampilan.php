<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GuruMapel;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ajaran;

class NilaiKeterampilan extends Component
{
    public $gurumapel = '';
    public $mapel = '';
    protected $queryString = ['gurumapel','mapel'];
    public function render()
    {
        $guru = Guru::where('nip',auth()->user()->kode)->first();
        $mapels = GuruMapel::with('mapel')->where('kd_guru',$guru->kd_guru)->get();
        $ajaran = Ajaran::all();
        $selected = GuruMapel::where('kd_gumap',$this->gurumapel)->first();
        $kd = $this->gurumapel;
        $siswa = Siswa::where('kelas',$selected->kelas ?? null)->where('tingkat',$selected->tingkat ?? null)->get();
        $mapel2 = $this->mapel;
        return view('livewire.nilai-keterampilan',compact('mapels','ajaran','siswa','selected','kd','mapel2'));
    }
}
