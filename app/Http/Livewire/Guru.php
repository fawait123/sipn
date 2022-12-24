<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guru as GuruModel;
use Livewire\WithPagination;

class Guru extends Component
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
        $query = GuruModel::query();
        $query = $query->with('gurumapel.mapel');
        $query = $query->where('nm_guru','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = GuruModel::count();
        return view('livewire.guru',compact('query','count'));
    }
}
