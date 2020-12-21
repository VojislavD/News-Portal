<div class="mt-8 px-4 md:px-16 w-full xl:w-2/3">

    <x-alert-success name="alertMessage" />

	<h2 class="text-2xl font-bold mb-4">Create New User</h2>

	<form class="flex flex-col" id="editProfileForm" wire:submit.prevent="store">
		<div class="flex flex-col my-2">
			<x-form-label for="first_name">First Name</x-label>
			<x-form-input type="text" name="first_name" wire:model.debounce.500ms="first_name" />
			<x-form-error-message name="first_name" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="last_name">Last Name</x-label>
			<x-form-input type="text" name="last_name" wire:model.debounce.500ms="last_name" />
			<x-form-error-message name="last_name" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="email">Email Address</x-label>
			<x-form-input type="email" name="email" wire:model.debounce.500ms="email" />
			<x-form-error-message name="email" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="password">Password</x-label>
			<x-form-input type="password" name="password" wire:model.debounce.500ms="password" />
			<x-form-error-message name="password" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-label for="password_confirmation">Confirm Password</x-label>
			<x-form-input type="password" name="password_confirmation" wire:model.debounce.500ms="password_confirmation" />
		</div>

		<div class="flex justify-end my-2">
			<x-form-submit-button value="Save" />
		</div>
	</form>
</div>