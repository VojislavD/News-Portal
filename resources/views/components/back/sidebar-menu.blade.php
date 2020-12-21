<div 
	class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"
	:class="sidebarOpen ? 'block' : 'hidden'" 
	@click="sidebarOpen = false" 
></div>

<div 
	class="w-64 h-screen fixed bg-primary text-white inset-y-0 z-50 left-0 transition duration-300 transform overflow-y-auto lg:translate-x-0 lg:inset-0" 
	:class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
>
	<a class="block h-16 flex items-center justify-center text-2xl font-bold" href="{{ route('dashboard') }}">Dashboard</a>
	<ul class="mt-4 font-semibold">
		<li class="text-center">
			<a 
				href="{{ route('dashboard') }}"
				class="block py-2 hover:bg-black hover:bg-opacity-30 @if(url()->current() == route('dashboard')) bg-black bg-opacity-40 @endif" 
			>
				Home
			</a>
		</li>
		<li 
			class="text-center hover:bg-black hover:bg-opacity-30 @if(url()->current() == route('admin.articles.index') || url()->current() == route('admin.articles.create')) bg-black bg-opacity-40 @endif" 
			x-data="{ submenuOpen: false }"
		>
			<div class="flex items-center justify-center">
				<a 
					href="{{ route('admin.articles.index') }}" 
					class="block py-2 mr-2" 
					@click=" sidebarOpen=false "
				>
					Articles
					
				</a>
				<span @click="submenuOpen= !submenuOpen" class="cursor-pointer transition duration-150" :class="{ 'transform rotate-180': submenuOpen }">
					<x-svg-arrow-down class="w-3 h-3" />
				</span>
			</div>
			<div class="bg-black bg-opacity-50 text-white text-sm" x-show="submenuOpen">
				<ul>
					<li class="hover:bg-gray-800 hover:bg-opacity-40 py-2">
						<a href="{{ route('admin.articles.create') }}" >Create New</a>
					</li>
				</ul>
			</div>
		</li>
		<li 
			class="text-center hover:bg-black hover:bg-opacity-30 @if(url()->current() == route('admin.comments.index') || url()->current() == route('admin.comments.approved') || url()->current() == route('admin.comments.disapproved')) bg-black bg-opacity-40 @endif" 
			x-data="{ submenuOpen: false }"
		>
			<div class="flex items-center justify-center">
				<a 
					href="{{ route('admin.comments.index') }}"
					class="block py-2 mr-2" 
					@click=" sidebarOpen=false "
				>
					Comments
				</a>
				<span @click="submenuOpen= !submenuOpen" class="cursor-pointer transition duration-150" :class="{ 'transform rotate-180': submenuOpen }">
					<x-svg-arrow-down class="w-3 h-3" />
				</span>
			</div>
			<div class="bg-black bg-opacity-50 text-white text-sm" x-show="submenuOpen">
				<ul>
					<li class="hover:bg-gray-800 hover:bg-opacity-40 py-2">
						<a href="{{ route('admin.comments.approved') }}" >Approved Comments</a>
					</li>
					<li class="hover:bg-gray-800 hover:bg-opacity-40 py-2">
						<a href="{{ route('admin.comments.disapproved') }}" >Disapproved Comments</a>
					</li>
				</ul>
			</div>
		</li>
		<li 
			class="text-center hover:bg-black hover:bg-opacity-30 @if(url()->current() == route('admin.categories.index')) bg-black bg-opacity-40 @endif"
			x-data="{ submenuOpen: false }"
		>
			<div class="flex items-center justify-center">
				<a 
					href="{{ route('admin.categories.index') }}"
					class="block py-2 mr-2" 
					@click=" sidebarOpen=false "
				>
					Categories
				</a>
			</div>
			
		</li>
		<li 
			class="text-center hover:bg-black hover:bg-opacity-30 @if(url()->current() == route('admin.users.index') || url()->current() == route('admin.users.create')) bg-black bg-opacity-40 @endif"
			x-data="{ submenuOpen: false }"
		>
			<div class="flex items-center justify-center">
				<a 
					href="{{ route('admin.users.index') }}"
					class="block py-2 mr-2" 
					@click=" sidebarOpen=false "
				>
					Users
				</a>
				<span @click="submenuOpen= !submenuOpen" class="cursor-pointer transition duration-150" :class="{ 'transform rotate-180': submenuOpen }">
					<x-svg-arrow-down class="w-3 h-3" />
				</span>
			</div>
			<div class="bg-black bg-opacity-50 text-white text-sm" x-show="submenuOpen">
				<ul>
					<li class="hover:bg-gray-800 hover:bg-opacity-40 py-2">
						<a href="{{ route('admin.users.create') }}" >Create New</a>
					</li>
				</ul>
			</div>
		</li>
	</ul>
</div>