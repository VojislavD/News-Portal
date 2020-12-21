<x-back-pages>
	<div class="mt-8 pb-8 px-4 md:px-16 w-full xl:w-2/3">
	    <x-alert-success name="alertMessage" />

	    <div class="flex items-center justify-between">
			<h2 class="text-2xl font-bold">Edit Article</h2>
			<a href="{{ route('front.article', $article->id) }}" class="text-sm font-semibold bg-primary hover:underline text-white py-1 px-3">View Article</a>
		</div>
		
		<livewire:article-edit :article="$article" />
	</div>
</x-back-pages>

