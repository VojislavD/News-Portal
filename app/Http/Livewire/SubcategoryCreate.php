<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryCreate extends Component
{
	public $name;
	public $category;

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => ['required', 'min:2', 'max:20', 'unique:subcategories,name', 'unique:categories,name'],
            'category' => ['required', 'exists:categories,id']
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'min:2', 'max:20', 'unique:subcategories,name', 'unique:categories,name'],
            'category' => ['required', 'exists:categories,id']
        ]);

        Subcategory::create([
        	'name' => $this->name,
        	'category_id' => $this->category
        ]);

        $this->reset(['name', 'category']);
        
        $this->emit('subcategoryCreated');
    }
    public function render()
    {
        return view('livewire.subcategory-create', [
        	'categories' => Category::getActiveCategories()
        ]);
    }
}
