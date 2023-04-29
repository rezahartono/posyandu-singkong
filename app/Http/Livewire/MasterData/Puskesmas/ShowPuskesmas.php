<?php

namespace App\Http\Livewire\MasterData\Puskesmas;

use App\Models\Puskesmas;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPuskesmas extends Component
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
            "puskesmas" => Puskesmas::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.master-data.puskesmas.show-puskesmas', $data);
    }
}
