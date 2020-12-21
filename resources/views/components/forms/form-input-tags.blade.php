<div class="flex flex-wrap w-full overflow-visible p-1 border-2 rounded focus:outline-none shadow-2xl bg-white @error('tags') border-red-600 @enderror">
	@if(!empty($tags))
		@if(count($tags) || $tags->isNotEmpty())
			<template x-for="tag in tags" :key="tag">
				<span class="flex items-center mr-2 bg-gray-200 hover:bg-gray-300 rounded px-2 my-1">
					<span x-text="tag" class="text-sm"></span>
					<span class="ml-1 cursor-pointer" @click="tags = tags.filter(i => i !== tag), $wire.removeTag(tag)">&times;</span>
				</span>
			</template>
		@endif
	@endif
	
	<input 
		type="text" 
		class="flex-1 focus:outline-none" 
		@keydown.enter.prevent="if(newTag.trim() !== '' && !tags.includes(newTag.trim())) tags.push(newTag.trim()); newTag=''"
		x-model="newTag"
		wire:keydown.enter="addTag"
	>
</div>