<?php

namespace App\Http\Livewire\MasterData\Kategori;

use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;

class ShowKategori extends Component
{
    use WithPagination;

    public $search, $filter;

    protected $queryString = ['search' => ['except' => '']];

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->filter = "name";
    }

    public function render()
    {
        $data = [
            "categories" => Kategori::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.master-data.kategori.show-kategori', $data);
    }
}
