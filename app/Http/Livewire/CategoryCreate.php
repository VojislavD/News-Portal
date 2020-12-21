<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryCreate extends Component
{
	public $name;

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => ['required', 'min:2', 'max:20', 'unique:categories,name', 'unique:subcategories,name']
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'min:2', 'max:20', 'unique:categories,name', 'unique:subcategories,name']
        ]);

        Category::create([
        	'name' => $this->name
        ]);

        $this->reset(['name']);

        $this->emit('categoryCreated');
    }

    public function render()
    {
        return view('livewire.category-create');
    }
}