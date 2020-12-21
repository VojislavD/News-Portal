<button 
	type="submit" 
	name="$name" 
	value="$value" 
	{{ $attributes->merge(['class' => 'h-7 px-3 bg-red-700 hover:bg-red-800 rounded']) }}
>
	<x-svg-trash class="w-3 h-3" />
</button>