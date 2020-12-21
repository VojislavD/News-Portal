<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function show(Subcategory $subcategory)
    {
        $articles = $subcategory->articles->sortByDesc('views');

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

        return view('subcategory',[
            'subcategory' => $subcategory,
            'mostPopularArticles' => $mostPopularArticles,
            'popularArticles' => $popularArticles,
            'otherArticles' => $otherArticles
        ]);

    }
}
