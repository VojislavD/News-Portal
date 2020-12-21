<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentEdit extends Component
{
	public $comment;
	public $name;
	public $body;
	public $likes;
	public $dislikes;
	public $status;

	protected $rules = [
        'name' => ['required', 'min:2', 'max:50'],
		'body' => ['required', 'min:2', 'max:500'],
		'likes' => ['required', 'integer'],
		'dislikes' => ['required','integer'],
		'status' => ['required', 'between:0,2'],
    ];

	public function mount($comment)
	{
		$this->name = $comment->name;
		$this->body = $comment->body;
		$this->likes = $comment->likes;
		$this->dislikes = $comment->dislikes;
		$this->status = $comment->status;
	}

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
	{
		$validatedData = $this->validate();

		$this->comment->update([
			'article_id' => $this->comment->article->id,
			'name' => $this->name,
			'body' => $this->body,
			'likes' => $this->likes,
			'dislikes' => $this->dislikes,
			'status' => $this->status
		]);

		$this->reset(['comment','name','body','likes', 'dislikes', 'status']);
		$this->emit('commentUpdated');
	}

	public function destroy()
	{
		$this->comment->delete();
		$this->reset(['comment','name','body','likes', 'dislikes', 'status']);
		$this->emit('commentDeleted');
	}

    public function render()
    {
        return view('livewire.comment-edit');
    }
}
