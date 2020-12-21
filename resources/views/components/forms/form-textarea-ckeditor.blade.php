<div @error($name) class="border-2 border-red-600" @enderror>
	<textarea 
		{{ $attributes->merge([
			'name' => $name,
			'id' => $name,
			'class' => 'ckeditor w-full p-1 h-64 rounded focus:outline-none shadow-2xl',
			'required' => false //change later to true
		]) }}
	>{{ old($name) ?? $slot }}</textarea>
</div>