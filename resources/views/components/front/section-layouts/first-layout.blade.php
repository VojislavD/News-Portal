@if($mostPopularArticles->isNotEmpty() || $popularArticles->isNotEmpty())
	<div>
		<div class="w-full bg-primary text-white">
			<a href="#" class="block w-32 py-2 bg-secondary text-center font-bold">First Layout</a>
		</div>

		<div class="my-4">
			<div class="flex flex-col md:flex-row">
				@foreach($mostPopularArticles as $article)
					<a 
						href="{{ route('front.article', $article->id) }}" 
						class="w-full md:w-1/2 block p-4 mr-4 h-128 overflow-hidden shadow-2xl relative"
						title="{{ $article->headline }}" 
					>
						<p class="absolute top-0 left-0 bg-primary text-sm px-4 py-1 text-center text-white z-10">{{ $article->category->name }}</p>
						<img class="w-80 h-48 xl:h-56 mx-auto" src="{{ $article->image }}">
						<div class="mt-4">
							<h3 class="font-bold text-2xl truncate-two-lines hover:text-primary transition ease-in-out duration-200">{{ $article->headline }}</h3>
							<div class="flex mt-1 text-sm text-gray-500">
								<span>{{ $article->user->first_name }} {{ $article->user->last_name }}</span>
								<span class="mx-2">|</span>
								<span>{{ $article->created_at->diffForHumans() }}</span>
							</div>
							<p class="mt-2">
							{!! \Illuminate\Support\Str::limit($article->subheadline, $limit = 280,'...') !!}</p>
						</div>
					</a>
				@endforeach
			</div>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
				@foreach($popularArticles as $article)
					<a 
						href="{{ route('front.article', $article->id) }}" 
						class="block h-112 p-4 overflow-hidden shadow-2xl relative"
						title="{{ $article->headline }}" 
					>
						<p class="absolute top-0 left-0 bg-primary text-sm px-4 py-1 text-center text-white z-10">{{ $article->category->name }}</p>
						<img class="w-80 md:w-64 xl:w-96 h-56 md:h-40 xl:h-48 mx-auto" src="{{ $article->image }}">
						<div class="mt-2 xl:mt-4">
							<h3 class="font-bold text-xl truncate-two-lines hover:text-primary transition ease-in-out duration-200">{{ $article->headline }}</h3>
							<div class="flex mt-1 text-gray-500 text-sm">
								<span>{{ $article->user->first_name }} {{ $article->user->last_name }}</span>
								<span class="mx-2">|</span>
								<span>{{ $article->created_at->diffForHumans() }}</span>
							</div>
							<p class="mt-2">
							{!! \Illuminate\Support\Str::limit($article->subheadline, $limit = 170,'...') !!}</p>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endif