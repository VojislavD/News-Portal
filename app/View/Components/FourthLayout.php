<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Article;

class FourthLayout extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->articles = Article::with('user', 'comments')->latest()->take(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front.section-layouts.fourth-layout');
    }
}
