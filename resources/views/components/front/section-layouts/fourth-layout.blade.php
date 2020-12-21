<div class="my-24">
	<div class="w-full bg-primary text-white">
		<a href="#" class="block w-32 py-2 bg-secondary text-center font-bold">Fourth Layout</a>
	</div>

	<div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 mt-4">
		@foreach($articles as $article)
			<div>
				<a 
					href="{{ route('front.article', $article->id) }}" 
					class="w-2/3 md:w-full h-56 sm:h-64 block mx-auto black-overlay-on-hover relative"
					title="{{ $article->headline }}" 
				>
					<img class="w-full h-full" src="{{ $article->image }}">
				</a>
				<a 
					href="{{ route('front.article', $article->id) }}" 
					class="text-xl sm:text-2xl font-bold truncate-two-lines my-2 hover:underline"
					title="{{ $article->headline }}" 
				>
					{{ $article->headline }}
				</a>
				<p class="mb-2">{!! \Illuminate\Support\Str::limit($article->subheadline, $limit = 300,'...') !!}</p>
				<a 
					href="{{ route('front.article', $article->id) }}" 
					class="text-sm text-gray-500 hover:text-gray-800 transition ease-in-out duration-200"
					title="{{ $article->headline }}" 
				>
					{{ $article->user->first_name }} {{ $article->user->last_name }} - {{ $article->created_at->diffForHumans() }} - {{ $article->comments->count() }} comments
				</a>
			</div>
		@endforeach
	</div>
</div>