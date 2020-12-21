<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentCard extends Component
{
	public $comment;

	public function like()
	{
		if($this->comment->checkUniqueVote('like')) {
			$this->comment->increment('likes');
		}
	}

	public function dislike()
	{
		if($this->comment->checkUniqueVote('dislike')) {
			$this->comment->increment('dislikes');
		}
	}

    public function render()
    {
        return view('livewire.comment-card');
    }
}
