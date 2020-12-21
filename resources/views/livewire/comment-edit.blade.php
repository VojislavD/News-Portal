<div
	class="relative w-3/4 lg:w-1/2 min-h-80 bg-white text-black" 
	@click.away="editComment = false"
>
	<x-alert-success name="alertMessage" />

	<h1 class="bg-primary py-4 text-white text-center font-bold">Edit Comment</h1>
	<button 
		class="absolute right-3 top-2 text-2xl focus:outline-none text-white hover:text-red-600"
		@click="editComment = false"
	>
		&times;
	</button>

	<form class="mt-6 px-8 lg:px-24 pb-4" wire:submit.prevent="update" x-on:submit="editComment = false">
		<div class="flex flex-col items-start my-1">
			<x-form-label for="name">Name</x-form-label>
			<x-form-input type="text" name="name" wire:model.debounce.500ms="name" />
			<x-form-error-message name="name" />
		</div>
		<div class="flex flex-col items-start my-1">
			<x-form-label for="body">Body</x-form-label>
			<x-form-textarea name="body" wire:model.debounce.500ms="body" />
			<x-form-error-message name="body" />
		</div>
		<div class="flex flex-col items-start my-1">
			<x-form-label for="likes">Likes</x-form-label>
			<x-form-input type="number" name="likes" wire:model.debounce.500ms="likes" />
			<x-form-error-message name="likes" />
		</div>
		<div class="flex flex-col items-start my-1">
			<x-form-label for="dislikes">Dislikes</x-form-label>
			<x-form-input type="number" name="dislikes" wire:model.debounce.500ms="dislikes" />
			<x-form-error-message name="dislikes" />
		</div>
		<div class="flex flex-col items-start my-1">
			<x-form-label for="status">Status</x-form-label>
			<x-form-select-comment-status name="status" wire:model.debounce.500ms="status" />
			<x-form-error-message name="status" />
		</div>
		<div class="mt-4 flex justify-end">
			@if(
				$errors->has('name') || 
				$errors->has('body') ||
				$errors->has('likes') ||
				$errors->has('dislikes') ||
				$errors->has('status') 
			)
				<x-form-submit-button value="Save" disabled />
			@else
				<x-form-submit-button value="Save" />
			@endif
		</div>
	</form>

	<div class="my-4 px-8 lg:px-24 w-full flex justify-start">
		<button class="flex items-center text-secondary hover:underline focus:outline-none" @click="confirmDelete = true">
			<x-svg-trash class="w-4 h-4 mr-2" />
			Delete comment
		</button>
	</div>
		
	<form 
		class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3/4 md:w-1/2 bg-gray-300 text-sm md:text-base text-center"
		x-show="confirmDelete"
		x-transition:enter="transition ease-out duration-300"
		x-transition:enter-start="opacity-0"
		x-transition:enter-end="opacity-100"
		x-transition:leave="transition ease-in duration-300"
		x-transition:leave-start="opacity-100"
		x-transition:leave-end="opacity-0"
		wire:ignore
		wire:submit.prevent="destroy" 
		x-on:submit="editComment = false"
	>
		<p class="bg-primary text-white py-2">Delete Comment</p>
		<button 
			class="absolute right-2 top-1 text-xl focus:outline-none text-white hover:text-red-600"
			@click.submit.prevent="confirmDelete = false"
		>
			&times;
		</button>
		<div class="p-4">
			<p class="my-3">Are you sure you want to delete comment?</p>
			<x-form-button-yes />
			<x-form-button-no @click.submit.prevent="confirmDelete = false" />
		</div>
	</form>
</div>
