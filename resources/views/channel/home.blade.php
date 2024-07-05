<x-layout>


    <x-partials.navbar-section/>

    {{--  HEADER HOME  --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ $channel->name }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Bem-vindo ao meu perfil <em class="text-purple-600 dark:text-purple-500">{{$channel->name}}</em> na {{config('app.name')}}!
                    Aqui você descobrirá todas as informações sobre meu canal e muito mais.
                    Objetivo é sempre fortalecer e ampliar a visibilidade do incrível trabalho da comunidade retrô.
                </p>
                <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="inline-flex justify-center items-center px-3 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg class="w-10 h-10 mt-3 mx-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="red" d="M14.712 4.633a1.754 1.754 0 00-1.234-1.234C12.382 3.11 8 3.11 8 3.11s-4.382 0-5.478.289c-.6.161-1.072.634-1.234 1.234C1 5.728 1 8 1 8s0 2.283.288 3.367c.162.6.635 1.073 1.234 1.234C3.618 12.89 8 12.89 8 12.89s4.382 0 5.478-.289a1.754 1.754 0 001.234-1.234C15 10.272 15 8 15 8s0-2.272-.288-3.367z"/>
                        <path fill="#ffffff" d="M6.593 10.11l3.644-2.098-3.644-2.11v4.208z"/>
                    </svg>
                    Acesse agora
                </a>
            </div>
            <div class="lg:col-span-5 lg:flex lg:items-end lg:justify-end">
                <div class="relative text-center">
                    <img src="{{ asset('images/hero-9.png') }}" alt="hero image" class="up vertical-loop-animation relative inset-0 object-cover z-10 mx-auto" width="600">
                    <img src="{{Storage::url($channel->brand)}}" alt="hero image" class="header_img_2 rounded-full absolute inset-0 z-20 mx-auto" width="400">
{{--                    vertical-loop-animation--}}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">We didn't reinvent the wheel</h2>
                <p class="mb-4">We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need.</p>
                <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">

        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">


            <div class="flex flex-row items-center justify-center mb-10">
                <x-partials.title-section title="Tocados recentemente" description=""/>
            </div>

            <div class="mt-4 -ml-3 grid grid-cols-5 gap-2 items-center">
                @foreach($posts as $post)
                    <div class="flex flex-col p-3 cursor-pointer gap-2 rounded-md hover:bg-white/5 text-gray-900 dark:text-white">
                        <img class="mx-auto h-full w-full rounded-md"
                             src="{{Storage::url($post->featured_image_url)}}"
                             alt="{{$post->title}}" />
                        <div class="line-clamp-3 flex flex justify-between">
                            <span class="font-semibold">{{$post->title}}</span>
                            <span class="text-sm text-zinc-400">{{$post->views}}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{--  SECTION CHANNELS  --}}
{{--    <section class="bg-gray-50 dark:bg-gray-800">--}}
{{--        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">--}}
{{--            <div class="flex flex-col items-center">--}}

{{--                <x-partials.title-section title="Canais parceiros" description="Comunidade retrô games fortalecidos"/>--}}

{{--                <ul class="mx-auto grid lg:gap-3 sm:grid-cols-2 md:grid-cols-4 max-w-lg md:max-w-max px-5">--}}
{{--                    @foreach($channels as $channel)--}}
{{--                        <li class="mx-auto flex max-w-xs flex-col items-center gap-2 py-4 md:py-2 text-center up mx-10">--}}
{{--                            <img src="{{Storage::url($channel->brand)}}" alt="" class="w-20 h-20 p-1 rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                            <a href="{{route('my.channel', ['channel'=> $channel])}}" class="text-purple-600 dark:text-purple-500 hover:underline">--}}
{{--                                {{$channel->name}}--}}
{{--                            </a>--}}
{{--                            <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="font-light text-white dark:text-white hover:underline">--}}
{{--                                {{$channel->title}}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="bg-white dark:bg-gray-900">--}}
{{--        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">--}}

{{--            <div class="flex flex-wrap -mx-4">--}}
{{--                <!-- Category 1 -->--}}
{{--                <div class="w-full sm:w-1/3 px-4 mb-8 up">--}}
{{--                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">--}}
{{--                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>--}}
{{--                        <div--}}
{{--                            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4">--}}
{{--                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Men</h2>--}}
{{--                            <a href="/"--}}
{{--                               class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop--}}
{{--                                now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Category 2 -->--}}
{{--                <div class="w-full sm:w-1/3 px-4 mb-8 down">--}}
{{--                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">--}}
{{--                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>--}}
{{--                        <div--}}
{{--                            class="category-text absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4 transition duration-300">--}}
{{--                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Women </h2>--}}
{{--                            <a href="/"--}}
{{--                               class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop--}}
{{--                                now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Category 3 -->--}}
{{--                <div class="w-full sm:w-1/3 px-4 mb-8 up">--}}
{{--                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">>--}}
{{--                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>--}}
{{--                        <div--}}
{{--                            class="category-text absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4 transition duration-300">--}}
{{--                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Accessories</h2>--}}
{{--                            <a href="/"--}}
{{--                               class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop--}}
{{--                                now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    {{--  SECTION POSTS  --}}
{{--    <section class="bg-white dark:bg-gray-900">--}}
{{--        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">--}}
{{--            <div class="flex flex-col items-center">--}}
{{--                <x-partials.title-section--}}
{{--                    title="{{($posts->count() != null ? 'Últimas postagens':'Trabalhando em novos conteúdos')}}"--}}
{{--                    description="{{($posts->count() != null ? 'Veja algumas das últimas novidades criadas':'')}}"/>--}}

{{--                @if($posts->count() != 0)--}}

{{--                        @if($posts->count() == 1)--}}
{{--                            <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6 up">--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">--}}
{{--                                        <div class="text-gray-500 sm:text-lg dark:text-gray-400">--}}
{{--                                            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h2>--}}
{{--                                            <p class="mb-8 font-light lg:text-xl text-gray-900 dark:text-white"> {!!$post->content!!} </p>--}}

{{--                                            <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">--}}
{{--                                                <li class="flex space-x-3">--}}
{{--                                                    <!-- Icon -->--}}
{{--                                                    <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>--}}
{{--                                                    <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">{{$post->category->name}}</span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}

{{--                                            <div class="flex">--}}
{{--                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>--}}
{{--                                                    <div class="flex flex-col lg:flex-row">--}}
{{--                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="{{Storage::url($post->featured_image_url)}}" alt="dashboard feature image">--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @elseif($posts->count() == 2)--}}
{{--                            <div class="mb-6 grid gap-2 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-2 lg:mb-12 lg:gap-6 up">--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">--}}
{{--                                        <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-60 object-cover rounded-tl-md rounded-tr-md" />--}}
{{--                                        <div class="px-6 py-4 dark:text-white   ">--}}
{{--                                            <p class="mb-4 text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400"> {{$post->category->name}} </p>--}}
{{--                                            <p class="mb-4 text-xl font-semibold text-gray-900 dark:text-white"> {{$post->title}} </p>--}}
{{--                                            <p class="mb-6 text-sm text-gray-900 dark:text-white sm:text-base lg:mb-8"> {!!$post->content!!} </p>--}}
{{--                                            <div class="flex">--}}
{{--                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>--}}
{{--                                                    <div class="flex flex-col lg:flex-row">--}}
{{--                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="mb-6 grid gap-4 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-3 lg:mb-12 lg:gap-6 up">--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">--}}
{{--                                        <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-60 object-cover rounded-tl-md rounded-tr-md" />--}}
{{--                                        <div class="px-6 py-4 dark:text-white   ">--}}
{{--                                            <p class="mb-4 text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400"> {{$post->category->name}} </p>--}}
{{--                                            <p class="mb-4 text-xl font-semibold"> {{Str::limit($post->title, 30)}}</p>--}}

{{--                                            <p class="line-clamp-3 lg:line-clamp-none h-auto mb-4">--}}
{{--                                                {!! $post->summary !!}--}}
{{--                                            </p>--}}


{{--                                            <div class="flex">--}}
{{--                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>--}}
{{--                                                    <div class="flex flex-col lg:flex-row">--}}
{{--                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                            @if($posts->count() <= 3)--}}
{{--                                <x-partials.btn-actions href="{{route('posts.index')}}" btn>--}}
{{--                                    Ver mais--}}
{{--                                </x-partials.btn-actions>--}}
{{--                           @endif--}}
{{--                    @endif--}}

{{--                @else--}}

{{--                    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">--}}
{{--                        <figure class="max-w-screen-md mx-auto">--}}
{{--                            <blockquote>--}}
{{--                                <p class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">--}}
{{--                                    "Desculpe o transtorno, mas estamos trabalhando novas notícias e conteúdos para melhor informar a todos."</p>--}}
{{--                            </blockquote>--}}
{{--                            <figcaption class="flex items-center justify-center mt-6 space-x-3">--}}
{{--                                <img class="w-6 h-6" src="/images/brandname/favicon-retrocommunity.png" alt="profile picture">--}}
{{--                                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">--}}
{{--                                    <div class="pr-3 font-medium text-gray-900 dark:text-white">{{config('app.name')}}</div>--}}
{{--                                </div>--}}
{{--                            </figcaption>--}}
{{--                        </figure>--}}
{{--                    </div>--}}

{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <x-partials.footer />

    <script>

    </script>


</x-layout>
