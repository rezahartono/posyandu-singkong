<?php

namespace App\Http\Livewire\Module;

use App\Models\DataPosyandu;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDataPosyandu extends Component
{
    use WithPagination;

    public $search, $filter;

    protected $queryString = ['search' => ['except' => '']];

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->filter = "nomor";
    }

    public function render()
    {
        $data = [
            "data_posyandu" => DataPosyandu::with('kategoriDetail')->where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.module.show-data-posyandu', $data);
    }
}
