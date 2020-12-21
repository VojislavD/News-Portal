<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Subcategory;

class Article extends Model
{
    protected $fillable = ['user_id','category_id','subcategory_id','headline', 'subheadline', 'body', 'image'];
    use HasFactory;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function countApprovedComments()
    {
        return $this->comments()->where('status',1)->count();
    }

    public function getApprovedComments()
    {
        return $this->comments()->where('status',1)->get();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public static function countViewsByDays($days) 
    {
        //Radnom data before Google Analytics is implemented
        $result = collect();
        $random7Days = array(11,8,21,17,6,22,15);
        $random30Days = array(15,8,19,26,4,17,19,12,6,15,18,7,9,29,17,13,9,24,18,22,7,12,21,11,14,17,27,11,23,15);

        for($i=0; $i<$days;$i++) {

            $day = \Carbon\Carbon::now()->subDays($i)->toDateString();

            $dateFormat = \Carbon\Carbon::now()->subDays($i)->toFormattedDateString();
            $dayInWeek = \Carbon\Carbon::now()->subDays($i)->dayName;


            if($days == 7) {
                $result->put($i, [
                    'name' => $dayInWeek,
                    'count' => $random7Days[$i]
                ]);
            } else {
                $result->put($i, [
                    'name' => $dateFormat,
                    'count' => $random30Days[$i]
                ]);
            }
        }

        return $result->reverse();
    }

    public function checkUniqueView()
    {
        if(!session()->get('viewed_articles')) {
            session(['viewed_articles' => [$this->id]]);
            return true;
        } else {
            if(!in_array($this->id, session()->get('viewed_articles'))) {
                session()->push('viewed_articles', $this->id);
                return true;
            }
        }   
        return false;
    }
}
