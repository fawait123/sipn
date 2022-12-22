<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mapel as MapelModel;
use Livewire\WithPagination;

class Mapel extends Component
{
    public $search = '';
    public $perPage = 10;
    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $query = MapelModel::query();
        $query = $query->where('nm_mapel','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = MapelModel::count();
        return view('livewire.mapel',compact('query','count'));
    }
}
