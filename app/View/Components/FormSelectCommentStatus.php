<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelectCommentStatus extends Component
{
    public $name;
    public $selected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $selected = null)
    {
        $this->name = $name;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.form-select-comment-status');
    }
}
