<x-layout>


    <x-partials.header-navbar/>

    {{--  HEADER HOME  --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ config('app.name') }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Bem-vindo à sua comunidade retrô! Aqui você descobrirá todas as informações sobre canais retrô e muito mais.
                    Nosso objetivo é fortalecer e ampliar a visibilidade do incrível trabalho da comunidade retrô.
            </div>
            <div class="lg:col-span-5 lg:flex lg:items-end lg:justify-end">
                <div class="relative">
                    <img src="{{ asset('images/hero-3.png') }}" alt="hero image" class="up relative inset-0 w-full h-full object-cover z-10">
                    <img src="{{ asset('images/hero-7.png') }}" alt="hero image" class="vertical-loop-animation m-4 header_img_2 absolute inset-0 w-auto object-cover z-20">
                    <img src="{{ asset('images/hero-9.png') }}" alt="hero image" class="vertical-loop-animation-img m-4 header_img_2 absolute inset-0 w-auto object-cover z-15">

                </div>
            </div>
        </div>
    </section>

    {{--  SECTION POSTS  --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
            <div class="flex flex-col items-center">
                <x-partials.header-section
                    title="{{($posts->count() != null ? 'Blog community retrô':'Trabalhando em novos conteúdos')}}"
                    description="{{($posts->count() != null ? 'Não fique de fora das últimas novidades!':'')}}"/>

                <div class="flex items-center space-x-4 mb-5">
                    @foreach($categories as $category)
                        <a href="{{route('posts.category', ['category'=> $category])}}" class="text-gray-900 dark:text-white inline-block rounded border-2 border-gray-400 px-1 py-1 text-xs font-light uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-accent-300 hover:bg-primary-50/50 hover:text-primary-accent-300 focus:border-primary-600 focus:bg-primary-50/50 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 motion-reduce:transition-none dark:hover:bg-blue-950 dark:focus:bg-blue-950">
                            {{$category->name}}
                        </a>
                    @endforeach
                </div>

                @if($posts->count() != 0)

                        @if($posts->count() == 1)
                            <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6 up">
                                @foreach($posts as $post)
                                    <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                                        <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                                            <a href="{{route('posts.post', ['post'=>$post])}}" class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</a>
                                            <p class="mb-8 font-light lg:text-xl text-gray-900 dark:text-white"> {!!$post->content!!} </p>

                                            <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                                                <li class="flex space-x-3">
                                                    <!-- Icon -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                    <a href="{{route('posts.category', ['category'=> $post->category])}}" class="text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400">
                                                        {{$post->category->name}}
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="flex">
                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
                                                <div class="flex flex-col">
                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>
                                                    <div class="flex flex-col lg:flex-row">
                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="{{Storage::url($post->featured_image_url)}}" alt="dashboard feature image">
                                    </div>
                                @endforeach
                            </div>
                        @elseif($posts->count() == 2)
                            <div class="mb-6 grid gap-2 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-2 lg:mb-12 lg:gap-6 up">
                                @foreach($posts as $post)
                                    <a href="{{route('posts.post', ['post'=>$post])}}" class="flex flex-col gap-4 px-4 py-8 md:p-0">
                                        <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-60 object-cover border rounded-md  border-solid border-gray-300 rounded-tl-md rounded-tr-md" />


                                        <div class="px-6 py-4 dark:text-white">

                                            <a href="{{route('posts.category', ['category'=> $post->category])}}" class="text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400">
                                                {{$post->category->name}}
                                            </a>
                                            <p class="mb-4 text-xl font-semibold text-gray-900 dark:text-white"> {{$post->title}} </p>
                                            <p class="mb-6 text-sm text-gray-900 dark:text-white sm:text-base lg:mb-8"> {!! $post->summary !!} </p>
                                            <div class="flex">
                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
                                                <div class="flex flex-col">
                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>
                                                    <div class="flex flex-col lg:flex-row">
                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>
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
                                        <a href="{{route('posts.post', ['post'=>$post])}}">
                                            <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-auto object-cover rounded-tl-md rounded-tr-md" />
                                        </a>
                                        <div class="px-6 py-4 dark:text-white">

                                           <a href="{{route('posts.category', ['category'=> $post->category])}}" class="text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400">
                                               {{$post->category->name}}
                                           </a>

                                            <p class="mb-4 text-xl font-semibold"> {{Str::limit($post->title, 30)}}</p>

                                            <p class="line-clamp-3 lg:line-clamp-none h-auto mb-4">
                                                {!! $post->summary !!}
                                            </p>


                                            <div class="flex">
                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
                                                <div class="flex flex-col">
                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>
                                                    <div class="flex flex-col lg:flex-row">
                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>
                                                    </div>
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
                                <p class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">
                                    "Desculpe o transtorno, mas estamos trabalhando novas notícias e conteúdos para melhor informar a todos."</p>
                            </blockquote>
                            <figcaption class="flex items-center justify-center mt-6 space-x-3">
                                <img class="w-6 h-6" src="/images/brandname/favicon-retrocommunity.png" alt="profile picture">
                                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                                    <div class="pr-3 font-medium text-gray-900 dark:text-white">{{config('app.name')}}</div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>

                @endif
            </div>
        </div>
    </section>

    <x-partials.footer />

    <script>

    </script>


</x-layout>
