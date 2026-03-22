<header class="fixed w-full z-50">
    <nav class="backdrop-blur-xl bg-white/80 dark:bg-slate-900/80 border-b border-gray-200/50 dark:border-slate-700/50 py-3 text-gray-900 dark:text-white transition-all">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="{{ route('app.landing') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg overflow-hidden">
                    <img src="/images/brandname/favicon-retrocommunity.png" alt="" class="w-full h-full object-cover">
                </div>
                <span class="self-center text-lg font-bold whitespace-nowrap">{{ config('app.name') }}</span>
            </a>

            <div class="flex items-center gap-3 lg:order-2">
                @guest
                    <a href="{{ route('filament.admin.pages.dashboard') }}" class="text-sm font-medium px-5 py-2 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900 hover:bg-gray-700 dark:hover:bg-gray-200 transition-colors">
                        Login
                    </a>
                @endguest
                @auth
                    @if(auth()->user()->channel)
                        <a href="{{ route('my.channel', ['slug' => auth()->user()->channel->slug]) }}" class="flex items-center gap-2 text-sm font-medium hover:text-violet-600 transition-colors">
                            <img src="{{ Storage::url(auth()->user()->channel->brand) }}" class="w-7 h-7 rounded-full ring-2 ring-gray-200 dark:ring-slate-600">
                            <span class="hidden sm:inline">{{ auth()->user()->channel->name }}</span>
                        </a>
                    @else
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ auth()->user()->name }}</span>
                    @endif
                @endauth

                <x-partials.btn-darkmode />

                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 dark:hover:bg-slate-800 focus:outline-none" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:items-center lg:gap-1 lg:mt-0">
                    <li>
                        <a href="{{ route('app.home') }}" class="block py-2 px-3 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 lg:hover:bg-transparent lg:hover:text-violet-600 transition-colors {{ request()->routeIs('app.home') ? 'text-violet-600 font-semibold' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}" class="block py-2 px-3 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 lg:hover:bg-transparent lg:hover:text-violet-600 transition-colors {{ request()->routeIs('posts.*') ? 'text-violet-600 font-semibold' : '' }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('app.channels') }}" class="block py-2 px-3 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 lg:hover:bg-transparent lg:hover:text-violet-600 transition-colors {{ request()->routeIs('app.channels') ? 'text-violet-600 font-semibold' : '' }}">Canais</a>
                    </li>
                    <li>
                        <a href="{{ route('app.campaings') }}" class="block py-2 px-3 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 lg:hover:bg-transparent lg:hover:text-violet-600 transition-colors {{ request()->routeIs('app.campaings') ? 'text-violet-600 font-semibold' : '' }}">Campanhas</a>
                    </li>
                    <li>
                        <a href="{{ route('app.about') }}" class="block py-2 px-3 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 lg:hover:bg-transparent lg:hover:text-violet-600 transition-colors {{ request()->routeIs('app.about') ? 'text-violet-600 font-semibold' : '' }}">Sobre</a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('filament.admin.pages.dashboard') }}" class="block py-2 px-3 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 lg:hover:bg-transparent lg:hover:text-violet-600 transition-colors">Admin</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left py-2 px-3 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 lg:hover:bg-transparent lg:hover:text-red-500 transition-colors text-gray-500">Sair</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
