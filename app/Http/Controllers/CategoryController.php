<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
    	$articles = $category->articles->sortByDesc('views');

        if($articles->count() > 7) {
            $mostPopularArticles = $articles->take(5);
            $popularArticles = $articles->filter(function($value, $key) {
                return $key == 5 || $key == 6;
            });
            $otherArticles = $articles->filter(function($value, $key) {
                return $key >= 7;
            })->sortByDesc('created_at');
        } else if($articles->count()) {
            $mostPopularArticles = null;
            $popularArticles = null;
            $otherArticles = $articles->sortByDesc('created_at');
        } else {
            $mostPopularArticles = null;
            $popularArticles = null;
            $otherArticles = null;
        }

    	return view('category',[
            'category' => $category,
    		'mostPopularArticles' => $mostPopularArticles,
    		'popularArticles' => $popularArticles,
    		'otherArticles' => $otherArticles
    	]);
    }
}
