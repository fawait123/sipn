<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wali as WaliModel;
use Livewire\WithPagination;

class Wali extends Component
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
        $query = WaliModel::query();
        $query = $query->with(['guru','prodi']);
        $query = $query->where('nip','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = WaliModel::count();
        return view('livewire.wali',compact('query','count'));
    }
}
