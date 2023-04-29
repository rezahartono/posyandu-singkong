<?php

namespace App\Http\Livewire\MasterData\Kecamatan;

use App\Models\Kecamatan;
use Livewire\Component;
use Livewire\WithPagination;

class ShowKecamatan extends Component
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
            "kecamatan" => Kecamatan::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.master-data.kecamatan.show-kecamatan', $data);
    }
}
