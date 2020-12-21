<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Subcategory;

class Category extends Model
{
	protected $fillable = ['name'];
    use HasFactory;

    public function articles()
    {
    	return $this->hasMany(Article::class);
    }

    public function subcategories()
    {
    	return $this->hasMany(Subcategory::class);
    }

    public static function getActiveCategories()
    {
        return Category::with('subcategories')->where('name','!=','uncategorized')->get();
    }
}
