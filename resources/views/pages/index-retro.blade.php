<x-layout>

    <x-partials.navbar-v2/>

    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden text-white bg-gradient-to-br from-slate-700 via-violet-600 to-slate-700 dark:from-slate-900 dark:via-purple-900 dark:to-slate-900">
        <div class="absolute inset-0 opacity-15 dark:opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-violet-400 dark:bg-purple-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-20 w-[500px] h-[500px] bg-sky-400 dark:bg-blue-500 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-screen-xl px-4 pt-32 pb-56 mx-auto lg:pt-44">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-4 py-1 mb-6 text-sm font-medium rounded-full bg-white/10 text-white/90 border border-white/20">
                        Blog
                    </span>
                    <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-6 bg-gradient-to-r from-white via-violet-200 to-violet-300 dark:from-white dark:via-purple-200 dark:to-purple-400 bg-clip-text text-transparent">
                        {{ config('app.name') }}
                    </h1>
                    <p class="text-lg text-white/80 dark:text-gray-300 leading-relaxed max-w-lg">
                        Não fique de fora das últimas novidades! Descubra tudo sobre a comunidade retrô.
                    </p>
                </div>
                <div class="relative flex justify-center">
                    <div class="absolute w-[450px] h-[450px] bg-violet-400/30 dark:bg-purple-500/30 rounded-full blur-3xl"></div>
                    <img src="{{ asset('images/hero-3.png') }}" alt="hero" class="up relative w-[400px] h-auto z-10">
                    <img src="{{ asset('images/hero-7.png') }}" alt="hero" class="vertical-loop-animation absolute inset-0 w-[400px] h-auto mx-auto z-20">
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-56 bg-gradient-to-b from-transparent via-slate-700/40 to-white dark:via-slate-900/40 dark:to-slate-900"></div>
    </section>

    {{-- SECTION POSTS - RETRO STYLE --}}
    <section class="bg-white dark:bg-slate-900 py-20">
        <div class="max-w-screen-xl px-4 mx-auto">

            {{-- Categories --}}
            <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
                @if(isset($category))
                    <a href="{{ route('posts.category', ['slug' => $category->slug]) }}" class="px-4 py-2 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-sm font-medium">
                        {{ $category->title }}
                    </a>
                @else
                    @foreach($categories as $cat)
                        <a href="{{ route('posts.category', ['slug' => $cat->slug]) }}" class="px-4 py-2 rounded-full bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-400 text-sm font-medium hover:bg-purple-100 hover:text-purple-700 dark:hover:bg-purple-900/30 dark:hover:text-purple-300 transition-colors">
                            {{ $cat->title }}
                        </a>
                    @endforeach
                @endif
            </div>

            @if($posts->count() != 0)
                <div class="grid gap-8 sm:grid-cols-2 {{ $posts->count() < 3 ? 'lg:grid-cols-2 justify-items-center max-w-2xl mx-auto' : 'lg:grid-cols-3' }}">
                    @foreach($posts as $post)
                        <article class="group relative border border-gray-200 dark:border-slate-700 hover:border-violet-400 dark:hover:border-violet-500 rounded-xl bg-white dark:bg-slate-800 transition-all duration-300 hover:shadow-[0_0_25px_rgba(139,92,246,0.12)]">
                            {{-- Scanline overlay --}}
                            <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.5) 2px, rgba(0,0,0,0.5) 4px);"></div>

                            <a href="{{ route('posts.post', ['slug' => $post->slug]) }}" class="block overflow-hidden rounded-t-xl relative">
                                <img src="{{ Storage::url($post->featured_image_url) }}" alt="" class="card-image w-full h-52 object-cover group-hover:scale-105 transition-all duration-500">
                                {{-- Category badge --}}
                                <div class="absolute top-3 left-3">
                                    <span class="px-3 py-1 text-xs font-bold uppercase tracking-wider bg-violet-600 text-white border border-violet-400">
                                        {{ $post->category->title }}
                                    </span>
                                </div>
                            </a>

                            <div class="card-content p-5 relative transition-all duration-300">
                                <a href="{{ route('posts.post', ['slug' => $post->slug]) }}">
                                    <h3 class="text-base font-bold text-gray-900 dark:text-white mb-2 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors line-clamp-2 leading-snug">
                                        {{ Str::limit($post->title, 50) }}
                                    </h3>
                                </a>
                                <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2 mb-4 leading-relaxed">{!! $post->summary !!}</p>

                                {{-- Divider --}}
                                <div class="h-px bg-gradient-to-r from-transparent via-violet-500/30 to-transparent mb-4"></div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ Storage::url($post->author->channel->brand) }}" class="w-8 h-8 rounded-full object-cover border border-gray-200 dark:border-slate-600">
                                        <a href="{{ route('my.channel', ['slug' => $post->author->channel->slug]) }}" class="text-xs font-semibold text-violet-600 dark:text-violet-400 hover:underline">
                                            {{ $post->author->channel->title }}
                                        </a>
                                    </div>
                                    <a href="{{ route('posts.post', ['slug' => $post->slug]) }}" class="btn-read text-xs font-bold text-violet-600 dark:text-violet-400 uppercase tracking-wider hover:text-violet-700 dark:hover:text-violet-300 transition-colors">
                                        Ler →
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $posts->links('components.partials.paginate') }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gray-200 dark:bg-slate-700 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <p class="text-lg text-gray-600 dark:text-gray-400 max-w-md mx-auto">
                        Estamos trabalhando em novos conteúdos e notícias para informar a todos.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- FOOTER --}}
    <x-partials.footer-v2 />

    <style>
        article:has(.btn-read:hover) .card-image {
            transform: scale(1.1);
        }
    </style>

</x-layout>
