<x-layout>


    <x-partials.navbar-section/>

    {{--  HEADER HOME  --}}
    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">{{ config('app.name') }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
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


    <section class="bg-white">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
            <div class="flex flex-col items-center">
                @if($campings)
                    @foreach($campings as $campaing)
                        <div class="swiper-slide mb-20 pb-10">
                            <div class="w-full md:flex">

                                <div class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] xl:max-w-[310px] 2xl:mr-16">
                                    <div class="p-24 flex flex-wrap items-center justify-center up">
                                        <a href="{{route('my.channel', ['slug'=> $campaing->channel->slug])}}" class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-500 rounded-lg max-w-xs shadow-lg">
                                            <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                                                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                                                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                                            </svg>
                                            <div class="relative pt-10 px-10 flex items-center justify-center">
                                                <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                                                <img class="relative w-40 rounded-full" src="{{Storage::url($campaing->channel->brand)}}" alt="">
                                            </div>
                                            <div class="relative text-white px-6 pb-6 mt-6">
                                                <span class="block opacity-75 -mb-1">{{$campaing->channel->title}}</span>
                                                <div class="flex justify-between">
                                                    <span class="block font-semibold text-xl">{{$campaing->channel->name}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <div>
                                        <div class="pt-8 space-y-5 my-7">
                                            <iframe class="w-[620px] h-[200px] mt-3 border-none" src="{{$campaing->linkGoal}}" frameborder="0"></iframe>
                                        </div>
                                        <p class="text-dark mb-2 text-base leading-[1.81] font-normal italic sm:text-[22px]">
                                            {{$campaing->title}}
                                        </p>

                                        <div>
                                            <a href="{{route('my.channel', ['slug'=> $campaing->channel->slug . '#campaind_id'])}}" class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800">
                                                Acesse e saiba mais sobre
                                                <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <div class="swiper-slide mb-20 pb-10">
                        <div class="w-full md:flex">
                            <div class="flex flex-col items-center text-center">
                                <span class="text-dark mb-2 block text-lg font-semibold">
                                   Campanhas dos canais parceiros
                                </span>
                                <p class="text-dark mb-6 text-xl leading-[1.2] font-bold sm:text-sm md:text-2xl">
                                    Desculpe, mas no momento não existem campanhas criadas pelos canais.
                                </p>
                                <p class="text-indigo-400 font-semibold">
                                    Em breve as campanhas estaram disponiveis para que todos possam fortalecer e ajudar seu canal favorito!
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <x-partials.footer />

    <script>

    </script>


</x-layout>

