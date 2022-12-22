<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ekskul as EkskulModel;
use Livewire\WithPagination;

class Ekskul extends Component
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
        $query = EkskulModel::query();
        $query = $query->where('nm_ekskul','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = EkskulModel::count();
        return view('livewire.ekskul',compact('query','count'));
    }
}
