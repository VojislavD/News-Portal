@php
$classes = ($errors->has($name) ?? false)
            ? 'w-full p-1 border-2 rounded focus:outline-none shadow-2xl border-red-600'
            : 'w-full p-1 border-2 rounded focus:outline-none shadow-2xl';
@endphp

<input 
	{{ $attributes->merge([
		'type' => 'file',
		'name' => $name,
		'id' => $name,
		'class' => $classes,
		'value' => old($name) ?? $value,
		'required' => $required
	]) }}
>
