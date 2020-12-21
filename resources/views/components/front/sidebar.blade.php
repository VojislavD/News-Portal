<div x-data="{ activeTab: 1 }">
    <div class="flex bg-primary">
        <button 
            class="w-1/3 py-2 focus:outline-none" 
            :class="{ 'border-b-4 border-secondary text-white': activeTab == 1, 'text-gray-300 text-sm hover:text-secondary': activeTab != 1 }"
            @click="activeTab=1"
        >
            Latest
        </button>
        <button 
            class="w-1/3 py-2 focus:outline-none" 
            :class="{ 'border-b-4 border-secondary text-white': activeTab == 2, 'text-gray-300 text-sm hover:text-secondary': activeTab != 2 }"
            @click="activeTab=2"
        >
            Trending
        </button>
        <button 
            class="w-1/3 py-2 focus:outline-none" 
            :class="{ 'border-b-4 border-secondary text-white': activeTab == 3, 'text-gray-300 text-sm hover:text-secondary': activeTab != 3 }" 
            @click="activeTab=3"
        >
            Comments
        </button>
    </div>
    <div>
        <div 
            class="bg-gray-300 pt-1 pb-6"
            x-show="activeTab == 1" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
        >
            @forelse($latest as $article)
                <div class="flex items-center justify-center md:h-24 xl:h-20 border-b border-gray-200">
                    <div class="w-1/6 flex flex-col items-center justify-center text-center">
                        <span class="text-lg font-bold text-primary">5m
                            {{-- {{ $article->created_at->diffForHumans() }} --}}
                        </span>
                        <span class="text-xs">ago</span>
                    </div>
                    <div class="w-5/6 flex flex-col pl-2">
                        <a href="{{ route('front.article', $article->id) }}" class="block w-5/6 text-sm font-bold hover:text-primary transition ease-in-out duration-300">
                            {{ \Illuminate\Support\Str::limit($article->headline, $limit = 50,'...') }}
                        </a>
                        <div class="flex items-center mt-2 text-xs text-gray-500 font-semibold">
                            <a href="{{ route('front.article', $article->id) }}" class="block hover:text-primary mr-2 flex items-center">
                                {{ $article->countApprovedComments() }}
                                <x-svg-comments class="w-3 h-3 ml-1 mb-1 hover:text-primary" />
                            </a>
                            <a href="{{ route('front.article', $article->id) }}" class="block hover:text-primary flex items-center">
                                {{ $article->views }}
                                <x-svg-view class="w-3 h-3 ml-1 mb-1 hover:text-primary" />
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex items-center justify-center md:h-24 xl:h-20">
                    There is no articles.
                </div>
            @endforelse
        </div>
        <div 
            class="bg-gray-300 pt-1 pb-6"
            x-show="activeTab == 2" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
        >
            @forelse($trending as $article)
                <div class="flex items-center justify-center md:h-24 xl:h-20 border-b border-gray-200">
                    <div class="w-1/6 flex flex-col items-center justify-center text-center">
                        <span class="text-lg font-bold text-primary">5m
                            {{-- {{ $article->created_at->diffForHumans() }} --}}
                        </span>
                        <span class="text-xs">ago</span>
                    </div>
                    <div class="flex flex-col pl-2">
                        <a href="{{ route('front.article', $article->id) }}" class="block w-5/6 text-sm font-bold hover:text-primary transition ease-in-out duration-300">
                            {{ \Illuminate\Support\Str::limit($article->headline, $limit = 50,'...') }}
                        </a>
                        <div class="flex items-center mt-2 text-xs text-gray-500 font-semibold">
                            <a href="{{ route('front.article', $article->id) }}" class="block hover:text-primary mr-2 flex items-center">
                                {{ $article->countApprovedComments() }}
                                <x-svg-comments class="w-3 h-3 ml-1 mb-1 hover:text-primary" />
                            </a>
                            <a href="{{ route('front.article', $article->id) }}" class="block hover:text-primary flex items-center">
                                {{ $article->views }}
                                <x-svg-view class="w-3 h-3 ml-1 mb-1 hover:text-primary" />
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex items-center justify-center md:h-24 xl:h-20">
                    There is no articles.
                </div>
            @endforelse
        </div>
        <div 
            class="bg-gray-300 pt-1 pb-6"
            x-show="activeTab == 3" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
        >
            @forelse($comments as $article)
                <div class="flex items-center justify-center md:h-24 xl:h-20 border-b border-gray-200">
                    <div class="w-1/6 flex flex-col items-center justify-center text-center">
                        <span class="text-lg font-bold text-primary">5m
                            {{-- {{ $article->created_at->diffForHumans() }} --}}
                        </span>
                        <span class="text-xs">ago</span>
                    </div>
                    <div class="flex flex-col pl-2">
                        <a href="{{ route('front.article', $article->id) }}" class="block w-5/6 text-sm font-bold hover:text-primary transition ease-in-out duration-300">
                            {{ \Illuminate\Support\Str::limit($article->headline, $limit = 50,'...') }}
                        </a>
                        <div class="flex items-center mt-2 text-xs text-gray-500 font-semibold">
                            <a href="{{ route('front.article', $article->id) }}" class="block hover:text-primary mr-2 flex items-center">
                                {{ $article->countApprovedComments() }}
                                <x-svg-comments class="w-3 h-3 ml-1 mb-1 hover:text-primary" />
                            </a>
                            <a href="{{ route('front.article', $article->id) }}" class="block hover:text-primary flex items-center">
                                {{ $article->views }}
                                <x-svg-view class="w-3 h-3 ml-1 mb-1 hover:text-primary" />
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex items-center justify-center md:h-24 xl:h-20">
                    There is no articles.
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="my-16">
    <a href="#">
        <img src="https://via.placeholder.com/320x480">
    </a>
</div>

<div class="my-16 bg-gray-300 pb-6 shadow-2xl">
    <h3 class="bg-primary text-white p-2 border-b-4 border-secondary">Subscribe to our newsletter</h3>
    <p class="m-4 text-gray-700 text-sm">Enter your email address to receive all news from our awesome website</p>
    <form class="mx-4 flex">
        <input type="text" name="" class="w-2/3 p-1 text-sm focus:outline-none" placeholder="Your Email Address">
        <button class="bg-secondary font-bold text-sm text-white px-3 py-1 rounded-r-lg hover:text-gray-300 focus:outline-none">Subscribe</button>
    </form>
</div>

<div class="my-16 shadow-2xl">
    <h3 class="bg-primary p-2 text-white border-b-4 border-secondary">Latest from Twitter</h3>
    <a class="twitter-timeline" data-width="320" data-height="640" data-theme="light" href="https://twitter.com/laravelphp?ref_src=twsrc%5Etfw">Tweets by laravelphp</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div> 

<div class="my-16 shadow-2xl">
    <h3 class="bg-primary p-2 text-white border-b-4 border-secondary">Latest from Facebook</h3>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="LJxu7bz6"></script>

    <div class="fb-page" data-href="https://www.facebook.com/LaravelCommunity/" data-tabs="timeline" data-width="320" data-height="480" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/LaravelCommunity/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/LaravelCommunity/">Laravel</a></blockquote></div>
</div>