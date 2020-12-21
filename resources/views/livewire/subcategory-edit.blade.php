<div>
    <form 
		class="pt-6 px-2 lg:px-8 flex flex-col" 
		id="changeSubcategoryName{{ $subcategory->id }}"
		wire:submit.prevent="update"
	>
		<div class="flex flex-col mb-4">
			<x-form-label for="name">Name</x-form-label>
			<x-form-input type="text" name="name" wire:model.debounce.500ms="name" />
				<x-form-error-message name="name" />
		</div>

		<div class="flex flex-col mb-4">
			<x-form-label for="category">Change Category</x-form-label>
			<x-form-select name="category" :items="$categories" :selected="$subcategory->category->name" wire:model.debounce.500ms="category" />
			<x-form-error-message name="category" />
		</div>
	</form>
	<div class="flex items-between justify-center py-4">
		<x-form-cancel-button class="mr-2 text-sm" @click="subcategoryEdit = false"/>

		<x-form-submit-button-green value="Save" form="changeSubcategoryName{{ $subcategory->id }}" class="ml-2 text-sm" />
	</div>
</div>
