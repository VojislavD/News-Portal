<div x-data="{ confirmDelete: false }">
	<form class="flex flex-col" wire:submit.prevent="update" enctype="multipart/form-data">
		<x-alert-success name="alertMessage" />
		
		<div class="flex flex-col my-2">
			<x-form-label for="headline">Headline</x-form-label>
			<x-form-input type="text" name="headline" wire:model.debounce.500ms="headline" />
			<x-form-error-message name="headline" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="subheadline">Subheadline</x-form-label>
			<x-form-input type="text" name="subheadline" wire:model.debounce.500ms="subheadline" />
			<x-form-error-message name="subheadline" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="image">Image</x-form-label>
			<x-form-input-file name="image" wire:model.debounce.500ms="image"  />
			<x-form-error-message name="image" />
			<img class="w-24 h-24 ml-2 mt-2" src="{{ $article->image }}">
		</div>

		<div class="flex flex-col my-2" wire:ignore>
			<x-form-label for="body">Body</x-form-label>
			<div>
				<div 
					class="w-full p-1 h-64 rounded focus:outline-none shadow-2xl"
					name="body"
					x-data="" 
					x-init="
		                ClassicEditor.create($refs.identifier)
		                .then( function(editor){
		                    editor.model.document.on('change:data', () => {
		                       $dispatch('input', editor.getData())
		                    })
		                })
		                .catch( error => {
		                    console.error( error );
		                } );
		            "
					wire:ignore 
					wire:key="identifier"
					x-ref="identifier"
					wire:model.debounce.9999999ms="body"
				>
					{!! $body !!}
				</div>
			</div>
			<x-form-error-message name="body" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="category">Category</x-form-label>
			<x-form-select name="category" :items="$categories" wire:model.debounce.500ms="category" />
			<x-form-error-message name="category" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="subcategory">Subategory</x-form-label>
			<x-form-select name="subcategory" :items="$subcategories" wire:model.debounce.500ms="subcategory" />
			<x-form-error-message name="subcategory" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="tags">Tags</x-form-label>
			<div x-data="{ tags:{{ old('tags') ? '[\''.implode('\',\'',old('tags')).'\']' : '[\''.$tags->implode('\', \'').'\']' }}, newTag:'', inputName: 'tags'  }" wire:model="newTag">
				<template x-for="tag in tags">
					<input type="hidden" :name="inputName+ '[]'" :value="tag">
				</template>

				<x-form-input-tags :tags="$tags" />
			</div>					
			<x-form-error-message name="tags" />
		</div>

		<div class="flex justify-end my-2">
			<x-form-submit-button value="Update" />
		</div>

	<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
	</form>

	<div class="my-4 flex justify-start">
		<button class="flex items-center text-secondary hover:underline focus:outline-none" @click="confirmDelete= true">
			<x-svg-trash class="w-4 h-4 mr-2" />
			Delete article
		</button>
	</div>

	<form 
		class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3/4 md:w-1/4 text-center border border-white bg-gray-300 text-sm md:text-base"
		x-show="confirmDelete"
		x-transition:enter="transition ease-out duration-300"
		x-transition:enter-start="opacity-0"
		x-transition:enter-end="opacity-100"
		x-transition:leave="transition ease-in duration-300"
		x-transition:leave-start="opacity-100"
		x-transition:leave-end="opacity-0"
		wire:submit.prevent="destroy" 
		x-on:submit="viewArticle = false"
	>
		<p class="bg-primary text-white py-2">Delete Article</p>
		<button 
			class="absolute right-2 top-1 text-xl focus:outline-none text-white hover:text-red-600"
			@click.submit.prevent="confirmDelete = false"
		>
			&times;
		</button>
		<div class="p-4">
			<p>By deleting article all comments that belongs to this article will alo be deleted.</p>
			<p class="my-3">Are you sure you want to delete article?</p>
			<x-form-button-yes />
			<x-form-button-no @click.submit.prevent="confirmDelete = false" />
		</div>
	</form>
</div>