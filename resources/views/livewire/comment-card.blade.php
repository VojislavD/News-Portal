<div class="border px-4 py-2 bg-white">
	<div class="flex items-center justify-between">
		<span class="text-lg font-bold">{{ $comment->name }}</span>
		<span class="text-sm">{{ $comment->created_at->isoFormat('MMMM Do YYYY, h:mm a') }}</span>
	</div>
	<p class="mt-2">{{ $comment->body }}</p>
	<div class="flex items-center justify-end mt-4">
		<form wire:submit.prevent="like">
			<button class="cursor-pointer focus:outline-none">
				<x-svg-like class="w-4 h-4 mr-1" />
			</button>
		</form>
		<span class="mr-4">{{ $comment->likes }}</span>
		<form wire:submit.prevent="dislike">
			<button class="cursor-pointer focus:outline-none">
				<x-svg-dislike class="w-4 h-4 mr-1" />
			</button>
		</form>
		<span class="mr-4">{{ $comment->dislikes }}</span>
	</div>
</div>
