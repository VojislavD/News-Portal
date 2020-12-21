<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    public $name;
    public $items;
    public $selected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $items, $selected = null)
    {
        $this->name = $name;
        $this->items = $items;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.form-select');
    }
}
