<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Article;

class Subcategory extends Model
{
	protected $fillable = ['name', 'category_id'];
	
    use HasFactory;

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function articles()
    {
    	return $this->hasMany(Article::class);
    }
}
