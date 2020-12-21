<div 
	class="second-nav lg:hidden bg-primary w-full fixed p-2 top-0 z-40" 
	:class="{ 'block': !atTop, 'lg:hidden': atTop}"
	@click.away="isOpenNav = false"
>
	<div class="container relative mx-auto max-w-7xl flex flex-col lg:flex-row items-center justify-between">
		<div class="w-full flex items-center justify-between">
			<a href="{{ route('front.home') }}" class="uppercase text-xl font-bold text-white" @click="$dispatch('close')">{{ config('settings.headline') }}</a>

			<button class="text-white hover:text-secondary lg:hidden focus:outline-none" @click="isOpenNav = !isOpenNav">
				<x-svg-menu-burger class="h-8 w-8" />
			</button>
		</div>

		<ul 
			class="hidden lg:flex items-center text-white py-4 lg:py-0"
			:class="{ 'flex flex-col w-full lg:flex-row': isOpenNav, 'hidden': !isOpenNav }"
			x-on:resize.window=" isOpenNav = (window.window.innerWidth > 1024) ? false : isOpenNav;" 
		>
			<li class="lg:hidden mb-2">
				{{-- <form class="relative" method="POST" action="{{ route('front.search') }}">
					@csrf

					<input type="text" name="keyword" class="text-sm rounded w-64 px-4 pl-8 py-1 focus:outline-none text-black focus:shadow-outline" placeholder="Search">
					<button type="submit" class="absolute top-0 left-0 focus:outline-none">
						<x-svg-search class="w-4 text-gray-500 mt-2 ml-2" />
					</button>
				</form> --}}
				<livewire:search-dropdown />
			</li>
			<li class="lg:mr-6">
				<a href="{{ route('front.home') }}" class="flex items-center py-2 px-1 lg:py-1 hover:text-secondary transform hover:scale-110 transition ease-in-out duration-150" @click="$dispatch('close')">
					Home
				</a>
			</li>
			<li class="lg:mr-6">
				<a href="{{ route('front.latest') }}" class="flex items-center py-2 px-1 lg:py-1 hover:text-secondary transform hover:scale-110 transition ease-in-out duration-150" @click="$dispatch('close')">
					Latest
				</a>
			</li>
			<li class="lg:mr-6">
				<a href="{{ route('front.trending') }}" class="flex items-center py-2 px-1 lg:py-1 hover:text-secondary transform hover:scale-110 transition ease-in-out duration-150" @click="$dispatch('close')">
					Trending
				</a>
			</li>
			@foreach($categories as $category)
				@if($category->subcategories->count())
					<li class="lg:mr-6" x-data="{ hoverLink:false, hoverDiv:false, subcategory:1 }">
						<a
							@mouseenter="hoverLink=true" 
							@mouseleave.delay.100="hoverLink=false" 
							@click="$dispatch('close')"
							href="{{ route('front.category', $category->name) }}" 
							class="py-2 lg:py-1 px-1 flex items-center"
							:class=" hoverLink || hoverDiv ? 'text-secondary transform scale-110 transition ease-in-out duration-150' : ''"
						>
							{{ $category->name }}
							<x-svg-arrow-down-bold class="w-3 h-3 ml-2 hidden lg:block" />
						</a>

						<x-sub-menu :category="$category" />
					</li>
				@else
					<li class="lg:mr-6">
						<a href="#" class="flex items-center py-2 px-1 lg:py-1 hover:text-secondary transform hover:scale-110 transition ease-in-out duration-150" @click="$dispatch('close')">
							{{ $category->name }}
						</a>
					</li>
				@endif
			@endforeach
		</ul>

		<div x-data="{openSearchForm: false}" @click.away="openSearchForm = false" class="hidden lg:block">
			<button class="focus:outline-none" @click="openSearchForm = !openSearchForm">
				<x-svg-search class="w-5 text-white font-bold ml-4" />
			</button>

			<div
				x-show="openSearchForm" 
				x-transition:enter="transition ease-out duration-300"
				x-transition:enter-start="opacity-0 transform scale-90"
				x-transition:enter-end="opacity-100 transform scale-100"
				x-transition:leave="transition ease-in duration-300"
				x-transition:leave-start="opacity-100 transform scale-100"
				x-transition:leave-end="opacity-0 transform scale-90"
				class="absolute right-0 top-12 z-40 mr-2"
			>
				<livewire:search-dropdown />
			</div>
		</div>
	</div>
</div> {{-- End Second-Nav --}}