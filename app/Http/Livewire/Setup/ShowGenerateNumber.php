<?php

namespace App\Http\Livewire\Setup;

use App\Models\GenerateNumber;
use Livewire\Component;
use Livewire\WithPagination;

class ShowGenerateNumber extends Component
{
    use WithPagination;

    public $search, $filter;

    protected $queryString = ['search' => ['except' => '']];

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->filter = "number_format";
    }

    public function render()
    {
        $data = [
            "numbers" => GenerateNumber::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.setup.show-generate-number', $data);
    }
}
