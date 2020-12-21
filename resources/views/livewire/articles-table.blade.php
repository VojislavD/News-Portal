<div>
    <x-alert-success name="alertMessage" />

	
	<h3 class="text-2xl text-center font-bold">Articles</h3>
	<div class="flex items-center justify-end mb-2 text-sm">
		<label class="mr-2 font-semibold">Sort By:</label>
		<select class="px-2 border focus:outline-none" wire:change="render" wire:model="sortBy">
			<option>Default</option>
			<option value="created">Created</option>
			<option value="created_desc">Created Desc</option>
			<option value="views">Views</option>
			<option value="views_desc">Views Desc</option>
			<option value="comments">Comments</option>
			<option value="comments_desc">Comments Desc</option>
		</select>
	</div>
    <table class="w-full border shadow-xl text-sm">
		<thead>
			<th class="py-2 w-12 hidden lg:table-cell">ID</th>
			<th class="py-2 hidden lg:table-cell">Author</th>
			<th class="py-2">Headline</th>
			<th class="py-2 hidden md:table-cell">Created</th>
			<th class="py-2 px-1">Views</th>
			<th class="py-2 ">Comments</th>
			<th class="py-2 w-12"></th>
		</thead>
		<tbody>
			@forelse($articles as $article)
				<tr 
                    class="text-center hover:bg-blue-200 @if($loop->index %2 == 0) bg-gray-200 @else bg-gray-100 @endif"
                    x-data="{ displayEdit: false, viewArticle: false, confirmDelete: false }"
                    x-on:keydown.escape.window="viewArticle = false"
                    @mouseenter="displayEdit=true"
                    @mouseleave="displayEdit=false"
                >
    				<td class="py-3 hidden lg:table-cell">{{ $article->id }}</td>
    				<td class="py-3 hidden lg:table-cell">{{ $article->user->first_name }} {{ $article->user->last_name }}</td>
    				<td class="py-3">{{ \Illuminate\Support\Str::limit($article->headline, $limit = 70,'...') }}</td>
    				<td class="py-3 hidden md:table-cell">{{ $article->created_at }}</td>
    				<td class="py-3">{{ $article->views }}</td>
    				<td class="py-3">{{ $article->comments->count() }}</td>
    				<td class="py-3">
                        <div x-show="displayEdit" class="flex items-center justify-center">
                            <button class="text-primary focus:outline-none" @click="viewArticle= true">
                                <x-svg-view class="w-3 h-3" />
                            </button>
                            @if(Gate::allows('update-article', $article))
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="text-primary focus:outline-none">
                                    <x-svg-edit class="w-3 h-3 ml-3" />
                                </a>
                            @endif
                        </div>
                        <div 
                            class="fixed top-0 left-0 w-full h-full flex items-start justify-center text-base bg-black bg-opacity-50 z-50 overflow-scroll" 
                            x-show="viewArticle"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                        >
                            <livewire:article-view :article="$article" :key="time().$article->id" />
                        </div>
    				</td>
    			</tr>
            @empty
                <tr>
                    <td class="text-center py-8 bg-gray-100" colspan="7">
                        There is no articles.
                    </td>
                </tr>
			@endforelse
		</tbody>
	</table>
	<div class="mt-2">
		{{ $articles->links() }}
	</div>
</div>
