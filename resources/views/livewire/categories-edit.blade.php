<ul>
	<x-alert-success name="alertMessage" />

	@forelse($categories as $category)
		<li 
			class="mb-8"
			x-data="{ showSubcategories: false, categoryEdit: false, subcategoryEdit: false, confirmDeleteCategory: false }"
		>
			<div 
				class="flex flex-col p-4 bg-primary"
			>
				<div class="flex items-center justify-between">
					<button 
						class="text-white hover:text-secondary flex items-center font-bold focus:outline-none" 
						title="More"
						@click="showSubcategories = !showSubcategories"
					>
						<x-svg-plus class="w-3 h-3" />
						<span class="ml-2 capitalize">{{ $category->name }}</span>
					</button>

					<div class="flex items-center justify-center">
						<x-svg-edit class="w-4 h-4 mr-2 mt-1 text-yellow-400 hover:text-yellow-500 cursor-pointer focus:outline-none mb-1" @click="categoryEdit = !categoryEdit" />
						
						<x-delete-button @click="confirmDeleteCategory = true" />
						<form
							class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3/4 md:w-1/4 text-center border border-white bg-gray-300 text-sm md:text-base"
							x-show="confirmDeleteCategory"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0"
							x-transition:enter-end="opacity-100"
							x-transition:leave="transition ease-in duration-300"
							x-transition:leave-start="opacity-100"
							x-transition:leave-end="opacity-0"
						 	wire:submit.prevent="destroy({{ $category }})"
						 	x-on:submit="confirmDeleteCategory = false"
						>
							<p class="bg-primary text-white py-2">Delete Category</p>
							<button 
								class="absolute right-2 top-1 text-xl focus:outline-none text-white hover:text-red-600"
								@click.submit.prevent="confirmDeleteCategory = false"
							>
								&times;
							</button>
							<div class="p-4">
								<p>By deleting category all subcategories that belongs to this category will also be deleted and all articles from this category will be "Uncategorized".</p>
								<p class="my-3">Are you sure you want to delete category?</p>
								<x-form-button-yes />
								<x-form-button-no @click.submit.prevent="confirmDeleteCategory = false" />
							</div>
						</form>
					</div>
				</div>

				<div 
					x-show="categoryEdit"
					x-transition:enter="transition ease-out duration-300"
					x-transition:enter-start="transform -translate-y-8"
					x-transition:enter-end="transform translate-y-0"
					x-transition:leave="transition ease-in duration-300"
					x-transition:leave-start="transform translate-y-0"
					x-transition:leave-end="transform -translate-y-8"
				>
					<livewire:category-edit :category="$category" :key="time().$category->id" />					
				</div>
			</div>
			
			<ul 
				class="bg-white shadow-2xl font-semibold border border-primary"
				x-show="showSubcategories"
				x-transition:enter="transition ease-out duration-300"
				x-transition:enter-start="opacity-50 transform -translate-y-4"
				x-transition:enter-end="opacity-100 transform translate-y-0"
				x-transition:leave="transition ease-in duration-300"
				x-transition:leave-start="opacity-100 transform translate-y-0"
				x-transition:leave-end="opacity-50 transform -translate-y-4"
			>
			
				<livewire:subcategories-edit :category="$category" :key="time().$category->id" />
			</ul>
		</li>
	@empty
		<p class="ml-8 font-semibold">There is no categories</p>
	@endforelse
</ul>

