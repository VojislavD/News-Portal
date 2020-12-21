@if (session($name))
	<div 
		class="alert fixed right-8 bottom-8 px-2 py-4 w-64 text-white text-center rounded-lg bg-green-500 z-40" 
>
		<p>	
			{{ session($name) }}
		</p>
	</div>

<script type="text/javascript">
	$(".alert").fadeTo(3000, 500).slideUp(500, function(){
   		$(".alert").slideUp(500);
	});
</script>

@endif