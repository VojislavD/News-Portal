<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithPagination;

class ArticlesTable extends Component
{
	use WithPagination;

	public $sortBy = null;

    protected $listeners = ['articleDeleted'];

	public function mount()
	{
		$this->resetPage();
	}

    public function articleDeleted()
    {
        session()->flash('alertMessage', 'Article is deleted.');
        $this->render();
    }

    public function getArticlesSorted($sortBy) {
    	switch ($sortBy) {
    		case 'created':
    			return Article::paginate(10);
    		break;
    		case 'created_desc':
				return Article::latest()->paginate(10);
    		break;
    		case 'views':
    			return Article::orderBy('views')->paginate(10);
    		break;
    		case 'views_desc':
				return Article::orderByDesc('views')->paginate(10);
    		break;
    		case 'comments':
    			return Article::withCount('comments')->orderBy('comments_count')->paginate(10);
    		break;
    		case 'comments_desc':
    			return Article::withCount('comments')->orderByDesc('comments_count')->paginate(10);
    		break;
    		default:
    			return Article::paginate(10);
    		break;
    	}
    }

    public function render()
    {
    	$articles = $this->getArticlesSorted($this->sortBy);

        return view('livewire.articles-table', [
        	'articles' => $articles
        ]);
    }
}
