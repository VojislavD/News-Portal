<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class SubcategoryEdit extends Component
{
	public $subcategory;
	public $name;
	public $category;

	public function mount($subcategory)
	{
		$this->name = $subcategory->name;
		$this->category = $subcategory->category->id;
	}

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => ['required', 'min:2', 'max:20', 'unique:subcategories,name,'.$this->subcategory->id, 'unique:categories,name'],
            'category' => ['required', 'exists:categories,id']
        ]);
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'min:2', 'max:20', 'unique:subcategories,name,'.$this->subcategory->id, 'unique:categories,name'],
            'category' => ['required', 'exists:categories,id']
        ]);

        $this->subcategory->update([
        	'name' => $this->name,
        	'category_id' => $this->category
        ]);

        $this->emit('subcategoryUpdated');
    }

    public function render()
    {
        return view('livewire.subcategory-edit',[
        	'categories' => Category::getActiveCategories()
        ]);
    }
}
