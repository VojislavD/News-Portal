<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Article;
use App\Models\Comment;

class Charts extends Component
{
    public $viewsBy7Days;
    public $viewsBy30Days;
    public $commentsBy7Days;
    public $commentsBy30Days;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->viewsBy7Days = Article::countViewsByDays(7);
        $this->viewsBy30Days = Article::countViewsByDays(30);
        $this->commentsBy7Days = Comment::countCommentsByDays(7);
        $this->commentsBy30Days = Comment::countCommentsByDays(30);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.back.homepage.charts', [
            'viewsBy7Days' => $this->viewsBy7Days,
            'viewsBy30Days' => $this->viewsBy30Days,
            'commentsBy7Days' => $this->commentsBy7Days,
            'commentsBy30Days' => $this->commentsBy30Days,
        ]);
    }
}