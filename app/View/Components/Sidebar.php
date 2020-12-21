<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Article;
use App\Models\Comment;

class Sidebar extends Component
{
    public $latest;
    public $trending;
    public $comments;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->latest = Article::with('comments')->latest()->take(5)->get();
        $this->trending = Article::with('comments')->orderByDesc('views')->take(5)->get();
        $this->comments = $this->getArticlesByCommentsCount();
    }

    private function getArticlesByCommentsCount()
    {
        $commentsByCount = Comment::with('article')->where('status',1)->get()->groupBy('article_id')->sortByDesc(function($item) {
            return $item->count();
        })->take(5);
        $articlesByCommentsCount = collect();
        foreach ($commentsByCount as $comment) {
            $articlesByCommentsCount->push($comment->first()->article);
        }

        return $articlesByCommentsCount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front.sidebar');
    }
}
