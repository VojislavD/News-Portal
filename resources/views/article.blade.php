<x-front-pages>
	@if(!empty($article))
		<div class="mr-4">
			<h1 class="text-4xl font-bold leading-10 mb-4 mt-4 lg:mt-0">{{ $article->headline }}</h1>
			<div class="flex items-center justify-between mb-4">
				<div class="flex items-center">
					<a href="{{ route('front.category', $article->category->name) }}" class="font-bold text-primary capitalize hover:underline">{{ $article->category->name }}</a>
					<span class="mx-2">|</span>
					<div class="text-xs flex items-center text-gray-500">
						<span class="mr-3 flex items-center justify-center">
							<x-svg-user class="w-3 h-3 mr-1 text-black" />
							<span class="mt-1">{{ $article->user->first_name }} {{ $article->user->last_name }}</span>
						</span>
						<span  class="mr-3 flex items-center justify-center">
							<x-svg-calendar class="w-3 h-3 mr-1 text-black" />
							<span class="mt-1">{{ $article->created_at->toFormattedDateString() }}</span>
						</span>
						<span  class="mr-3 flex items-center justify-center">
							<x-svg-comments class="w-3 h-3 mr-1 text-black" />
							<span class="mt-1">{{ $article->countApprovedComments() }}</span>
						</span>
						<span class="flex items-center justify-center">
							<x-svg-view class="w-3 h-3 mr-1 text-black" />
							<span class="mt-1">{{ $article->views }}</span>
						</span>
					</div>
				</div>
				@auth
					@if(Gate::allows('update-article', $article))
						<a href="{{ route('admin.articles.edit', $article->id) }}" class="mr-4 bg-primary hover:underline text-white py-1 px-3 rounded text-sm flex items-center justify-center">
							<x-svg-edit class="w-3 h-3 mr-2" />
							Edit
						</a>
					@endif
				@endauth
			</div>
			<p class="font-bold my-4">{{ $article->subheadline }}</p>
			<img class="mx-auto mb-4" src="{{ $article->image }}">
			<p class="text-xl mb-8">{!! $article->body !!}</p>

			<div class="flex justify-end mr-4">
				<ul class="flex items-center">
					<p class="text-sm font-bold mx-4">Share:</p>
					<li class="mr-2">
						<div class="fb-share-button mb-1" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
					</li>
					<li class="mr-2">
						<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</li>
				</ul>
			</div>

			<div class="mt-8 border-t py-4">
				<h3 class="text-xl font-bold mb-2">Tags:</h3>
				@forelse($article->tags as $tag)
					<a href="{{ route('front.tag', $tag->name) }}" class="inline-block bg-primary px-3 py-1 text-white rounded mr-2 my-1 uppercase text-sm hover:text-secondary transition ease-in-out duration-150">{{ $tag->name }}</a>
				@empty
					<p class="text-sm">There is no tags for this article.</p>
				@endforelse
			</div>
		</div>

		<div class="border-t py-4">
			<h3 class="text-xl font-bold mb-2">Recommended:</h3>
			<div class="flex flex-col md:flex-row">
				@foreach($recommendedArticles as $recommendedArticle)
					<a href="{{ route('front.article', $recommendedArticle->id) }}" class="block w-2/3 md:w-1/4 h-56 mx-auto md:mx-2 mt-2 md:mt-0" title="{{ $recommendedArticle->headline }}">
						<div class="black-overlay-on-hover relative">
							<img class="w-full h-40" src="{{ $recommendedArticle->image }}">
						</div>
						<p class="font-semibold mt-2 truncate-two-lines hover:underline">{{ $recommendedArticle->headline }}</p>
					</a>
				@endforeach
			</div>
		</div>

		<livewire:leave-comment :article="$article" />
		
		<div class="py-4" id="startComments" x-data="{ showAllComments: false }">
			<h3 class="text-2xl font-bold mb-2 flex items-center">
				<x-svg-comments class="w-8 h-8 mr-2" />
				<span>Comments ({{ $article->countApprovedComments() }})</span>
			</h3>

			@forelse($article->getApprovedComments() as $comment)
				@if($loop->index < 5)
					<livewire:comment-card :comment="$comment" />
				@else
					<div 
						x-show="showAllComments"
						x-transition:enter="transition ease-out duration-500"
						x-transition:enter-start="opacity-0 transform -translate-y-full"
						x-transition:enter-end="opacity-100 transform scale-100"
						x-transition:leave="transition ease-in duration-500"
						x-transition:leave-start="opacity-100 transform translate-y-0"
						x-transition:leave-end="opacity-0 transform -translate-y-full"
					>
						<livewire:comment-card :comment="$comment" />					
					</div>
				@endif
			@empty
				<p class="text-sm m-4">There is no comments for this article yet.</p>
			@endforelse
			

			@if($article->countApprovedComments() > 5)
				<div class="flex items-center justify-center mt-8">
					<a href="#lastPopularComment" 
						class="bg-primary py-2 px-4 text-white rounded text-sm" 
						x-show="!showAllComments" 
						@click="showAllComments = true"
					>
						Show All Comments ({{ $article->countApprovedComments()-5 }} more)
					</a>

					<a href="#startComments" 
						class="bg-primary py-2 px-4 text-white rounded text-sm" 
						x-show="showAllComments" 
						@click="showAllComments = false"
					>
						Hide Others Comments ({{ $article->countApprovedComments()-5 }})
					</a>
				</div>
			@endif
		</div>
	@else
		{{ abort(404) }}
	@endif

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="VNG6KtCt"></script>

</x-front-pages>