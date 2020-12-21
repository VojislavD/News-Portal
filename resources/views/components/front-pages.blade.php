<x-master>
	<x-main-nav />

	<div class="container mx-auto max-w-7xl">
		@if(Request::is('/'))
			<x-front-header />

			<a href="#">
				<img src="https://via.placeholder.com/1280x120">
			</a>
		@endif

		<div class="flex flex-col lg:flex-row mx-4 md:mx-0 pt-12">
			<div class="w-full lg:w-3/4 mr-4">
				{{ $slot }}
			</div>
			<div class="w-1/4 hidden lg:block">
				<x-sidebar />
			</div>
		</div>
	</div>

	<x-front.footer />

</x-master>