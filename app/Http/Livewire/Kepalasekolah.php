<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KepalaSekolah as KepalaSekolahModel;
use Livewire\WithPagination;

class Kepalasekolah extends Component
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
        $query = KepalaSekolahModel::query();
        $query = $query->where('nm_kepsek','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = KepalaSekolahModel::count();
        return view('livewire.kepalasekolah',compact('query','count'));
    }
}
