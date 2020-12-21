<div class="w-full lg:pl-64 fixed h-16 flex items-center justify-between bg-gray-200 border-b-4 border-primary z-40">
	<button @click="sidebarOpen = true" class="text-gray-500 ml-8 focus:outline-none lg:hidden">
		<svg class="h-6 w-6 hover:text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"></path>
        </svg>
    </button>

	<livewire:search-dropdown />
	
	<div class="relative flex flex-col" x-data="{ profileMenuOpen: false }">
		<p 
			class="cursor-pointer mr-4 bg-primary text-white px-4 py-1 rounded hover:text-secondary" 
			@click=" profileMenuOpen = !profileMenuOpen "
		>
			{{ auth()->user()->first_name }}
		</p>
		<div 
			class="absolute right-0 top-0 mt-12 mr-8 w-32 pt-2 bg-white rounded shadow-2xl border text-sm z-10"
			x-show=" profileMenuOpen "
			@click.away=" profileMenuOpen = false "
			x-transition:enter="transition ease-out duration-300"
		    x-transition:enter-start="opacity-0 transform -translate-y-4 scale-90"
		    x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
		    x-transition:leave="transition ease-in duration-150"
		    x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
		    x-transition:leave-end="opacity-0 transform  -translate-y-4 scale-90"
		>
			<a 
				href="{{ route('admin.profile') }}" 
				class="block font-semibold py-2 px-4 my-2 hover:bg-gray-100"
				@click=" profileMenuOpen = false "
			>
				Profile
			</a>
			<form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="block w-full text-left font-semibold py-2 px-4 my-2 hover:bg-gray-100 focus:outline-none" @click=" profileMenuOpen = false ">
                    {{ __('Logout') }}
                </button>
            </form>
		</div>
	</div>
</div>