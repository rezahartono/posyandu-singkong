<?php

namespace App\Http\Livewire\MasterData\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
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
            "users" => User::where($this->filter, 'like', '%' . $this->search . '%')->paginate(10),
        ];
        return view('livewire.master-data.users.show-users', $data);
    }
}
