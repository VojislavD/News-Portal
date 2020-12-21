<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Article;

class FirstLayout extends Component
{
    public $mostPopularArticles;
    public $popularArticles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $articles = Article::with('category', 'user')->latest()->take(5)->get();

        $this->mostPopularArticles = $articles->take(2);
        $this->popularArticles = $articles->take(-3);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front.section-layouts.first-layout');
    }
}
