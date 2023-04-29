<?php

namespace App\Http\Livewire\MasterData\Kota;

use App\Models\Kota;
use Livewire\Component;
use Livewire\WithPagination;

class ShowKota extends Component
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
            "kota" => Kota::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.master-data.kota.show-kota', $data);
    }
}
