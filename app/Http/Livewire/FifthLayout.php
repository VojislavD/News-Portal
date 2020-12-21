<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class FifthLayout extends Component
{
	public $amount = 5;

	public function load()
	{
		$this->amount += 5;
	}

    public function render()
    {
        return view('livewire.fifth-layout', [
        	'articles' => Article::take($this->amount)->get()
        ]);
    }
}
