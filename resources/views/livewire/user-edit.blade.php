<div
	class="relative w-3/4 lg:w-1/2 min-h-80 bg-white my-12" 
	@click.away="editUser = false"
	x-on:keydown.escape.window="editUser = false"
>
	<x-alert-success name="alertMessage" />

	<h1 class="bg-primary py-4 text-white text-center font-bold">Edit User</h1>
	<button 
		class="absolute right-3 top-2 text-2xl focus:outline-none text-white hover:text-red-600"
		@click="editUser = false"
	>
		&times;
	</button>

	<form class="mt-6 px-8 lg:px-24 pb-4" x-on:submit="editUser = false" wire:submit.prevent="update">
		<div class="flex flex-col justify-start my-3 text-left">
			<x-form-label for="first_name">First Name</x-form-label>
			<x-form-input type="text" name="first_name" wire:model.debounce.500ms="first_name" />
			<x-form-error-message name="first_name" />
		</div>
		<div class="flex flex-col justify-start my-3 text-left">
			<x-form-label for="last_name">Last Name</x-form-label>
			<x-form-input type="text" name="last_name" wire:model.debounce.500ms="last_name" />
			<x-form-error-message name="last_name" />
		</div>
		<div class="flex flex-col justify-start my-3 text-left">
			<x-form-label for="email">Email</x-form-label>
			<x-form-input type="email" name="email" wire:model.debounce.500ms="email" />
			<x-form-error-message name="email" />
		</div>
		<div class="flex flex-col justify-start my-3 text-left">
			<x-form-label for="password">New Password</x-form-label>
			<input type="password" name="password" id="password" value="{{ old('name') }}" class="w-full p-1 border-2 rounded focus:outline-none shadow-2xl @error('password') border-red-600 @enderror" placeholder="Leave blank to keep old password" wire:model.debounce.500ms="password">
			<x-form-error-message name="password" />
		</div>
		<div class="flex flex-col justify-start my-3 text-left">
			<x-form-label for="password_confirmation">Confirm New Password</x-form-label>
			<x-form-input type="password" name="password_confirmation" wire:model.debounce.500ms="password_confirmation" />
			<x-form-error-message name="password_confirmation" />
		</div>
		<div class="flex flex-col justify-start mt-6 mb-3 text-left">
			<x-form-label for="current_password">Confirm Current Password</x-form-label>
			<x-form-input type="password" name="current_password" wire:model.debounce.500ms="current_password" />
			<x-form-error-message name="current_password" />
		</div>

		<div class="mt-4 flex justify-end">
			@if(
				$errors->has('first_name') || empty($first_name) ||
				$errors->has('last_name') || empty($last_name) ||
				$errors->has('email') || empty($email) ||
				$errors->has('password') ||
				$errors->has('current_password') || empty($current_password)
			)
				<x-form-submit-button value="Update" class="bg-red-500" disabled />
			@else
				<x-form-submit-button value="Update" />
			@endif
		</div>
	</form>

	<div class="my-4 px-8 lg:px-24 w-full flex justify-start">
		<button class="flex items-center text-secondary hover:underline focus:outline-none" @click="confirmDelete = true">
			<x-svg-trash class="w-4 h-4 mr-2" />
			Delete user
		</button>
	</div>
	
	<form 
		class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3/4 md:w-1/2 bg-gray-300 text-sm md:text-base"
		x-show="confirmDelete"
		x-transition:enter="transition ease-out duration-300"
		x-transition:enter-start="opacity-0"
		x-transition:enter-end="opacity-100"
		x-transition:leave="transition ease-in duration-300"
		x-transition:leave-start="opacity-100"
		x-transition:leave-end="opacity-0"
		wire:ignore
		wire:submit.prevent="destroy" 
		x-on:submit="editUser = false"
	>
		<p class="bg-primary text-white py-2">Delete User</p>
		<button 
			class="absolute right-2 top-1 text-xl focus:outline-none text-white hover:text-red-600"
			@click.submit.prevent="confirmDelete = false"
		>
			&times;
		</button>
		<div class="p-4">
			<p>By deleting user all articles that he created will also be deleted.</p>
			<p class="my-3">Are you sure you want to delete user?</p>
			<x-form-button-yes />
			<x-form-button-no @click.submit.prevent="confirmDelete = false" />
		</div>
	</form>
</div>