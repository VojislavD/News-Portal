<x-back-pages>
	<div class="px-4 lg:px-8 mt-8 w-full lg:w-2/3" x-data="{ addCategory: false, addSubcategory: false }" @custom-event=" addSubcategory = true">
		<div class="mb-6 flex items-center justify-between">
			<h2 class="text-2xl font-bold ">Categories</h2>

			<div class="flex items-center justify-end">
				<button class="flex items-center font-bold hover:underline focus:outline-none" @click="addCategory=true">
					<span class="bg-primary p-1 rounded-full">
						<x-svg-plus class="w-2 h-2 text-white" />
					</span>
					<span class="ml-2 ">Add Category</span>
				</button>
			</div>
		</div>

		<div>
			<livewire:categories-edit />

			<div 
				class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50" 
				x-show="addCategory"
				x-transition:enter="transition ease-out duration-300"
				x-transition:enter-start="opacity-0"
				x-transition:enter-end="opacity-100"
				x-transition:leave="transition ease-in duration-300"
				x-transition:leave-start="opacity-100"
				x-transition:leave-end="opacity-0"
			>
				<livewire:category-create />
			</div>

			<div 
				class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50" 
				x-show="addSubcategory"
				x-transition:enter="transition ease-out duration-300"
				x-transition:enter-start="opacity-0"
				x-transition:enter-end="opacity-100"
				x-transition:leave="transition ease-in duration-300"
				x-transition:leave-start="opacity-100"
				x-transition:leave-end="opacity-0"
			>
				<livewire:subcategory-create />
			</div>
		</div>
	</div>
</x-back-pages>