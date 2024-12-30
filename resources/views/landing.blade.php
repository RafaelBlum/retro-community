<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('components.partials.favicon')
        <title>{{config('app.name')}}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body id="bg-cover" class="font-sans antialiased bg-white dark:bg-slate-800 text-gray-900 dark:text-white bg-no-repeat bg-cover bg-opacity-200" style="overflow: hidden;"> <!-- Adição: Adicionando overflow: hidden para remover a barra de rolagem -->


    <div class="relative isolate px-6 pt-14 lg:px-8 text-white dark:text-white">

        <div class="mx-auto max-w-screen-md py-30 sm:py-10 md:py-28 lg:py-28">

            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/brandname/horizontal-retrocommunity.png')}}" alt="" class="up" />

                <h3 class="text-4xl font-bold tracking-tight dir">Games e informações</h3>
                <p class="mt-6 text-lg leading-8 esq">
                    Com uma comunidade unida, você encontrará uma vasta coleção de <em class="text-blue-400 bold">informações sobre jogos clássicos</em>, <em class="text-blue-400 bold">lives da galera no YouTube</em>, análises detalhadas
                    e até histórias curiosas e guias de gameplay. Além disso, o <em class="text-blue-400 bold">Retrô Community</em> mantém você atualizado
                    sobre campanhas, lançamentos, eventos e tendências.
                </p>

                <div class="mt-10 flex items-center justify-center gap-x-6 up">
                    <a href="{{route('app.home')}}" class="rounded-md animate-bounce bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Acesse agora!
                    </a>
                </div>
            </div>

            <section class="mt-20">
                <div class="max-w-screen-xl mx-auto">
                    <ul class="grid gap-8 lg:gap-4 sm:grid-cols-2 md:grid-cols-{{$grid}} lg:grid-cols-{{$grid}}">
                        @foreach($channels as $channel)
                            <li class="flex flex-col items-center gap-1 text-center up">
                                <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="font-light text-white dark:text-white hover:underline">
                                    <img src="{{Storage::url($channel->brand)}}" alt="{{$channel->title}}" class="w-28 h-28 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
                                </a>
                                <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="text-sm font-light text-white dark:text-white">
                                    {{$channel->title}}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </section>
        </div>

    </div>

    </body>

</html>
