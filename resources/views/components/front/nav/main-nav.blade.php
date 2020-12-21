<div x-data="{ isOpenNav: false, atTop: (window.pageYOffset > 176) ? false : true}" x-on:scroll.window=" atTop = (window.pageYOffset > 176) ? false : true;" x-on:close.window="isOpenNav = false">
	<div class="main-nav w-full bg-primary hidden lg:block px-2">
		<div class="container mx-auto max-w-7xl">
			<div class="flex items-center justify-between py-2 text-white">
				<p class="text-sm">{{ now()->isoFormat('dddd, MMMM Do, YYYY') }}</p>
				<ul class="flex items-center">
					<livewire:search-dropdown />
					<li class="mx-1 ml-4">
						<a href="{{ config('settings.facebook_url') }}" target="_blank" class="text-white hover:text-secondary">
							<x-svg-facebook class="w-4 h-4" />
						</a>
					</li>
					<li class="mx-1">
						<a href="{{ config('settings.twitter_url') }}" target="_blank" class="text-white hover:text-secondary">
							<x-svg-twitter class="w-4 h-4" />
						</a>
					</li>
					<li class="mx-1">
						<a href="{{ config('settings.instagram_url') }}" target="_blank" class="text-white hover:text-secondary">
							<x-svg-instagram class="w-4 h-4" />
						</a>
					</li>
					<li class="mx-1">
						<a href="{{ config('settings.youtube_url') }}" target="_blank" class="text-white hover:text-secondary">
							<x-svg-youtube class="w-4 h-4" />
						</a>
					</li>
				</ul>
			</div>
			<div class="py-6">
				<a href="{{ route('front.home') }}" class="uppercase text-4xl font-bold text-white px-2 border-b-4 border-secondary">{{ config('settings.headline') }}</a>
			</div>
			<div>
				<ul class="relative flex items-center text-white">
					<li class="mr-2 py-2">
						<a href="{{ route('front.home') }}" class="hover:text-secondary py-1 px-4 flex items-center transform hover:scale-110 transition ease-in-out duration-150">
							Home
						</a>
					</li>
					<li class="mr-2 py-2">
						<a href="{{ route('front.latest') }}" class="hover:text-secondary py-1 px-4 flex items-center transform hover:scale-110 transition ease-in-out duration-150">
							Latest
						</a>
					</li>
					<li class="mr-2 py-2">
						<a href="{{ route('front.trending') }}" class="hover:text-secondary py-1 px-4 flex items-center transform hover:scale-110 transition ease-in-out duration-150">
							Trending
						</a>
					</li>

					@foreach($categories as $category)
						@if($category->subcategories->count())
							<li class="mr-2 py-2" x-data="{ hoverLink:false, hoverDiv:false, subcategory:0 }">
								<a
									@mouseenter="hoverLink=true" 
									@mouseleave.delay.100="hoverLink=false" 
									href="{{ route('front.category', $category->name) }}" 
									class="py-1 px-4 flex items-center justify-center"
									:class=" hoverLink || hoverDiv ? 'text-secondary transform scale-110 transition ease-in-out duration-150' : ''"
								>
									{{ $category->name }} 
									<x-svg-arrow-down-bold class="w-3 h-3 ml-2" />
								</a>

								<x-sub-menu :category="$category" />
							</li>
						@else 
							<li class="mr-2 py-2">
								<a 
									href="{{ route('front.category', $category->name) }}" 
									class="hover:text-secondary py-1 px-4 flex items-center transform hover:scale-110 transition ease-in-out duration-150">
									{{ $category->name }}
								</a>
							</li>
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div> {{-- End Main-Nav --}}

	<x-top-nav />
</div>