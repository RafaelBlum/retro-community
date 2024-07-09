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


                </div>
            </div>
        </div>
    </section>

    @if($campings)
        @foreach($campings as $campaing)
            <div class="overflow-hidden shadow-xl transition duration-500 ease-in-out transform hover:scale-105">
                <iframe class="w-[220px] h-[300px] mt-3 border-none"
                        src="{{$campaing->qrCode}}" frameborder="0"></iframe>
            </div>
        @endforeach
    @endif


    <x-partials.footer />

    <script>

    </script>


</x-layout>

