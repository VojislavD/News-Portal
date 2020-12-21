@if($mostPopularArticles->isNotEmpty() || $popularArticles->isNotEmpty())
	<div class="my-24">
		<div class="w-full bg-primary text-white">
			<a href="#" class="block w-32 py-2 bg-secondary text-center font-bold">Second Layout</a>
		</div>

		<div>
			<div class="flex flex-col md:flex-row mt-4 p-4">
				@foreach($mostPopularArticles as $article)
					<a 
						href="{{ route('front.article', $article->id) }}" 
						class="w-full md:w-1/2 h-64 sm:h-80 md:h-64 block mr-4 relative"
						title="{{ $article->headline }}" 
					>
						<p class="absolute top-1 left-1 bg-primary text-xs px-3 py-1 text-center text-white rounded-lg z-10">{{ $article->category->name }}</p>
						<div class="w-full h-full black-overlay-20 black-overlay-on-hover">
							<img class="w-full h-full" src="{{ $article->image }}">
						</div>
						<div class="absolute left-0 bottom-0 text-white px-2">
							<h3 class="truncate-two-lines text-xl">{{ $article->headline }}</h3>
							<span class="text-sm">{{ $article->created_at->toFormattedDateString() }}</span>
						</div>
					</a>
				@endforeach
			</div>
			<div class="flex flex-col md:flex-row p-4">
				@foreach($popularArticles as $article)
					<a 
						href="{{ route('front.article', $article->id) }}" 
						class="w-full md:w-1/3 h-64 sm:h-80 md:h-56 xl:h-64 block relative"
						title="{{ $article->headline }}" 
					>
						<p class="absolute top-1 left-1 bg-primary text-xs px-3 py-1 text-center text-white rounded-lg z-10">{{ $article->category->name }}</p>
						<div class="w-full h-full black-overlay-20 black-overlay-on-hover">
							<img class="w-full h-full" src="{{ $article->image }}">
						</div>
						<div class="absolute left-0 bottom-0 text-white px-2">
							<h3 class="truncate-two-lines text-lg">{{ $article->headline }}</h3>
							<span class="text-sm">{{ $article->created_at->toFormattedDateString() }}</span>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endif