@if($articles->isNotEmpty())
	<div class="my-24">
		<div class="w-full bg-primary text-white">
			<a href="#" class="block w-32 py-2 bg-secondary text-center font-bold">Fifth Layout</a>
		</div>

		<div>
			@foreach($articles as $article)
				<div class="flex flex-col md:flex-row my-8">
					<a 
						href="{{ route('front.article', $article->id) }}" 
						class="w-full md:w-1/2 xl:w-1/3 block md:mr-4 black-overlay-on-hover relative"
						title="{{ $article->headline }}" 
					>
						<img class="w-full h-full" src="{{ $article->image }}">
					</a>
					<div class="w-full md:w-2/3 flex flex-col md:ml-4">
						<a 
							href="{{ route('front.article', $article->id) }}" 
							class="text-xl xl:text-2xl mt-2 md:mt-0 font-bold truncate-two-lines hover:text-primary hover:underline transition ease-in-out duration-100"
							title="{{ $article->headline }}" 
						>
							{{ $article->headline }}
						</a>
						<p class="my-2">{!! \Illuminate\Support\Str::limit($article->subheadline, $limit = 400,'...') !!}</p>
						<a 
							href="{{ route('front.article', $article->id) }}" 
							class="text-sm text-gray-500 hover:text-gray-700 transition ease-in-out duration-100"
							title="{{ $article->headline }}" 
						>
							{{ $article->user->first_name }} {{ $article->user->last_name }} - {{ $article->created_at->diffForHumans() }} - {{ $article->comments->count() }} comments
						</a>
					</div>
				</div>
			@endforeach

			<div class="flex justify-center mt-16">
				<button wire:click="load" class="text-white text-center w-40 py-2 bg-primary rounded transform hover:scale-105 transition ease-in-out duration-500 flex items-center justify-center focus:outline-none">
					<x-svg-loader class="w-4 h-4 mr-2" wire:loading />
					Load More
				</button>
			</div>
		</div>
	</div>
@endif