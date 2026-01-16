<x-layout>


    <x-partials.navbar-section/>

    {{--  HEADER HOME  --}}
    <section class="bg-white dark:bg-dark text-gray-900 dark:text-white">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">{{ config('app.name') }}</h1>
                <p class="max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl text-gray-500 ">
                    Bem-vindo à sua comunidade retrô! Aqui você descobrirá todas as informações sobre canais retrô e muito mais.
                    Nosso objetivo é fortalecer e ampliar a visibilidade do incrível trabalho da comunidade retrô.
            </div>
            <div class="lg:col-span-5 lg:flex lg:items-end lg:justify-end">
                <div class="relative">
                    <img src="{{ asset('images/hero-3.png') }}" alt="hero image" class="up relative inset-0 w-full h-full object-cover z-10">
                    <img src="{{ asset('images/hero-4.png') }}" alt="hero image" class="vertical-loop-animation header_img_2 absolute inset-0 w-full h-full object-cover z-20">

                </div>
            </div>
        </div>
    </section>

    @guest
        <a href="{{ route('login') }}" class="text-white">Entrar</a>
        <a href="{{ route('register') }}" class="bg-primary p-2 rounded">Criar Conta</a>
    @endguest

    @auth
        @if($followedChannels->isNotEmpty())
            <section class="bg-white">
                <div class="grid max-w-screen-xl px-4 pt-10 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <h2 class="text-2xl font-pixel text-secondary mb-6">Canais que você segue</h2>
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-12">
                @foreach($followedChannels as $channel)
                    <a href="{{ route('my.channel', $channel->slug) }}" class="group flex flex-col items-center">
                        <div class="w-20 h-20 rounded-full border-2 border-primary group-hover:scale-110 transition-transform overflow-hidden">
                            <img src="{{ Storage::url($channel->brand) }}" class="w-full h-full object-cover">
                        </div>
                        <span class="mt-2 text-sm font-medium text-gray-300">{{ $channel->name }}</span>
                    </a>
                @endforeach
            </div>
                </div>
            </section>
        @endif
    @endauth

    {{--  SECTION CHANNELS  --}}
    {{-- SECTION CHANNELS --}}
    <section class="bg-white dark:bg-dark text-gray-900 dark:text-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6 up">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold font-pixel text-primary">Canais apoiadores</h2>
                <p class="font-light text-gray-500 sm:text-xl">Alguns canais parceiros que estão apoiando o projeto Retrô Community.</p>
            </div>

            @if($channels->isNotEmpty())
                {{-- Removi a lógica dinâmica de cols do PHP e usei o padrão do Tailwind --}}
                <div class="grid gap-8 lg:gap-16 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                    @foreach($channels as $channel)
                        <div class="text-center text-gray-500">
                            <img class="mx-auto mb-4 w-36 h-36 rounded-full border-2 border-primary/20 hover:border-primary transition-colors object-cover"
                                 src="{{ Storage::url($channel->brand) }}"
                                 alt="{{ $channel->name }} Logo">

                            <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <a href="{{ route('my.channel', ['slug' => $channel->slug]) }}" class="hover:text-primary transition-colors">
                                    {{ $channel->name }}
                                </a>
                            </h3>

                            {{-- TOTAL FOLLOWERS - USANDO O WITHCOUNT --}}
                            <p class="text-xs mt-2 uppercase tracking-widest text-secondary font-bold">
                                {{ $channel->followers_count }}
                                {{ $channel->followers_count === 1 ? 'inscrito' : 'inscritos' }}
                            </p>

                            <ul class="flex justify-center mt-4 space-x-4">
                                <li>
                                    <a href="{{ url('https://www.youtube.com/@' . $channel->link) }}" target="_blank" class="text-red-600 hover:text-red-500 transition-colors">
                                        <x-heroicon-o-play-circle class="w-6 h-6" /> {{-- Sugestão: usar ícones do Blade Heroicons se tiver instalado --}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    {{--  SECTION POSTS  --}}
    <section class="bg-white dark:bg-dark text-gray-900 dark:text-white">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
            <div class="flex flex-col items-center">
                <x-partials.title-section
                    title="{{($posts->count() != null ? 'Postagens recentes':'Trabalhando em novos conteúdos')}}"
                    description="{{($posts->count() != null ? 'Veja algumas das últimas novidades criadas':'')}}"/>

                @if($posts->count() != 0)

                        @if($posts->count() == 1)
                            <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6 up">
                                @foreach($posts as $post)
                                    <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                                        <div class="text-gray-500 sm:text-lg">
                                            <a href="{{route('posts.post', ['slug'=>$post->slug])}}" class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900">{{$post->title}}</a>
                                            <p class="mb-8 font-light lg:text-xl text-gray-900"> {!!$post->content!!} </p>

                                            <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7">
                                                <li class="flex space-x-3">
                                                    <svg class="flex-shrink-0 w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                    <span class="text-base font-medium leading-tight text-gray-900">{{$post->category->name}}</span>
                                                </li>
                                            </ul>

                                            <div class="flex">
                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none" />
                                                <div class="flex flex-col">
                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->title}}</h6>
                                                    <div class="flex flex-col lg:flex-row">
                                                        <p class="text-sm text-gray-500">{{$post->author->channel->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route('posts.post', ['slug'=>$post->slug])}}">
                                            <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="{{Storage::url($post->featured_image_url)}}" alt="dashboard feature image">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($posts->count() == 2)
                            <div class="mb-6 grid gap-2 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-2 lg:mb-12 lg:gap-6 up">
                                @foreach($posts as $post)
                                    <a href="{{route('posts.post', ['slug'=>$post->slug])}}" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">
                                        <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-60 object-cover rounded-tl-md rounded-tr-md" />
                                        <div class="px-6 py-4   ">
                                            <p class="mb-4 text-sm font-semibold uppercase text-fuchsia-700"> {{$post->category->name}} </p>
                                            <p class="mb-4 text-xl font-semibold text-gray-900"> {{$post->title}} </p>
                                            <p class="mb-6 text-sm text-gray-900 sm:text-base lg:mb-8"> {!!$post->content!!} </p>
                                            <div class="flex">
                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none" />
                                                <div class="flex flex-col">
                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->title}}</h6>
                                                    <div class="flex flex-col lg:flex-row">
                                                        <p class="text-sm text-gray-500">{{$post->author->channel->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="mb-6 grid gap-4 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-3 lg:mb-12 lg:gap-6 up">
                                @foreach($posts as $post)
                                    <div class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">
                                        <a href="{{route('posts.post', ['slug'=>$post->slug])}}">
                                            <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-auto object-cover rounded-tl-md rounded-tr-md" />
                                        </a>
                                        <div class="px-6 py-4">

                                            <a href="{{route('posts.category', ['slug'=> $post->category->slug])}}" class="text-sm font-semibold uppercase text-fuchsia-700">
                                                {{$post->category->name}}
                                            </a>

                                            <a href="{{route('posts.post', ['slug'=>$post->slug])}}">
                                                <p class="mb-4 text-xl font-semibold"> {{Str::limit($post->title, 30)}}</p>
                                            </a>

                                            <p class="line-clamp-3 lg:line-clamp-3 h-auto mb-4">
                                                {!! $post->summary !!}
                                            </p>


                                            <div class="flex">
                                                <a href="{{'https://www.youtube.com/@' . $post->author->channel->link}}" target="_blank" class="font-light text-white hover:underline">
                                                    <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none" />
                                                </a>
                                                <div class="flex flex-col">
                                                    <a href="{{route('my.channel', ['slug'=> $post->author->channel->slug])}}" class="text-purple-600 hover:underline">
                                                        {{$post->author->channel->title}}
                                                    </a>
                                                    <a href="{{'https://www.youtube.com/@' . $post->author->channel->link}}" target="_blank" class="font-light text-white hover:underline">
                                                        {{$post->author->channel->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($posts->count() <= 3)
                                <x-partials.btn-actions href="{{route('posts.index')}}" btn>
                                    Ver mais
                                </x-partials.btn-actions>
                           @endif
                    @endif

                @else

                    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
                        <figure class="max-w-screen-md mx-auto">
                            <blockquote>
                                <p class="text-xl font-medium text-gray-900 md:text-2xl">
                                    "Desculpe o transtorno, mas estamos trabalhando novas notícias e conteúdos para melhor informar a todos."</p>
                            </blockquote>
                            <figcaption class="flex items-center justify-center mt-6 space-x-3">
                                <img class="w-6 h-6" src="/images/brandname/favicon-retrocommunity.png" alt="profile picture">
                                <div class="flex items-center divide-x-2 divide-gray-500">
                                    <div class="pr-3 font-medium text-gray-900">{{config('app.name')}}</div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>

                @endif
            </div>
        </div>
    </section>




    <x-partials.footer />




</x-layout>
