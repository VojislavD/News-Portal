<div class="transition ease-in-out duration-500">
	<div class="flex mb-3 text-sm">
		<p class="mr-2">Change selected to</p>
		<select wire:change="updateSelected" wire:model="newStatus" class="border">
			<option></option>
			@if($pageName == 'approval' || $pageName == 'disapproved'))
				<option value="1">Approve</option>
			@endif

			@if($pageName == 'approval' || $pageName == 'approved'))
				<option value="2">Disapprove</option>
			@endif

			<option value="3">Delete</option>
		</select>
	</div>
	
	<ul>
		@forelse($comments as $comment)
			<x-alert-success name="alertMessage" />
			
			<li 
				class="bg-white flex items-center p-4 my-2 rounded-lg shadow-2xl" 
				x-data="{ editComment: false, confirmDelete: false }"
                x-on:keydown.escape.window="editComment = false"
			>
				<input type="checkbox" class="mr-8" wire:model="selectedComments.{{ $comment->id }}">

				<div class="flex-1">
					<div class="flex items-center justify-between mb-4">
						<p class="font-bold">{{ $comment->name }}</p>
						<p class="italic">{{ $comment->created_at }}</p>
					</div>
					<p class="mb-4">{{ $comment->body }}</p>

					<div class="flex justify-between text-white text-sm">
						<div class="flex">
							@if($pageName == 'approval' || $pageName == 'disapproved'))
								<form class="mx-2" wire:submit.prevent="approve({{ $comment }})">
									<button class="py-1 px-3 bg-green-600 hover:bg-green-700 rounded">Approve</button>
								</form>
							@endif

							@if($pageName == 'approval' || $pageName == 'approved'))
								<form class="mx-2" wire:submit.prevent="disapprove({{ $comment }})">
									<button class="py-1 px-3 bg-red-600 hover:bg-red-700 rounded">Disapprove</button>
								</form>
							@endif
						</div>

						<div class="flex">
							<button class="px-3 text-white bg-yellow-400 hover:bg-yellow-500 rounded focus:outline-none" @click="editComment= true">
								<x-svg-edit class="w-3 h-3 " />
							</button>
							<form class="mx-2" wire:submit.prevent="destroy({{ $comment }})">
								<x-form-delete-button name="submit" value="delete" />
							</form>
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
					</div>
				</div>
			</li>
		@empty
			<p class="font-semibold my-8">There is no comments for approval.</p>		
		@endforelse
	</ul>

	<div class="flex mb-3 text-sm">
		<p class="mr-2">Change selected to</p>
		<select wire:change="updateSelected" wire:model="newStatus" class="border">
			<option></option>
			@if($pageName == 'approval' || $pageName == 'disapproved'))
				<option value="1">Approve</option>
			@endif

			@if($pageName == 'approval' || $pageName == 'approved'))
				<option value="2">Disapprove</option>
			@endif

			<option value="3">Delete</option>
		</select>
	</div>

	{{ $comments->links() }}

</div>