<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputFile extends Component
{
    public $name;
    public $value;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value=null, $required = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.form-input-file');
    }
}
