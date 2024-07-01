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
                    <img src="{{ asset('images/hero-5.png') }}" alt="hero image" class="vertical-loop-animation header_img_2 absolute inset-0 w-full h-full object-cover z-20">

                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20 text-gray-900 dark:text-white">

            <div data-aos="fade-up" data-aos-delay="100" class="mx-auto w-fit bg-white p-4 rounded-[28px] shadow">
                <img data-aos="zoom-in" data-aos-delay="200" src="{{Storage::url($post->featured_image_url)}}" alt="product cover" width="984px" height="505px" class="shadow rounded-xl" />
            </div>

            <div class="lg:px-28">
                <article class="mb-9 content">
                    <h1 class="mb-6">{{$post->title}}</h1>
                    <div class="flex items-center gap-1 mb-2">
                        <a href="category-single.html" class="text-sm px-5 py-1 bg-[#F8F0FF] text-secondary rounded-md no-underline">
                            {{$post->category->name}}
                        </a>
                        <p class="text-sm text-secondary">23 Dec 2023</p>
                    </div>

                    {!!$post->content!!}
                </article>
            </div>
        </div>
    </section>
    <x-partials.footer />

    <script>

    </script>


</x-layout>
