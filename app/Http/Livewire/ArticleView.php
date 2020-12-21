<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ArticleView extends Component
{
	public $article;

	public function destroy()
	{
		$this->article->delete();
		$this->emit('articleDeleted');
	}
	
    public function render()
    {
        return view('livewire.article-view');
    }
}
