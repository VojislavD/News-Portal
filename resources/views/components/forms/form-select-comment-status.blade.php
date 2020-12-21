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
		'required' => false //change later to true
	]) }}
>
	<option value="0" 
		@if(old($name) == 0)
			selected 
		@elseif($selected && $selected == 0) 
			selected
		@endif
	>
		Waiting for approval
	</option>
	<option value="1" 
		@if(old($name) == 1)
			selected 
		@elseif($selected && $selected == 1) 
			selected
		@endif
	>
		Approved
	</option>
	<option value="2" 
		@if(old($name) == 2)
			selected 
		@elseif($selected && $selected == 2) 
			selected
		@endif
	>
		Disapproved
	</option>
</select>
