<x-front-pages>
	<div class="w-full flex items-center">
		<h2 class="min-w-max text-xl font-bold mb-2 -mt-10 px-4 capitalize bg-secondary text-white text-center">Latest</h2>
	</div>

	<div class="w-full grid grid-cols-3">
		@foreach($articles as $article)
			<a href="{{ route('front.article', $article->id) }}" class="block h-112 p-4 overflow-hidden shadow-2xl relative mb-4 mx-2">
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
</x-front-pages>