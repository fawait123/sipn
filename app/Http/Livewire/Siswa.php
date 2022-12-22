<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa as SiswaModel;
use Livewire\WithPagination;

class Siswa extends Component
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
        $query = SiswaModel::query();
        $query = $query->with('prodi');
        $query = $query->where('nm_siswa','like','%'.$this->search.'%');
        $query = $query->paginate($this->perPage);
        $count = SiswaModel::count();
        return view('livewire.siswa',compact('query','count'));
    }
}
