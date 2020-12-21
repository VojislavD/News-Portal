<x-master>
	<div class="w-full min-h-screen flex" x-data="{ sidebarOpen: false }">
		<x-sidebar-menu />

		<div class="w-full flex flex-col">
			<x-topbar-menu />
			
			<div class="lg:pl-64 mt-16">
				{{ $slot }}
			</div>
		</div>
	</div>
</x-master>