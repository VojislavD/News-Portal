<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

class LatestComments extends Component
{
	use WithPagination;

	protected $listeners = ['commentDeleted', 'commentUpdated'];

	public function mount()
	{
		$this->resetPage();
	}

	public function commentUpdated()
	{
		session()->flash('alertMessage', 'Comment is updated.');
		$this->render();
	}

	public function commentDeleted()
	{
		session()->flash('alertMessage', 'Comment is deleted.');
		$this->render();
	}
	
    public function render()
    {
        return view('livewire.latest-comments', [
        	'comments' => Comment::with('article')->paginate(10)
        ]);
    }
}
