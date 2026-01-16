<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    x-data="{
            isNight: new Date().getHours() >= 18 || new Date().getHours() < 6
        }"
    :class="isNight ? 'bg-[#0f172a]' : 'bg-[#38bdf8]'"
    class="auth-page-gamer min-h-screen flex items-center justify-center font-sans antialiased overflow-hidden transition-colors duration-1000"
>
<div class="absolute top-20 right-20 z-50 cursor-pointer transition-all duration-1000"
     @click="isNight = !isNight"
     :class="isNight ? 'translate-y-0 opacity-100 scale-110' : 'translate-y-20 opacity-0 scale-50 pointer-events-none'">
    <span class="text-6xl drop-shadow-[0_0_20px_#fff]">🌙</span>
</div>

<div class="absolute top-20 right-20 z-50 cursor-pointer transition-all duration-1000"
     @click="isNight = !isNight"
     :class="isNight ? 'translate-y-20 opacity-0 scale-50 pointer-events-none' : 'translate-y-0 opacity-100 scale-110'">
    <span class="text-6xl drop-shadow-[0_0_20px_#fbbf24]">☀️</span>
</div>

<div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">




    <div class="absolute bottom-0 w-full h-54 bg-indigo-950 opacity-40"
         style="clip-path: polygon(0% 100%, 15% 30%, 35% 80%, 50% 20%, 75% 85%, 100% 100%);"></div>

    <div class="absolute bottom-0 w-full h-40 bg-indigo-900 opacity-60"
         style="clip-path: polygon(0% 100%, 25% 40%, 45% 75%, 65% 35%, 85% 70%, 100% 100%);"></div>

</div>

<div class="z-10 w-full max-w-md login-card rounded-2xl shadow-2xl overflow-hidden bg-[#0f172a]/90 backdrop-blur-md">
    <div class="h-48 flex items-end justify-center relative transition-all duration-1000 down"
         :class="isNight ? 'bg-gradient-to-b from-purple-900 to-indigo-950' : 'bg-gradient-to-b from-blue-400 to-indigo-600'">

        <div class="absolute bottom-0 w-full h-34 bg-indigo-950 opacity-40"
             style="clip-path: polygon(0% 100%, 15% 30%, 35% 80%, 50% 40%, 95% 120%, 100% 100%);"></div>

        <div class="absolute bottom-0 w-full h-20 bg-indigo-900 opacity-60"
             style="clip-path: polygon(0% 100%, 25% 40%, 45% 75%, 65% 35%, 85% 70%, 100% 100%);"></div>

        <div class="z-30 mb-[-24px] bg-[#1e293b] rounded-xl px-4 py-2 border-2 border-indigo-500 shadow-2xl flex items-center justify-center up">
            <img src="{{ asset('images/brandname/horizontal-retrocommunity.png') }}" class="h-8 w-auto object-contain">
        </div>
    </div>

    <div class="p-8 pt-10">
        {{ $slot }}

{{--        <div class="relative flex py-5 items-center">--}}
{{--            <div class="flex-grow border-t border-indigo-900/50"></div>--}}
{{--            <span class="flex-shrink mx-4 text-indigo-500 text-[10px] uppercase font-bold tracking-widest">Novo por aqui?</span>--}}
{{--            <div class="flex-grow border-t border-indigo-900/50"></div>--}}
{{--        </div>--}}

{{--        <div class="text-center">--}}
{{--            <a href="{{ route('register') }}"--}}
{{--               class="text-indigo-400 hover:text-green-400 transition-colors duration-300 text-sm font-bold flex items-center justify-center gap-2 group">--}}
{{--                <svg class="w-5 h-5 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>--}}
{{--                </svg>--}}
{{--                CRIAR CONTA DE SEGUIDOR--}}
{{--            </a>--}}
{{--        </div>--}}

        <div class="z-20 mt-6 animate-float">
            <a href="{{ route('register') }}"
               class="bg-indigo-600/20 backdrop-blur-sm border border-indigo-500/50 px-6 py-2 rounded-full text-indigo-200 text-xs font-bold tracking-tighter hover:bg-indigo-600 transition-all duration-500 flex items-center gap-2">
                🎮 AINDA NÃO É UM SEGUIDOR? <span class="text-green-400">CADASTRE-SE</span>
            </a>
        </div>
    </div>
</div>
</body>
</html>
