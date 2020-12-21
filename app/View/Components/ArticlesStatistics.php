<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Article;

class ArticlesStatistics extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $newArticles24Hours = Article::where('created_at', '>=', now()->subHours(24))->count();;
        $newArticles7Days = Article::where('created_at', '>=', now()->subDays(7))->count();

        //This to will we done when Google Analytics is implemented
        $views24Hours = 67;
        $views7Days = 453;

        return view('components.back.articles.articles-statistics', [
            'newArticles24Hours' => $newArticles24Hours,
            'newArticles7Days' => $newArticles7Days,
            'views24Hours' => $views24Hours,
            'views7Days' => $views7Days,
        ]);
    }
}
