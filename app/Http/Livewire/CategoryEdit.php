<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryEdit extends Component
{
	public $category;
	public $name;

	public function mount($category)
	{
		$this->name = $category->name;
	}

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => ['required', 'min:2', 'max:20', 'unique:categories,name,'.$this->category->id, 'unique:subcategories,name']
        ]);
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'min:2', 'max:20', 'unique:categories,name,'.$this->category->id, 'unique:subcategories,name']
        ]);

        $this->category->update([
        	'name' => $this->name
        ]);

        $this->emit('categoryUpdated');
    }

    public function render()
    {
        return view('livewire.category-edit');
    }
}
