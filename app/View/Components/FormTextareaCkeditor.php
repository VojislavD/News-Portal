<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormTextareaCkeditor extends Component
{   
    public $name;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value =null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.form-textarea-ckeditor');
    }
}
