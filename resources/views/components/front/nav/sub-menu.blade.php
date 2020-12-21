<div 
	@mouseenter="hoverDiv=true" 
	@mouseleave="hoverDiv=false" 
	x-show="hoverLink || hoverDiv" 
	x-transition:enter="transition ease-out duration-300"
	x-transition:enter-start="opacity-0 transform scale-90"
	x-transition:enter-end="opacity-100 transform scale-100"
	x-transition:leave="transition ease-in duration-100"
	x-transition:leave-start="opacity-100 transform scale-500"
	x-transition:leave-end="opacity-0 transform scale-90"
	class="hidden lg:flex absolute container w-full left-0 py-8 bg-white border-t-4 border-secondary shadow-2xl text-black z-50"
>
	<div class="w-1/6 flex flex-col items-center font-bold">
		@foreach($subcategories as $subcategory)
			@if($subcategory->articles->count())
				<a 
					@mouseenter="subcategory={{ $loop->index }}" 
					class="w-full text-center py-1 my-1 hover:text-secondary" 
					href="{{ route('front.subcategory', $subcategory->name) }}"
				>
					{{ $subcategory->name }}
				</a>
			@endif
		@endforeach
	</div>
	<div class="w-5/6">
		@foreach($subcategories as $subcategory)
			@if($subcategory->articles->count())
				<div 
					x-show="subcategory === {{ $loop->index }}"
					x-transition:enter="transition ease-out duration-300"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					class="w-full grid grid-cols-3"
				>
					@foreach($subcategory->articles as $article)
						@if($loop->index < 3)
							<a href="{{ route('front.article', $article->id) }}" class="w-48 xl:w-64 h-1/3 text-sm">
								<div  class="w-48 xl:w-64 h-32 xl:h-40 overflow-hidden">
									<img class="w-full h-full transform hover:scale-110 transition ease-in-out duration-500" src="{{ $article->image }}">
								</div>
								<h3 class="truncate-two-lines font-bold my-2">{{ $article->headline }}</h3>
								<p class="text-gray-500">{{ $article->created_at->diffForHumans() }}</p>
							</a>
						@else
							@break
						@endif
					@endforeach
				</div>
			@endif
		@endforeach
	</div>
</div>