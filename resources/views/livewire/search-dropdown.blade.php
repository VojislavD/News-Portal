<div class="relative ml-4 z-40" x-data="{ isOpen: true }" @click.away="isOpen = false">
	<input 
		wire:model.debounce.500ms="search"
		type="text" 
		class="text-sm rounded w-56 lg:w-64 px-4 pl-8 py-1 focus:outline-none text-black focus:ring-2" 
		placeholder="Search" 
		autocomplete="off" 
		x-ref="search"
		@keydown.window="
			if(event.keyCode === 191) {
				event.preventDefault();
				$refs.search.focus();
			}
		"
		@focus="isOpen = true"
		@keydown="isOpen = true"
		@keydown.escape.window="isOpen = false"
		@keydown.shift.tab="isOpen = false"
	>
	<button type="submit" class="absolute top-0 left-0 focus:outline-none">
		<x-svg-search class="w-4 text-gray-500 mt-1 ml-2" />
	</button>

	<x-svg-loader class="w-4 h-4 text-black absolute top-1 right-2" wire:loading />

	@if(strlen($search) >= 2)
		<div 
			class="absolute bg-gray-300 text-black shadow-2xl border border-white rounded text-sm mt-2 w-56 lg:w-64 z-50 h-112 overflow-y-auto"
			x-show.transition.opacity="isOpen"
		>
			<ul>
				@if($searchResults->count() > 0)
					@foreach($searchResults as $result)
						<li>
							<a 
								href="{{ route('front.article', $result->id) }}"
								class="block hover:bg-gray-400 p-3 flex items-center" 
								@if($loop->last) @keydown.tab="isOpen = false" @endif
							>
								<img src="{{ $result->image }}" class="w-8">
								<span class="ml-4 truncate-two-lines">{{ $result->headline }}</span>
							</a>
						</li>
					@endforeach
				@else
					<div class="p-3">
						No results for {{ $search }}
					</div>
				@endif
			</ul>
		</div>
	@endif

</div>