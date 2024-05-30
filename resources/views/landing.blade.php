<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('app_name')}}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body id="bg-cover" class="font-sans antialiased bg-white dark:bg-slate-800 text-gray-900 dark:text-white bg-no-repeat bg-cover bg-opacity-200" style="overflow: hidden;"> <!-- Adição: Adicionando overflow: hidden para remover a barra de rolagem -->


    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-screen-md py-32 sm:py-48 lg:py-56">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-3 py-1 text-sm leading-6 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Desenvolvimento da Hack. <a href="https://github.com/RafaelBlum/hack-orelha-lascada" target="_blank" class="font-semibold text-indigo-400">
                        <span class="absolute inset-0" aria-hidden="true"></span>Acesse documentação <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
            <div class="text-center">
                <h1 class="test text-4xl font-bold tracking-tight sm:text-6xl">{{env('app_name')}}</h1>
                <h3 class="logo text-4xl font-bold tracking-tight ">Games e informações</h3>

                <p class="mt-6 text-lg leading-8">
                    Com uma comunidade unida, você encontrará uma vasta coleção de <em class="text-blue-400 bold">informações sobre jogos clássicos</em>, <em class="text-blue-400 bold">lives da galera no YouTube</em>, análises detalhadas
                    e até histórias curiosas e guias de gameplay. Além disso, o <em class="text-blue-400 bold">Retro Community</em> mantém você atualizado
                    sobre campanhas, lançamentos, eventos e tendências.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{route('app.home')}}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Saíba mais sobre
                    </a>
                </div>
            </div>


            <section class="mt-6">
                <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-16">
                    <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 sm:grid-cols-3 lg:grid-cols-6 dark:text-white">

                        <a href="https://www.youtube.com/@AlmirSantos" target="_blank" class="flex items-center lg:justify-center">
                            <img src="{{asset('images/channels/almir_santos_profile.jpg')}}" alt="image" class="rounded-full w-7 opacity-1 mr-2">
                            <p class="text-sm">Almir Santos</p>
                        </a>

                        <a href="https://www.youtube.com/@ZerandoJogos" target="_blank" class="flex items-center lg:justify-center">
                            <img src="{{asset('images/channels/zerandojogos_profile.jpg')}}" alt="image" class="rounded-full w-7 opacity-1 mr-2">
                            <p class="text-sm">Zerando Jogos</p>
                        </a>

                        <a href="https://www.youtube.com/@alan.jogamais" target="_blank" class="flex items-center lg:justify-center">
                            <img src="{{asset('images/channels/joga_plus_profile.jpg')}}" alt="image" class="rounded-full w-7 opacity-1 mr-2">
                            <p class="text-sm">Joga+</p>
                        </a>

                        <a href="https://www.youtube.com/@TroopaGames" target="_blank" class="flex items-center lg:justify-center">
                            <img src="{{asset('images/channels/troopa_games_profile.jpg')}}" alt="image" class="rounded-full w-7 opacity-1 mr-2">
                            <p class="text-sm">Troopa Games</p>
                        </a>

                        <a href="https://www.youtube.com/@SpockyGames" target="_blank" class="flex items-center lg:justify-center">
                            <img src="{{asset('images/channels/spocky_games_profile.jpg')}}" alt="image" class="rounded-full w-7 opacity-1 mr-2">
                            <p class="text-sm">Spocky Games</p>
                        </a>

                        <a href="https://www.youtube.com/@Retrostalgia1985" target="_blank" class="flex items-center lg:justify-center">
                            <img src="{{asset('images/channels/retrostalgia_profile.jpg')}}" alt="image" class="rounded-full w-7 opacity-1 mr-2">
                            <p class="text-sm">Retrostalgia</p>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>

    </body>

</html>
