<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Keterampilan as KeterampilanModel;
use Livewire\WithPagination;

class Keterampilan extends Component
{
    public $search = '';
    public $kd_mapel = '';
    public $perPage = 10;
    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search',
        'kd_mapel'
    ];


    public function render()
    {
        $query = KeterampilanModel::query();
        $query = $query->with(['mapel','siswa','ajaran']);
        if($this->search != '')
        {
            $query = $query->where('tingkat','like','%'.$this->search.'%');
        }
        $query = $query->where('kd_mapel',request('kd_mapel'))->where('tingkat','like',request('tingkat'));
        $query = $query->paginate($this->perPage);
        $count = KeterampilanModel::count();
        return view('livewire.keterampilan',compact('query','count'));
    }
}