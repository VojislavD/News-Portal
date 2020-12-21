<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class LeaveComment extends Component
{
	public $article;
	public $name;
	public $body;

	protected $rules = [
        'name' => ['required', 'min:2', 'max:50'],
		'body' => ['required', 'min:2', 'max:500'],
    ];

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

	public function submit()
	{
		$validatedData = $this->validate();

		Comment::create([
			'article_id' => $this->article->id,
			'name' => $this->name,
			'body' => $this->body
		]);

		$this->reset(['name', 'body']);

    	session()->flash('commentCreated', 'Your comment waiting for approval.');
	}

    public function render()
    {
        return view('livewire.leave-comment');
    }
}
