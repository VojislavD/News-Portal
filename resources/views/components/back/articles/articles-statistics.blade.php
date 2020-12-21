<div class="h-32 px-4 md:px-8 mt-10 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
		<div class="bg-red-500 hover:bg-red-600 transition ease-in-out duration-300 flex flex-col lg:flex-row items-center justify-center py-2 rounded-lg text-gray-100">
			<div class="w-1/3 flex items-center justify-center xl:justify-end">
				<x-svg-article class="w-8 lg:w-10 xl:w-12 h-8 lg:h-10 xl:h-12" />
			</div>
			<div class="w-2/3 flex flex-col text-center">
				<span class="text-2xl xl:text-4xl font-bold">{{ $newArticles24Hours }}</span>
				<span class="text-sm xl:text-base">New Articles Last 24h</span>
			</div>
		</div>
		<div class="bg-indigo-500 hover:bg-indigo-600 transition ease-in-out duration-300 flex flex-col lg:flex-row items-center justify-center py-2 rounded-lg text-gray-100">
			<div class="w-1/3 flex items-center justify-center xl:justify-end">
				<x-svg-view class="w-8 lg:w-10 xl:w-12 h-8 lg:h-10 xl:h-12" />
			</div>
			<div class="w-2/3 flex flex-col text-center">
				<span class="text-2xl xl:text-4xl font-bold">{{ $views24Hours }}</span>
				<span class="text-sm xl:text-base">Views Last 24h</span>
			</div>
		</div>
		<div class="bg-green-500 hover:bg-green-600 transition ease-in-out duration-300 flex flex-col lg:flex-row items-center justify-center py-2 rounded-lg text-gray-100">
			<div class="w-1/3 flex items-center justify-center xl:justify-end">
				<x-svg-article class="w-8 lg:w-10 xl:w-12 h-8 lg:h-10 xl:h-12" />
			</div>
			<div class="w-2/3 flex flex-col text-center">
				<span class="text-2xl xl:text-4xl font-bold">{{ $newArticles7Days }}</span>
				<span class="text-sm xl:text-base">New Articles Last 7 days</span>
			</div>
		</div>
		<div class="bg-yellow-400 hover:bg-yellow-500 transition ease-in-out duration-300 flex flex-col lg:flex-row items-center justify-center py-2 rounded-lg text-gray-100">
			<div class="w-1/3 flex items-center justify-center xl:justify-end">
				<x-svg-view class="w-8 lg:w-10 xl:w-12 h-8 lg:h-10 xl:h-12" />
			</div>
			<div class="w-2/3 flex flex-col text-center">
				<span class="text-2xl xl:text-4xl font-bold">{{ $views7Days }}</span>
				<span class="text-sm xl:text-base">Views Last 7 days</span>
			</div>
		</div>
	</div>