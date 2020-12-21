<div>
    <x-alert-success name="alertMessage" />

	<h3 class="text-2xl text-center font-bold">Users</h3>

	<div class="flex items-center justify-end mb-2 text-sm">
		<label class="mr-2 font-semibold">Sort By:</label>
		<select class="px-2 border focus:outline-none" wire:change="render" wire:model="sortBy">
			<option>Default</option>
			<option value="first_name">First Name</option>
			<option value="last_name">Last Name</option>
			<option value="email">Email</option>
			<option value="created">Created</option>
			<option value="created_desc">Created Desc</option>
		</select>
	</div>

    <table class="w-full border shadow-xl text-sm">
		<thead>
			<th class="py-2 w-12">ID</th>
			<th class="py-2">First Name</th>
			<th class="py-2">Last Name</th>
			<th class="py-2 hidden md:table-cell">Email</th>
			<th class="py-2">Created</th>
            <th class="py-2 hidden lg:table-cell">Updated</th>
			<th class="py-2 w-12"></th>
		</thead>
		<tbody>
			@forelse($users as $user)
				<tr 
                    class="text-center hover:bg-blue-200 @if($loop->index %2 == 0) bg-gray-200 @else bg-gray-100 @endif"
                    x-data="{ displayEdit: false, editUser: false, confirmDelete: false }"
                    x-on:keydown.escape.window="editUser = false"
                    @mouseenter="displayEdit=true"
                    @mouseleave="displayEdit=false"
                >
    				<td class="py-3">{{ $user->id }}</td>
    				<td class="py-3">{{ $user->first_name }}</td>
    				<td class="py-3">{{ $user->last_name }}</td>
    				<td class="py-3 hidden md:table-cell">{{ $user->email }}</td>
    				<td class="py-3">{{ $user->created_at->toFormattedDateString() }}</td>
                    <td class="py-3 hidden lg:table-cell">{{ $user->updated_at->toFormattedDateString() }}</td>
    				<td class="py-3">
                        <div x-show="displayEdit" class="flex items-center justify-center">
                            <button class="text-primary focus:outline-none" @click="editUser= true">
                                <x-svg-edit class="w-3 h-3 ml-3" />
                            </button>
                        </div>
                        <div 
                            class="fixed top-0 left-0 w-full h-full flex items-start justify-center text-base bg-black bg-opacity-50 z-50 overflow-scroll" 
                            x-show="editUser"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                        >
                            <livewire:user-edit :user="$user" :key="time().$user->id" />
                        </div>
    				</td>
    			</tr>
            @empty
                <tr>
                    <td class="text-center py-8 bg-gray-100" colspan="7">
                        There is no users.
                    </td>
                </tr>
			@endforelse
		</tbody>
	</table>
	<div class="mt-2">
		{{ $users->links() }}
	</div>
</div>
