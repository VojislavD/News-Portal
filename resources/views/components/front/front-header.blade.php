<div class="container mx-auto w-full flex flex-col lg:flex-row my-16 lg:my-12 px-4 sm:px-0">
	<div class="w-full lg:w-1/2 h-96 sm:h-112 xl:h-128" x-data="{ activeArticle: 0 }" x-cloak>
	    <div class="relative overflow-hidden w-full h-full">
	    	@foreach($mostPopularArticles as $article)
	    		<a 
		    		class="black-overlay-on-hover" 
		    		href="{{ route('front.article', $article->id) }}" 
		    		x-show.immediate=" activeArticle === {{ $loop->index }}" 
		    		title="{{ $article->headline }}"
		    	>
		    		<p class="absolute top-0 left-0 bg-primary text-sm px-4 py-1 text-center text-white z-10 capitalize">
		    			{{ $article->category->name }}
		    		</p>
					<img class="w-full h-full" src="{{ $article->image }}">
					<div class="w-full h-1/3 sm:h-1/4 absolute left-0 bottom-0 flex flex-col justify-between text-white py-1 px-4 background-black-opacity-70">
						<h3 class="text-2xl sm:text-3xl truncate-two-lines overflow-hidden leading-8">
							{{ $article->headline }}
						</h3>
						<div class="text-sm text-gray-300 flex py-1">
							<span>{{ $article->user->first_name }} {{ $article->user->last_name }}</span>
							<span class="mx-2">|</span>
							<span>{{ $article->created_at->diffForHumans() }}</span>
						</div>
					</div>
		    	</a>
	    	@endforeach

	    	<button 
	    		class="absolute top-1/2 left-1 transform -translate-y-1/2 text-2xl font-bold px-2 py-1 text-white hover:text-secondary border border-white hover:border-secondary focus:outline-none background-black-opacity-70" 
	    		@click=" activeArticle = activeArticle === 0 ? 4 : activeArticle-1 "
	    	>
	    		&#8592;
	    	</button>
			<button 
				class="absolute top-1/2 right-1 transform -translate-y-1/2 text-2xl font-bold px-2 py-1 text-white hover:text-secondary border border-white hover:border-secondary focus:outline-none background-black-opacity-70"  
				@click=" activeArticle = activeArticle === 4 ? 0 : activeArticle+1 "
			>
				&#8594;
			</button>

			{{-- 
			<div class="absolute bottom-0 left-1/2 transform -translate-x-1/2">
				<button @click.prevent="activeArticle=1">1</button>
				<button @click.prevent="activeArticle=2">2</button>
				<button @click.prevent="activeArticle=3">3</button>
				<button @click.prevent="activeArticle=4">4</button>
				<button @click.prevent="activeArticle=5">5</button>
			</div> 
			--}}
	    </div>
	</div>
	<div class="w-full lg:w-1/2 mt-8 lg:mt-0">
		<div class="grid grid-cols-1 sm:grid-cols-2">
			@foreach($popularArticles as $article)
				<a 
					href="{{ route('front.article', $article->id) }}" 
					class="relative black-overlay-on-hover h-64 lg:h-56 xl:h-64" 
					title="{{ $article->headline }}"
				>
					<p class="absolute top-0 left-0 bg-primary text-sm px-4 py-1 text-center text-white z-10 capitalize">
						{{ $article->category->name }}
					</p>
					<img class="w-full h-full" src="{{ $article->image }}">
					<div 
						class="w-full h-1/3 lg:h-5/12 xl:h-1/3 absolute left-0 bottom-0 flex flex-col justify-between text-white py-1 px-4 background-black-opacity-70"
					>
						<p class="truncate-two-lines text-xl leading-6">
							{{ $article->headline }}
						</p>
						<div class="text-sm text-gray-300">
							<span>{{ $article->user->first_name }} {{ $article->user->last_name }}</span>
							<span class="mx-1">|</span>
							<span>{{ $article->created_at->diffForHumans() }}</span>
						</div>
					</div>
				</a>
			@endforeach
		</div>
	</div>
</div>