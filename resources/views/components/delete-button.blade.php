<button 
	type="submit"
	title="Delete"
	{{ $attributes->merge(['class' => 'text-red-700 hover:text-red-800 focus:outline-none']) }}
>
	<x-svg-trash class="w-4 h-4" />
</button>