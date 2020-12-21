<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoriesEdit extends Component
{
	public $category;

	protected $listeners = ['subcategoryUpdated'];

	public function destroy(Subcategory $subcategory)
	{
		foreach ($subcategory->articles as $article) {
			$article->update([
				'subcategory_id' => 1
			]);
		}
		
		$subcategory->delete();

		session()->flash('alertMessage', 'Subcategory is deleted.');
	}

	public function subcategoryUpdated()
	{
		session()->flash('alertMessage', 'Category is updated.');
		$this->render();
	}

    public function render()
    {
        return view('livewire.subcategories-edit', [
        	'subcategories' => Subcategory::where('category_id', $this->category->id)->get()
        ]);
    }
}
