@php
$classes = ($errors->has($name) ?? false)
            ? 'w-full p-1 border-2 rounded capitalize focus:outline-none shadow-2xl border-red-600'
            : 'w-full p-1 border-2 rounded capitalize focus:outline-none shadow-2xl';
@endphp

<select 
	{{ $attributes->merge([
		'name' => $name,
		'id' => $name,
		'class' => $classes,
		'required' => true
	]) }}
>
	{{-- @foreach($items as $item)
		<option value="{{ $item->id }}">{{ $item->name }}</option>
	@endforeach  --}}
	<option value="" @if(!old($name) && !$selected) selected @endif></option>
	@foreach($items as $item)
		<option 
			value="{{ $item->id }}" 
			@if(old($name) == $item->id)
				selected 
			@elseif($selected && $selected == $item->name) 
				selected
			@endif
		>
			{{ $item->name }}
		</option>
	@endforeach 
</select>
