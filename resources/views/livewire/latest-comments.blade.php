<div>
    <x-alert-success name="alertMessage" />

    <table class="w-full border shadow-xl text-sm">
		<caption class="text-2xl font-bold py-4">Latest Comments</caption>
		<thead>
			<th class="py-2 hidden xl:table-cell">Article</th>
			<th class="py-2">Name</th>
			<th class="py-2">Message</th>
			<th class="py-2 hidden xl:table-cell">Created</th>
			<th class="py-2 hidden lg:table-cell px-1">Likes</th>
			<th class="py-2 hidden lg:table-cell px-1">Dislikes</th>
			<th class="py-2 px-1">Status</th>
			<th class="w-12 py-2"></th>
		</thead>
		<tbody>
			@forelse($comments as $comment)
				<tr 
                    class="text-center hover:bg-blue-200 @if($loop->index %2 == 0) bg-gray-200 @else bg-gray-100 @endif"
                    x-data="{ displayEdit: false, editComment: false, confirmDelete: false }"
                    x-on:keydown.escape.window="editComment = false"
                    @mouseenter="displayEdit=true"
                    @mouseleave="displayEdit=false"
                >
    				<td class="py-3 hidden xl:table-cell">
                        <a href="{{ route('front.article', $comment->article->id) }}" class="hover:underline" target="_blank">
                            {{ \Illuminate\Support\Str::limit($comment->article->headline, $limit = 20,'...') }}</td>
                        </a>
    				<td class="py-3">{{ $comment->name }}</td>
    				<td class="py-3">{{ \Illuminate\Support\Str::limit($comment->body, $limit = 60,'...') }}</td>
    				<td class="py-3 hidden xl:table-cell">{{ $comment->created_at }}</td>
    				<td class="py-3 hidden lg:table-cell">{{ $comment->likes }}</td>
    				<td class="py-3 hidden lg:table-cell">{{ $comment->dislikes }}</td>
    				<td class="py-3">{{ $comment->translateStatus() }}</td>
    				<td class="py-3">
                        @if(Gate::allows('update-comment', $comment))
                            <div x-show="displayEdit">
                                <button @click="editComment= true" class="text-primary focus:outline-none">
                                    <x-svg-edit class="w-3 h-3 ml-3" />
                                </button>
                            </div>
                            <div 
                                class="fixed top-0 left-0 w-full h-full flex items-center justify-center text-base bg-black bg-opacity-50 z-50 " 
                                x-show="editComment"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                            >
                                <livewire:comment-edit :comment="$comment" :key="time().$comment->id" />
                            </div>
                        @endif
    				</td>
    			</tr>
            @empty
                <tr>
                    <td class="text-center py-8 bg-gray-100" colspan="8">
                        There is no comments.
                    </td>
                </tr>
			@endforelse
		</tbody>
	</table>

	<div class="mt-2">
		{{ $comments->links() }}
	</div>
    
</div>
