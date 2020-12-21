<div>
	<x-alert-success name="alertMessage" />
	
    <form 
		class="pt-2 pl-2 flex flex-col" 
		id="changeCategoryName{{ $category->id }}" 
		wire:submit.prevent="update"
	>
		<x-form-label class="text-white">Name</x-form-label>
		<x-form-input type="text" name="name" value="{{ $category->name }}" wire:model.debounce.500ms="name"  />
		<x-form-error-message name="name" />
	</form>

	<div class="flex items-between justify-center pt-4">
		<x-form-cancel-button class="mr-2 text-sm" @click="categoryEdit = false"/>
		<x-form-submit-button-green value="Save" form="changeCategoryName{{ $category->id }}" class="ml-2 text-sm" />
	</div>
</div>
