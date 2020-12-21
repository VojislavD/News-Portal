<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Comment;
use App\Http\Requests\StoreArticle;
use App\Http\Requests\UpdateArticle;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.articles.index');
    }

    public function show(Article $article)
    {
        $article->checkUniqueView() ? $article->increment('views') : '';

        $recommendedArticles = Article::with('comments')->where('category_id', $article->category_id)->where('id', '!=', $article->id)->latest()->take(4)->get();

    	return view('article', [
    		'article' => $article,
            'recommendedArticles' => $recommendedArticles
    	]);
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit',[
            'article' => $article,
        ]);
    }

    public function latest()
    {
        $articles = Article::with('user', 'category')->latest()->get();

        return view('latest',[
            'articles' => $articles
        ]);
    }

    public function trending()
    {
        $articles = Article::with('user', 'category')->orderBy('views')->get();

        return view('trending',[
            'mostPopularArticles' => $articles->take(5),
            'popularArticles' => $articles->filter(function($value, $key) {
                return $key == 5 || $key == 6;
            }),
            'otherArticles' => $articles->filter(function($value, $key) {
                return $key >= 7;
            })->sortByDesc('created_at')
        ]);
    }

    public function tag(Tag $tag)
    {
        $articles = $tag->articles->sortByDesc('created_at');

        return view('tag', [
            'tag' => $tag,
            'articles' => $articles
        ]);
    }
}
