<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Article;

class FrontHeader extends Component
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
        $articles = Article::orderBy('views')->take(9)->get();

        $this->mostPopularArticles = $articles->take(5);
        $this->popularArticles =$articles->take(-4);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front.front-header');
    }
}
