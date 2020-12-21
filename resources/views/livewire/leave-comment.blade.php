<div class="border-t py-4">
	<h3 class="text-2xl font-bold mb-2">Leave A Comment:</h3>

    <x-alert-success name='commentCreated' />

	<form class="flex flex-col mr-4"  wire:submit.prevent="submit">
		<div class="flex flex-col my-2">
			<x-form-input type="text" name="name" placeholder="Name" wire:model.lazy="name" />
			<x-form-error-message name="name" />
		</div>

		<div class="flex flex-col my-2">
			<x-form-textarea name="body" placeholder="Your comment" wire:model.lazy="body"></x-form-textarea>
			<x-form-error-message name="body" />
		</div>
		
		<x-form-submit-button class="w-24" value="Send" />
	</form>
</div>
