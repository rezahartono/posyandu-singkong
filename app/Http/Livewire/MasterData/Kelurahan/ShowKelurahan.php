<?php

namespace App\Http\Livewire\MasterData\Kelurahan;

use App\Models\Kelurahan;
use Livewire\Component;
use Livewire\WithPagination;

class ShowKelurahan extends Component
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
            "kelurahan" => Kelurahan::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.master-data.kelurahan.show-kelurahan', $data);
    }
}
