@if($mostPopularArticle || $popularArticles->isNotEmpty())
	<div class="my-24">
		<div class="w-full bg-primary text-white">
			<a href="#" class="block w-32 py-2 bg-secondary text-center font-bold">Third Layout</a>
		</div>

		<div class="flex flex-col sm:flex-row mt-4">
			<div class="w-full sm:w-1/2 lg:mr-8">
				<a 
					href="{{ route('front.article', $mostPopularArticle->id) }}" 
					class="h-64 sm:h-40 xl:h-64 block"
					title="{{ $mostPopularArticle->headline }}" 
				>
					<div class="w-full h-full black-overlay-on-hover relative">
						<img class="w-full h-full" src="{{ $mostPopularArticle->image }}">
					</div>
				</a>
				<a 
					href="{{ route('front.article', $mostPopularArticle->id) }}" 
					class="text-xl xl:text-2xl font-bold my-3 truncate-two-lines hover:text-primary transition ease-in-out duration-300"
					title="{{ $mostPopularArticle->headline }}" 
				>
					{{ $mostPopularArticle->headline }}
				</a>
				<p class="sm:text-sm md:text-base text-gray-600 mb-3">
					{!! \Illuminate\Support\Str::limit($mostPopularArticle->subheadline, $limit = 240,'...') !!}
				</p>
				<a 
					href="{{ route('front.article', $mostPopularArticle->id) }}" 
					class="text-sm text-gray-500 hover:text-primary transition ease-in-out duration-300"
					title="{{ $mostPopularArticle->headline }}" 
				>
					{{ $mostPopularArticle->user->first_name }} {{ $mostPopularArticle->user->last_name }} - {{ $mostPopularArticle->created_at->diffForHumans() }} - {{ $mostPopularArticle->comments->count() }} comments
				</a>
			</div>
			<div class="w-full sm:w-1/2 flex flex-col justify-between mt-4 sm:mt-0 sm:ml-8">
				@foreach($popularArticles as $article)
					<div class="flex my-2 sm:my-0">
						<a 
							href="{{ route('front.article', $article->id) }}" 
							class="w-1/3 black-overlay-on-hover relative"
							title="{{ $article->headline }}" 
						>
							<img src="{{ $article->image }}">
						</a> 
						<div class="w-2/3 flex flex-col ml-4 mt-2">
							<a 
								href="{{ route('front.article', $article->id) }}" 
								class="font-bold truncate-two-lines mb-1 hover:text-primary transition ease-in-out duration-300"
								title="{{ $article->headline }}" 
							>
								{{ $article->headline }}
							</a>
							<a 
								href="{{ route('front.article', $article->id) }}" 
								class="text-sm text-gray-500 hover:text-gray-700"
								title="{{ $article->headline }}" 
							>
								{{ $article->user->first_name }} {{ $article->user->last_name }} - {{ $article->created_at->diffForHumans() }}
							</a>	
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endif