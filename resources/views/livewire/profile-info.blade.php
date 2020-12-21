<div class="mt-8 px-4 md:px-16 w-full xl:w-2/3" x-data="{ editProfile: @entangle('allowEdit') }">

    <x-alert-success name="alertMessage" />

	<h2 class="text-2xl font-bold mb-4">Edit Profile Information</h2>

	<form class="flex flex-col" id="editProfileForm" wire:submit.prevent="update">
		<div class="flex flex-col my-2">
			<x-form-label for="first_name">First Name</x-label>
			@if($allowEdit)
				<x-form-input type="text" name="first_name" wire:model.debounce.500ms="first_name" />
			@else
				<x-form-input type="text" name="first_name" wire:model.debounce.500ms="first_name" class="text-gray-500" disabled />
			@endif
			<x-form-error-message name="first_name" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="last_name">Last Name</x-label>
			@if($allowEdit)
				<x-form-input type="text" name="last_name" wire:model.debounce.500ms="last_name" />
			@else
				<x-form-input type="text" name="last_name" wire:model.debounce.500ms="last_name" class="text-gray-500" disabled />
			@endif
			<x-form-error-message name="last_name" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="email">Email Address</x-label>
			@if($allowEdit)
				<x-form-input type="email" name="email" wire:model.debounce.500ms="email" />
			@else
				<x-form-input type="email" name="email" wire:model.debounce.500ms="email" class="text-gray-500" disabled />
			@endif
			<x-form-error-message name="email" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="password">Password</x-label>
			@if($allowEdit)
				<input type="password" name="password" id="password" value="{{ old('name') }}" class="w-full p-1 border-2 rounded focus:outline-none shadow-2xl @error('password') border-red-600 @enderror" placeholder="Leave blank to keep old password" wire:model.debounce.500ms="password">
			@else
				<input type="password" name="password" id="password" value="{{ old('name') }}" class="w-full p-1 border-2 rounded focus:outline-none shadow-2xl @error('password') border-red-600 @enderror" placeholder="Leave blank to keep old password" wire:model.debounce.500ms="password" disabled>
			@endif
			<x-form-error-message name="password" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="password_confirmation">Confirm Password</x-label>
			@if($allowEdit)
				<x-form-input type="password" name="password_confirmation" wire:model.debounce.500ms="password_confirmation" />
			@else
				<x-form-input type="password" name="password_confirmation" wire:model.debounce.500ms="password_confirmation" class="text-gray-500" disabled />
			@endif
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="current_password">Confirm Current Password</x-label>
			@if($allowEdit)
				<x-form-input type="password" name="current_password" wire:model.debounce.500ms="current_password" />
			@else
				<x-form-input type="password" name="current_password" wire:model.debounce.500ms="current_password" class="text-gray-500" disabled />
			@endif
			<x-form-error-message name="current_password" />
		</div>
	</form>

	<div class="flex justify-end my-2">
		@if(!$allowEdit)
			<x-edit-button value="Edit" wire:click="edit" />
		@else
			<button class="px-6 py-1 bg-gray-300 hover:bg-gray-400 border border-primary rounded mr-4 focus:outline-none" wire:click="edit">
				Cancel
			</button>
			<x-form-submit-button value="Save" form="editProfileForm" />
		@endif
	</div>
</div>