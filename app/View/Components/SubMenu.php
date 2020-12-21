<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubMenu extends Component
{
    public $subcategories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($category)
    {
        $this->subcategories = $category->subcategories->filter(function ($value, $key) {
            return $value->articles->count();
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front.nav.sub-menu');
    }
}
