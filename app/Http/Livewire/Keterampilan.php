<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Keterampilan as KeterampilanModel;
use Livewire\WithPagination;

class Keterampilan extends Component
{
    public $search='';
    public $kd_mapel = '';
    public $tingkat = '';
    public $kelas = '';
    public $perPage = 10;
    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search',
        'kd_mapel',
        'tingkat',
        'kelas'
    ];


    public function render()
    {
        $query = KeterampilanModel::query();
        $query = $query->with(['mapel','siswa','ajaran']);
        $query = $query->where('kd_mapel',$this->kd_mapel)->where('tingkat','like',$this->tingkat)->where('kelas',$this->kelas);
        if($this->search != '')
        {
            $query = $query->whereHas('siswa',function($qr){
                $qr->where('nm_siswa','like','%'.$this->search.'%');
            });
        }
        $query = $query->paginate($this->perPage);
        $count = KeterampilanModel::count();
        return view('livewire.keterampilan',compact('query','count'));
    }
}
