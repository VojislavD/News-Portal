<div
	class="relative w-3/4 lg:w-1/2 min-h-80 bg-white my-12" 
	@click.away="viewArticle = false"
>
	<x-alert-success name="alertMessage" />

	<h1 class="bg-primary py-4 text-white text-center font-bold">Article</h1>
	<button 
		class="absolute right-3 top-2 text-2xl focus:outline-none text-white hover:text-red-600"
		@click="viewArticle = false"
	>
		&times;
	</button>

	<div class="mt-6 px-8 lg:px-24 pb-4">
		<h3 class="text-xl text-left font-bold mb-2">{{ $article->headline }}</h3>
		<div class="flex items-center">
			<a href="{{ route('front.category', $article->category->name) }}" class="font-bold text-primary text-sm capitalize hover:underline">{{ $article->category->name }}</a>
			<span class="mx-2">|</span>
			<div class="text-xs flex items-center text-gray-500">
				<p class="mr-3 flex items-center justify-center">
					<x-svg-user class="w-3 h-3 mr-1 text-black" />
					<span class="mt-1">{{ $article->user->first_name }} {{ $article->user->last_name }}</span>
				</p>
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
		<p class="font-bold my-4 text-left">{{ $article->subheadline }}</p>
		<img class="mx-auto mb-4 w-1/2" src="{{ $article->image }}">
		<p class="text-left mb-8">{!! $article->body !!}</p>
		
		@if(Gate::allows('update-article', $article))
			<div class="flex justify-end">
				<a href="{{ route('admin.articles.edit', $article->id) }}">
					<x-edit-button value="Edit" />
				</a>
			</div>
		@endif
	</div>

	@if(Gate::allows('update-article', $article))
		<div class="my-4 px-8 lg:px-24 w-full flex justify-start">
			<button class="flex items-center text-secondary hover:underline focus:outline-none" @click="confirmDelete= true">
				<x-svg-trash class="w-4 h-4 mr-2" />
				Delete article
			</button>
		</div>
	@endif

	<form 
		class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3/4 md:w-1/2 bg-gray-300 text-sm md:text-base"
		x-show="confirmDelete"
		x-transition:enter="transition ease-out duration-300"
		x-transition:enter-start="opacity-0"
		x-transition:enter-end="opacity-100"
		x-transition:leave="transition ease-in duration-300"
		x-transition:leave-start="opacity-100"
		x-transition:leave-end="opacity-0"
		wire:submit.prevent="destroy" 
		x-on:submit="viewArticle = false"
	>
		<p class="bg-primary text-white py-2">Delete Article</p>
		<button 
			class="absolute right-2 top-1 text-xl focus:outline-none text-white hover:text-red-600"
			@click.submit.prevent="confirmDelete = false"
		>
			&times;
		</button>
		<div class="p-4">
			<p>By deleting article all comments that belongs to this article will alo be deleted.</p>
			<p class="my-3">Are you sure you want to delete article?</p>
			<x-form-button-yes />
			<x-form-button-no @click.submit.prevent="confirmDelete = false" />
		</div>
	</form>
</div>
