@php
$classes = ($errors->has($name) ?? false)
            ? 'w-full p-1 h-32 border-2 rounded focus:outline-none shadow-2xl border-red-600'
            : 'w-full p-1 h-32 border-2 rounded focus:outline-none shadow-2xl';
@endphp

<textarea 
	{{ $attributes->merge([
		'name' => $name,
		'id' => $name,
		'class' => $classes,
		'required' => true
	]) }}
>
	{{ old('name') ?? $value }}	
</textarea>