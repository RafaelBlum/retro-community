<x-layout>


    <x-partials.navbar-section/>

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
                    <img src="{{ asset('images/hero-4.png') }}" alt="hero image" class="vertical-loop-animation header_img_2 absolute inset-0 w-full h-full object-cover z-20">

                </div>
            </div>
        </div>
    </section>

    {{--  SECTION CHANNELS  --}}
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6 up">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Canais apoiadores</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Alguns canais parceiros que estão apoiando o projeto Retrô Community.</p>
            </div>
            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($channels as $channel)
                    <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{Storage::url($channel->brand)}}" alt="Bonnie Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="{{route('my.channel', ['slug'=> $channel->slug])}}">{{$channel->title}}</a>
                    </h3>
                    <p>{{$channel->name}}</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="h-6 w-6" data-icon="tabler:brand-x" height="1em" viewBox="0 0 24 24" width="1em">
                                        <path d="m4 4l11.733 16H20L8.267 4zm0 16l6.768-6.768m2.46-2.46L20 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{'https://www.youtube.com/@' . $channel->link}}" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="h-4 mt-1" viewBox="0 0 132 29" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.4555 5.17846C38.9976 3.47767 37.6566 2.13667 35.9558 1.67876C32.8486 0.828369 20.4198 0.828369 20.4198 0.828369C20.4198 0.828369 7.99099 0.828369 4.88379 1.64606C3.21571 2.10396 1.842 3.47767 1.38409 5.17846C0.566406 8.28567 0.566406 14.729 0.566406 14.729C0.566406 14.729 0.566406 21.2051 1.38409 24.2796C1.842 25.9804 3.183 27.3214 4.88379 27.7793C8.0237 28.6297 20.4198 28.6297 20.4198 28.6297C20.4198 28.6297 32.8486 28.6297 35.9558 27.812C37.6566 27.3541 38.9976 26.0131 39.4555 24.3123C40.2732 21.2051 40.2732 14.7618 40.2732 14.7618C40.2732 14.7618 40.3059 8.28567 39.4555 5.17846Z" fill="currentColor"/>
                                    <path d="M16.4609 8.77612V20.6816L26.7966 14.7289L16.4609 8.77612Z" fill="white"/>
                                    <path d="M64.272 25.0647C63.487 24.5413 62.931 23.7237 62.6039 22.5789C62.2768 21.4669 62.1133 19.9623 62.1133 18.1307V15.6122C62.1133 13.7479 62.3095 12.2434 62.6693 11.0986C63.0618 9.95386 63.6505 9.13618 64.4355 8.61286C65.2532 8.08954 66.2998 7.82788 67.6081 7.82788C68.8837 7.82788 69.9304 8.08954 70.7153 8.61286C71.5003 9.13618 72.0564 9.98657 72.4161 11.0986C72.7759 12.2107 72.9722 13.7152 72.9722 15.6122V18.1307C72.9722 19.995 72.8086 21.4669 72.4488 22.6116C72.0891 23.7237 71.533 24.5741 70.7481 25.0974C69.9631 25.6207 68.8837 25.8824 67.5427 25.8824C66.169 25.8496 65.057 25.588 64.272 25.0647ZM68.6875 22.3172C68.9164 21.7612 69.0146 20.8127 69.0146 19.5371V14.1077C69.0146 12.8648 68.9164 11.949 68.6875 11.3603C68.4585 10.7715 68.0988 10.5099 67.5427 10.5099C67.0194 10.5099 66.6269 10.8043 66.4307 11.3603C66.2017 11.949 66.1036 12.8648 66.1036 14.1077V19.5371C66.1036 20.8127 66.2017 21.7612 66.4307 22.3172C66.6269 22.8733 67.0194 23.1676 67.5754 23.1676C68.0987 23.1676 68.4585 22.906 68.6875 22.3172Z" fill="currentColor"/>
                                    <path d="M124.649 18.1634V19.0465C124.649 20.1586 124.682 21.009 124.748 21.565C124.813 22.121 124.944 22.5462 125.173 22.7752C125.369 23.0368 125.696 23.1677 126.154 23.1677C126.743 23.1677 127.135 22.9387 127.364 22.4808C127.593 22.0229 127.691 21.2706 127.724 20.1913L131.093 20.3875C131.125 20.5511 131.125 20.7473 131.125 21.009C131.125 22.6117 130.7 23.8218 129.817 24.6068C128.934 25.3918 127.691 25.7843 126.089 25.7843C124.159 25.7843 122.818 25.1628 122.033 23.9527C121.248 22.7425 120.855 20.8782 120.855 18.327V15.2852C120.855 12.6686 121.248 10.7715 122.066 9.56136C122.883 8.35119 124.257 7.76245 126.187 7.76245C127.528 7.76245 128.574 8.02411 129.294 8.51472C130.013 9.00534 130.504 9.79032 130.798 10.8042C131.093 11.8509 131.223 13.29 131.223 15.1216V18.098H124.649V18.1634ZM125.14 10.837C124.944 11.0986 124.813 11.4911 124.748 12.0471C124.682 12.6032 124.649 13.4536 124.649 14.5983V15.8412H127.528V14.5983C127.528 13.4863 127.495 12.6359 127.43 12.0471C127.364 11.4584 127.201 11.0659 127.004 10.837C126.808 10.608 126.481 10.4772 126.089 10.4772C125.631 10.4445 125.336 10.5753 125.14 10.837Z" fill="currentColor"/>
                                    <path d="M54.7216 17.8362L50.2734 1.71143H54.1656L55.7356 9.0052C56.1281 10.8041 56.4224 12.3414 56.6187 13.617H56.7168C56.8476 12.7011 57.142 11.1966 57.5999 9.0379L59.2353 1.71143H63.1274L58.6138 17.8362V25.5552H54.7543V17.8362H54.7216Z" fill="currentColor"/>
                                    <path d="M85.6299 8.15479V25.5878H82.5554L82.2283 23.4619H82.1302C81.3125 25.0645 80.0369 25.8822 78.3688 25.8822C77.2241 25.8822 76.3737 25.4897 75.8177 24.7375C75.2617 23.9852 75 22.8077 75 21.1723V8.15479H78.9249V20.9434C78.9249 21.7284 79.023 22.2844 79.1865 22.6115C79.3501 22.9385 79.6444 23.1021 80.0369 23.1021C80.364 23.1021 80.6911 23.004 81.0181 22.775C81.3452 22.5788 81.5742 22.3171 81.705 21.99V8.15479H85.6299Z" fill="currentColor"/>
                                    <path d="M105.747 8.15479V25.5878H102.673L102.346 23.4619H102.247C101.43 25.0645 100.154 25.8822 98.4861 25.8822C97.3413 25.8822 96.4909 25.4897 95.9349 24.7375C95.3788 23.9852 95.1172 22.8077 95.1172 21.1723V8.15479H99.0421V20.9434C99.0421 21.7284 99.1402 22.2844 99.3038 22.6115C99.4673 22.9385 99.7617 23.1021 100.154 23.1021C100.481 23.1021 100.808 23.004 101.135 22.775C101.462 22.5788 101.691 22.3171 101.822 21.99V8.15479H105.747Z" fill="currentColor"/>
                                    <path d="M96.2907 4.88405H92.3986V25.5552H88.5718V4.88405H84.6797V1.71143H96.2907V4.88405Z" fill="currentColor"/>
                                    <path d="M118.731 10.935C118.502 9.82293 118.11 9.03795 117.587 8.54734C117.063 8.05672 116.311 7.79506 115.395 7.79506C114.676 7.79506 113.989 7.99131 113.367 8.41651C112.746 8.809 112.255 9.36502 111.928 10.0192H111.896V0.828369H108.102V25.5552H111.34L111.732 23.9199H111.83C112.125 24.5086 112.582 24.9665 113.204 25.3263C113.825 25.6533 114.479 25.8496 115.232 25.8496C116.573 25.8496 117.521 25.2281 118.143 24.018C118.764 22.8078 119.091 20.8781 119.091 18.2942V15.5467C119.059 13.5516 118.96 12.0143 118.731 10.935ZM115.134 18.0325C115.134 19.3081 115.068 20.2893 114.97 21.0089C114.872 21.7285 114.676 22.2518 114.447 22.5461C114.185 22.8405 113.858 23.004 113.466 23.004C113.138 23.004 112.844 22.9386 112.582 22.7751C112.321 22.6116 112.092 22.3826 111.928 22.0882V12.2106C112.059 11.7527 112.288 11.3602 112.615 11.0331C112.942 10.7387 113.302 10.5752 113.662 10.5752C114.054 10.5752 114.381 10.7387 114.578 11.0331C114.807 11.3602 114.937 11.8835 115.036 12.6031C115.134 13.3553 115.166 14.402 115.166 15.743V18.0325H115.134Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{--  SECTION ?????  --}}
    <section class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">

            <div class="flex flex-wrap -mx-4">

                <div class="w-full sm:w-1/3 px-4 mb-8 up">
                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">
                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">
                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center text-center p-4">
                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Men</h2>
                            <a href="/"
                               class="bg-primary hover:bg-transparent border border-transparent hover:border-amber-700 hover:dark:border-white hover:text-amber-700 hover:dark:hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                now</a>
                        </div>
                    </div>
                </div>

                <div class="w-full sm:w-1/3 px-4 mb-8 up">
                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">
                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">
                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center text-center p-4">
                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Men</h2>
                            <a href="/"
                               class="bg-primary hover:bg-transparent border border-transparent hover:border-amber-700 hover:dark:border-white hover:text-amber-700 hover:dark:hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                now</a>
                        </div>
                    </div>
                </div>

                <div class="w-full sm:w-1/3 px-4 mb-8 up">
                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">
                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">
                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center text-center p-4">
                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Men</h2>
                            <a href="/"
                               class="bg-primary hover:bg-transparent border border-transparent hover:border-amber-700 hover:dark:border-white hover:text-amber-700 hover:dark:hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  SECTION POSTS  --}}
    <section class="bg-white dark:bg-gray-900">
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
                                        <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                                            <a href="{{route('posts.post', ['slug'=>$post->slug])}}" class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</a>
                                            <p class="mb-8 font-light lg:text-xl text-gray-900 dark:text-white"> {!!$post->content!!} </p>

                                            <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                                                <li class="flex space-x-3">
                                                    <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                    <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">{{$post->category->name}}</span>
                                                </li>
                                            </ul>

                                            <div class="flex">
                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
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
                                        <div class="px-6 py-4 dark:text-white   ">
                                            <p class="mb-4 text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400"> {{$post->category->name}} </p>
                                            <p class="mb-4 text-xl font-semibold text-gray-900 dark:text-white"> {{$post->title}} </p>
                                            <p class="mb-6 text-sm text-gray-900 dark:text-white sm:text-base lg:mb-8"> {!!$post->content!!} </p>
                                            <div class="flex">
                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
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
                                        <div class="px-6 py-4 dark:text-white">

                                            <a href="{{route('posts.category', ['slug'=> $post->category->slug])}}" class="text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400">
                                                {{$post->category->name}}
                                            </a>

                                            <a href="{{route('posts.post', ['slug'=>$post->slug])}}">
                                                <p class="mb-4 text-xl font-semibold"> {{Str::limit($post->title, 30)}}</p>
                                            </a>

                                            <p class="line-clamp-3 lg:line-clamp-3 h-auto mb-4">
                                                {!! $post->summary !!}
                                            </p>


                                            <div class="flex">
                                                <a href="{{'https://www.youtube.com/@' . $post->author->channel->link}}" target="_blank" class="font-light text-white dark:text-white hover:underline">
                                                    <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
                                                </a>
                                                <div class="flex flex-col">
                                                    <a href="{{route('my.channel', ['slug'=> $post->author->channel->slug])}}" class="text-purple-600 dark:text-purple-500 hover:underline">
                                                        {{$post->author->channel->title}}
                                                    </a>
                                                    <a href="{{'https://www.youtube.com/@' . $post->author->channel->link}}" target="_blank" class="font-light text-white dark:text-white hover:underline">
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
