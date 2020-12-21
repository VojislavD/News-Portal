<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Article;

class ThirdLayout extends Component
{
    public $mostPopularArticle;
    public $popularArticles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $articles = Article::with('user')->latest()->take(5)->get();

        $this->mostPopularArticle = $articles->first();
        $this->popularArticles = $articles->take(-4);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front.section-layouts.third-layout');
    }
}
