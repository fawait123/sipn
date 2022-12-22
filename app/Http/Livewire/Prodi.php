<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prodi as ProdiModel;
use Livewire\WithPagination;

class Prodi extends Component
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
        $query = ProdiModel::query();
        $query = $query->where('kompetensi','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = ProdiModel::count();
        return view('livewire.prodi',compact('query','count'));
    }
}
