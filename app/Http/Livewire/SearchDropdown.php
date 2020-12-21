<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class SearchDropdown extends Component
{
	public $search;

    public function render()
    {
    	$searchResults = [];

    	if(strlen($this->search) >= 2) {
    		$searchResults = Article::where('headline', 'LIKE', '%'.$this->search.'%')->orWhere('subheadline', 'LIKE', '%'.$this->search.'%')->get();
    	}

        return view('livewire.search-dropdown',[
        	'searchResults' => collect($searchResults)
        ]);
    }
}
