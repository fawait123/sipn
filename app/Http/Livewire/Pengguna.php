<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengguna as PenggunaModel;
use Livewire\WithPagination;

class Pengguna extends Component
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
        $query = PenggunaModel::query();
        $query = $query->where('nm_pengguna','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = PenggunaModel::count();
        return view('livewire.pengguna',compact('query','count'));
    }
}
