<div>
	<x-alert-success name="alertMessage" />

	<li class="text-bold pl-6 py-3">
		<p class="font-bold underline">Subcategories</p>
	</li>
	@forelse($subcategories as $subcategory)
		<li 
			class="py-2 my-2 pl-10 lg:pl-16 pr-4 hover:bg-gray-200"
			x-data="{ subcategoryEdit: false, confirmDelete: false }"
			:class="{ 'bg-gray-200 border-t border-b border-primary': subcategoryEdit }"
		>
			<div class="flex items-center justify-between">
				<p>{{ $subcategory->name }}</p>
				
				<div class="flex items-center justify-center">
					<x-svg-edit class="w-4 h-4 mr-2 mt-1 text-yellow-400 hover:text-yellow-500 cursor-pointer focus:outline-none mb-1" @click="subcategoryEdit = !subcategoryEdit" />
					
					<x-delete-button @click="confirmDelete = true" />
					
				</div>
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
				wire:submit.prevent="destroy({{ $subcategory }})"
				x-on:submit="confirmDelete = false"
			>
				<p class="bg-primary text-white py-2">Delete Subcategory</p>
				<button 
					class="absolute right-2 top-1 text-xl focus:outline-none text-white hover:text-red-600"
					@click.submit.prevent="confirmDelete = false"
				>
					&times;
				</button>
				<div class="p-4">
					<p>By deleting subcategory all articles from this subcategory will be in "Uncategorized" subcategory.</p>
					<p class="my-3">Are you sure you want to delete category?</p>
					<x-form-button-yes />
					<x-form-button-no @click.submit.prevent="confirmDelete = false" />
				</div>
			</form>

			<div 
				x-show="subcategoryEdit"
				x-transition:enter="transition ease-out duration-300"
				x-transition:enter-start="opacity-50 transform -translate-y-8"
				x-transition:enter-end="opacity-100 transform translate-y-0"
				x-transition:leave="transition ease-in duration-300"
				x-transition:leave-start="opacity-100 transform translate-y-0"
				x-transition:leave-end="opacity-50 transform -translate-y-8"
			>
				<livewire:subcategory-edit :subcategory="$subcategory" :key="time().$subcategory->id" />
			</div>
		</li>
	@empty
		<p class="ml-8">There is no subcategories.</p>
	@endforelse

	<div class="flex items-center justify-end p-4 pt-8">
		<button class="flex items-center font-bold hover:underline focus:outline-none" @click="$dispatch('custom-event')">
			<span class="bg-primary p-1 rounded-full">
				<x-svg-plus class="w-2 h-2 text-white"  />
			</span>
			<span class="ml-2 ">Add Subcategory</span>
		</button>
	</div>
</div>