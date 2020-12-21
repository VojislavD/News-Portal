<div
	class="relative w-3/4 md:w-1/2 lg:w-1/3 h-80 bg-white" 
	@click.away="addCategory = false"
	x-on:keydown.escape.window="addCategory = false"
>
	<h1 class="bg-primary py-4 text-white text-center font-bold">Add Category</h1>
	<button 
		class="absolute right-3 top-2 text-2xl focus:outline-none text-white hover:text-red-600"
		@click="addCategory = false"
	>
		&times;
	</button>
	<form class="mt-6 px-8" wire:submit.prevent="store" x-on:submit="addCategory = false">
		<div>
			<x-form-label for="name">Name</x-form-label>
			<x-form-input type="text" name="name" wire:model.debounce.500ms="name" />
			<x-form-error-message name="name" />
		</div>
		<div class="mt-4 flex justify-end">
			@if($errors->has('name') || empty($name))
				<x-form-submit-button value="Save" disabled />
			@else
				<x-form-submit-button value="Save" />
			@endif
		</div>
	</form>
</div>
