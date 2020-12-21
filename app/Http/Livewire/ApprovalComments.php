<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class ApprovalComments extends Component
{
	use WithPagination;

	public $pageName;
	public $status;
	public $selectedComments;
	public $newStatus;

	protected $listeners = ['commentDeleted', 'commentUpdated'];

	public function mount()
	{
		if($this->pageName == 'approval') {
    		$this->status = 0;
    	} else if($this->pageName == 'approved') {
    		$this->status = 1;
    	} else if($this->pageName == 'disapproved') {
    		$this->status = 2;
    	}

        $this->getSelectedComments();
	}

	public function approve(Comment $comment)
	{
		$comment->update([
			'status' => 1
		]);

		session()->flash('alertMessage', 'Comment is approved.');
	}

	public function disapprove(Comment $comment)
	{
		$comment->update([
			'status' => 2
		]);

		session()->flash('alertMessage', 'Comment is disapproved.');
	}

	public function updateSelected()
	{
		$countSelectedItems = $this->selectedComments->filter(fn($c) => $c)->count();

		if($this->newStatus && $countSelectedItems) {
			if($this->newStatus == 3) {
				Comment::query()
					->whereIn('id', $this->selectedComments->filter(fn($comment) => $comment)->keys()->toArray())
					->delete();

				session()->flash('alertMessage', 'Comments are deleted.');
			} else {
				Comment::query()
					->whereIn('id', $this->selectedComments->filter(fn($comment) => $comment)->keys()->toArray())
					->update(['status' => $this->newStatus]);
				
				if($this->newStatus == 1 ) {
					session()->flash('alertMessage', 'Comments are approved.');
				} else if($this->newStatus == 2) {
					session()->flash('alertMessage', 'Comments are disapproved.');
				}
			}

			$this->render();
		}		
			
		$this->reset(['selectedComments', 'newStatus']);
		$this->getSelectedComments();
	}

	public function destroy(Comment $comment)
	{
		$comment->delete();

		session()->flash('alertMessage', 'Comment is deleted.');
	}

	public function getSelectedComments()
	{
		$this->comments = Comment::where('status', $this->status)->get();
		$this->selectedComments = $this->comments
            ->map(fn($comment) => $comment->id)
            ->flip()
            ->map(fn($comment) => false);
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
        return view('livewire.approval-comments', [
        	'comments' => Comment::getCommentsForThisUser($this->status)
        ]);
    }
}
