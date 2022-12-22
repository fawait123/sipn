<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ajaran as AjaranModel;
use Livewire\WithPagination;

class Ajaran extends Component
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
        $query = AjaranModel::query();
        $query = $query->where('th_ajaran','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = AjaranModel::count();
        return view('livewire.ajaran',compact('query','count'));
    }
}
