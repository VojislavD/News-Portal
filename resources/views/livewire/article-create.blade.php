<form class="flex flex-col" wire:submit.prevent="store" enctype="multipart/form-data">
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
		<x-form-input-file name="image" required wire:model.debounce.500ms="image" />
		<x-form-error-message name="image" />
	</div>

	<div class="flex flex-col my-2">
		<x-form-label for="body">Body</x-form-label>
		<div wire:ignore>
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
				{{ $body }}
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
		<div x-data="{ tags:{{ old('tags') ? '[\''.implode('\',\'',old('tags')).'\']' : '[]' }}, newTag:'', inputName: 'tags'  }" wire:model="newTag">
			<template x-for="tag in tags">
				<input type="hidden" :name="inputName+ '[]'" :value="tag">
			</template>

			<x-form-input-tags :tags="$tags" />
		</div>					
		<x-form-error-message name="tags" />
	</div>

	<div class="flex justify-end my-2">
		<x-form-submit-button value="Save" />
	</div>

<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
</form>