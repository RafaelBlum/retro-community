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
                    <img src="{{ asset('images/hero-5.png') }}" alt="hero image" class="vertical-loop-animation header_img_2 absolute inset-0 w-full h-full object-cover z-20">

                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20 text-gray-900 dark:text-white">

            <div class="mx-auto w-fit p-2">


                <div class="space-y-4 up">
                    <h1 class="text-center text-3xl font-extrabold leading-none tracking-normal text-gray-900 dark:text-white md:text-4xl lg:text-4xl md:tracking-tight">
                        {{$post->title}}
                    </h1>

                    <dl class="flex flex-wrap font-medium gap-x-6 gap-y-2 items-start text-gray-500">
                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </dt>

                            <dd>{{$post->created_at->format('M d, Y')}}</dd>
                        </div>

                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </dt>

                            <dd>{{$post->author->name}}</dd>
                        </div>

                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </dt>

                            <dd>{{$post->category->name}}</dd>
                        </div>

                        <div class="flex items-center gap-2">
                            <dt>
                                <svg class="w-5 h-5 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </dt>

                            <dd>{{$post->views}}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mx-auto w-fit p-2 rounded-[15px] shadow">
                <img src="{{Storage::url($post->featured_image_url)}}" alt="{{$post->title}}" width="984px" height="505px" class="shadow-lg rounded-[15px] up"/>
            </div>

            <div class="px-12 md:px-12 lg:px-28 mx-auto">
                <div class="flex flex-col lg:flex-row lg:space-x-12">

                    <div class="px-4 lg:px-0 mt-12 text-gray-900 dark:text-white text-lg leading-relaxed w-full lg:w-3/4">
                        <h2 class="text-2xl md:text-2xl lg:text-2xl md:tracking-tight mb-4 font-semibold text-gray-900 dark:text-white leading-tight">
                            {{$post->subTitle}}
                        </h2>



                        {!!$post->content!!}

                    </div>

                    <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm dir">
                        <div class="p-4 border-t border-b md:border md:rounded">
                            <div class="flex py-2">
                                <img src="{{Storage::url($post->author->channel->brand)}}"
                                     class="h-10 w-10 rounded-full mr-2 object-cover" />
                                <div class="flex flex-col text-sm">
                                    <a href="{{route('my.channel', ['slug'=> $post->author->channel->slug])}}" class="text-purple-600 dark:text-purple-500 hover:underline">
                                        {{$post->author->channel->title}}
                                    </a>
                                    <a href="{{'https://www.youtube.com/@' . $post->author->channel->link}}" target="_blank" class="font-light text-white dark:text-white hover:underline">
                                        {{$post->author->channel->name}}
                                    </a>
                                </div>


                            </div>

                            <div class="flex flex-col text-sm">

                                <div class="flex justify-between">
                                    <p class="text-sm text-secondary">
                                        {{$post->created_at->format('d M Y')}}
                                    </p>

                                    <div class="flex flex-nowrap text-gray-400 hover:text-gray-600">
                                        <svg class="ml-4 mr-1 justify-center" style="width:20px;height:20px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                                        </svg>
                                        {{$post->views}}
                                    </div>
                                </div>



                                <a href="{{route('posts.category', ['slug'=> $post->category->slug])}}" class="text-sm text-center w-full px-3 py-1 mt-8 bg-blue-500 text-gray-100 dark:text-white rounded-md no-underline">
                                    {{$post->category->name}}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8 up">
            </div>

            <div class="p-24 flex flex-wrap items-center justify-center up">
                <a href="{{route('my.channel', ['slug'=> $post->author->channel->slug])}}" class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-500 dark:bg-purple-500 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                        <img class="relative w-40 rounded-full" src="{{Storage::url($post->author->channel->brand)}}" alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">{{$post->author->channel->title}}</span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-xl">{{$post->author->channel->name}}</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </section>
    <x-partials.footer />

    <script>

    </script>


</x-layout>
