<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesEdit extends Component
{
	public $newCategoryName;

	protected $listeners = ['categoryUpdated', 'categoryCreated','subcategoryCreated'];

	public function destroy(Category $category)
	{
		foreach ($category->articles as $article) {
			$article->update([
				'category_id' => 1
			]);
		}

		$category->delete();

		session()->flash('alertMessage', 'Category is deleted');
	}

	public function categoryUpdated()
	{
		session()->flash('alertMessage', 'Category is updated.');
		$this->render();
	}

	public function categoryCreated()
	{
		session()->flash('alertMessage', 'Category is created.');
		$this->render();
	}

	public function subcategoryCreated()
	{
		session()->flash('alertMessage', 'Subcategory is created.');
		$this->render();
	}


	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'newCategoryName' => ['required', 'min:2', 'max:20', 'unique:categories,name', 'unique:subcategories,name'],
        ]);
    }

    public function storeCategory()
    {
        $validatedData = $this->validate([
            'newCategoryName' => ['required', 'min:2', 'max:20', 'unique:categories,name', 'unique:subcategories,name'],
        ]);

        Category::create([
        	'name' => $this->newCategoryName
        ]);

        session()->flash('alertMessage', 'New category is created.');
        $this->render();
    }

    public function render()
    {
        return view('livewire.categories-edit',[
        	'categories' => Category::getActiveCategories()
        ]);
    }
}
