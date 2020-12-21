<button 
	title="Edit" 
	{{ $attributes->merge(['class' => 'flex items-center justify-center bg-yellow-400 text-white py-1 px-6 rounded focus:outline-none']) }}
>
	<x-svg-edit class="w-3 h-3 mr-2" />
	{{ $value ?? $value }}
</button>