<div class="w-full bg-gray-900 mt-8 border-t-4 border-primary">
	<div class="container mx-auto max-w-7xl">
		<div class="flex flex-col sm:flex-row items-start justify-between py-4">
			<div class="w-full md:w-1/3 lg:w-1/4 px-4">
				<hr class="w-16 border border-secondary bg-secondary h-1 my-2">
				<p class="text-gray-300 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<ul class="flex mt-3">
					<li class="mr-2">
						<a href="{{ config('settings.facebook_url') }}" target="_blank" class="text-white hover:text-facebook" title="Facebook">
							<x-svg-facebook class="w-8 h-8 bg-facebook hover:bg-white rounded-full p-2" />
						</a>
					</li>
					<li class="mr-2">
						<a href="{{ config('settings.twitter_url') }}" target="_blank" class="text-white hover:text-twitter" title="Twitter">
							<x-svg-twitter class="w-8 h-8 bg-twitter hover:bg-white rounded-full p-2" />
						</a>
					</li>
					<li class="mr-2">
						<a href="{{ config('settings.instagram_url') }}" target="_blank" class="text-white hover:text-instagram" title="Instagram">
							<x-svg-instagram class="w-8 h-8 bg-instagram hover:bg-white rounded-full p-2" />
						</a>
					</li>
					<li class="mr-2">
						<a href="{{ config('settings.youtube_url') }}" target="_blank" class="text-white hover:text-youtube" title="Youtube">
							<x-svg-youtube class="w-8 h-8 bg-youtube hover:bg-white rounded-full p-2" />
						</a>
					</li>
				</ul>
			</div>
			<div class="w-full md:w-1/3 lg:w-1/4 px-4 mt-6 sm:mt-0">
				<hr class="w-16 border border-secondary bg-secondary h-1 my-2">
				<p class="text-gray-300 text-sm">Enter your email address to receive all news from our awesome website</p>
				<form class="flex mt-3">
					<input type="text" name="" class="w-2/3 p-1 text-sm focus:outline-none" placeholder="Your Email Address">
					<button class="bg-secondary font-bold text-sm text-white px-3 py-1 rounded-r-lg hover:text-gray-300 focus:outline-none">Subscribe</button>
				</form>
			</div>
		</div>
		<div class="mt-8">
			<p class="text-gray-300 text-center py-4 text-sm">
				© 2020 <a href="http://vojislavdragicevic.com/" target="_blank" class="underline hover:text-secondary">Vojislav Dragicevic</a>. All right Reserved
			</p>
		</div>
	</div>
</div>