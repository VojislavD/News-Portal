<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Comment extends Model
{
	protected $fillable = ['article_id', 'name', 'body', 'likes', 'dislikes', 'status'];

    use HasFactory;

    public function article()
    {
    	return $this->belongsTo(Article::class);
    }

    public function translateStatus()
    {
        switch ($this->status) {
            case 0:
                return 'Waiting for approval';
                break;
            case 1:
                return 'Approved';
                break;
            case 2:
                return 'Disapproved';
                break;
            default:
                return 'Undefined';    
                break;
        }
    }

    public static function countCommentsByDays($days) {
    	$commentsByDays = DB::table('comments')
            ->select(DB::raw('DATE(created_at) as date, count(*) as count'))
            ->groupBy('date')
            ->having('date', '>=', now()->subDays($days)->toDateString())
            ->get();

        $result = collect();

        for($i=0; $i<$days;$i++) {
            $day = Carbon::now()->subDays($i);
            $dayDateString = $day->toDateString();
            
            $dayDateFormat = $day->format('M d');

            $dayInWeek = $day->dayName;

            if(!$commentsByDays->contains(function($value, $key) use ($i, $dayDateString, $result, $days, $dayDateFormat, $dayInWeek) {
                	if($value->date == $dayDateString) {
                		if($days == 7) {
                			$result->put($i, [
	                   			'name' => $dayInWeek, 
	                   			'count' => $value->count
	                   		]);
                		} else {
                			$result->put($i, [
	                   			'name' => $dayDateFormat, 
	                   			'count' => $value->count
	                   		]);
                		}
                   		

                    	return $value->date == $dayDateString;
                	}
            	})) 
            {
                $result->put($i, [
                   			'name' => $dayDateString, 
                   			'count' => 0
                   		]);
            }

        }
        return $result->reverse();
    }

    public function checkUniqueVote($vote)
    {
        $session = collect(session()->get('voted_comments'));

        if($session->count()) {
            $filtered = $session->filter(function ($value, $key) {
                return $value['id'] == $this->id;
            });

            if($filtered->count()) {
                if($filtered->first()['vote'] == $vote) {
                    return false;
                } else {
                    $session->transform(function($item, $key) use ($vote) {
                        if($item['id'] == $this->id) {
                            return [
                                'id' => $this->id,
                                'vote' => $vote
                            ];
                        } else {
                            return $item;
                        }
                    });

                    session(['voted_comments' => $session->toArray() ]);

                    if($vote == 'like') {
                        $this->decrement('dislikes');
                    } else if($vote == 'dislike') {
                        $this->decrement('likes');
                    }
                    
                    return true;
                }
            } else {
                session()->push('voted_comments', [
                    'id' => $this->id,
                    'vote' => $vote
                ]);
                return true;
            }
        } else {
            session(['voted_comments' => [
                [
                    'id' => $this->id,
                    'vote' => $vote
                ]
            ]]);
            return true;
        }

        return false;
    }

    public static function getCommentsForThisUser($status)
    {
        if(auth()->user()->isAdmin()) {
            return Comment::where('status', $status)->paginate(10);
        } else {
            return Comment::whereHas('article', function($query) {
                return $query->where('user_id', auth()->user()->id);
            })->where('status', $status)->paginate(10);
        }
    }
}
