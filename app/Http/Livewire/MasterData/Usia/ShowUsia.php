<?php

namespace App\Http\Livewire\MasterData\Usia;

use App\Models\Usia;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsia extends Component
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
            "usia" => Usia::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.master-data.usia.show-usia', $data);
    }
}
