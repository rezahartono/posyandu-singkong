<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownInput extends Component
{
    public $label, $id, $name, $placeholder, $items, $selectedItem;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = "", $id = "", $name = "", $placeholder = "", $items = [], $selectedItem = "")
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->items = $items;
        $this->selectedItem = $selectedItem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown-input');
    }
}
