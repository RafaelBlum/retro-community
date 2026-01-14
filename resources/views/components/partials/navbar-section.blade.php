<header class="fixed w-full z-50">
    <nav class="bg-white dark:bg-blue-950 border-gray-200 py-2.5 text-gray-900 dark:text-white">

        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="{{route('app.landing')}}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap">{{config('app.name')}}</span>
            </a>

            <div class="flex items-center lg:order-2">
                @guest
                    <x-partials.btn-actions href="{{route('filament.admin.pages.dashboard')}}" login>
                        Login
                    </x-partials.btn-actions>
                @endguest
                @auth
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <x-partials.link href="{{route('my.channel', ['slug'=> auth()->user()->channel->slug])}}">
                            <div class="flex justify-center text-center items-center">
                                <img src="{{Storage::url(auth()->user()->channel->brand)}}" class="w-8 h-8 mr-3 rounded-full">
                                <p class="text-center">{{auth()->user()->channel->name}}</p>
                            </div>
                        </x-partials.link>
                    </ul>
                @endauth
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>

                <x-partials.btn-darkmode />

            </div>

            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">

                    <x-partials.link href="{{route('app.home')}}">
                        Home
                    </x-partials.link>

                    <x-partials.link href="{{route('posts.index')}}">
                        Blog
                    </x-partials.link>
                    <x-partials.link href="{{route('app.channels')}}">
                        Canais
                    </x-partials.link>
                    <x-partials.link href="{{route('app.campaings')}}">
                        Campanhas
                    </x-partials.link>
                    <x-partials.link href="{{route('app.about')}}">
                        Sobre
                    </x-partials.link>

                    @auth
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <x-partials.link href="{{route('filament.admin.pages.dashboard')}}">
                                Admin
                            </x-partials.link>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <x-partials.link href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </x-partials.link>
                            </form>
                        </ul>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
</header>
