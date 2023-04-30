<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $label, $type, $id, $name, $placeholder, $value, $disable, $appendLabel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = "", $type = "", $id = "", $name = "", $placeholder = "", $value = "", $disable = false, $appendLabel = null,)
    {
        $this->label = $label;
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->disable = $disable;
        $this->appendLabel = $appendLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-input');
    }
}
