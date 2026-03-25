<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('components.partials.favicon')
        <title>{{config('app.name')}}</title>
        @vite(['resources/css/landing.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#0a0a1a] text-white" style="overflow-x: hidden;">

        <section class="hero-wrapper">
            <video class="hero-video" autoplay muted loop playsinline>
                <source src="{{ asset('videos/hero-bg.mp4') }}" type="video/mp4">
            </video>
            <div class="hero-overlay"></div>

            <div class="particles">
                @for($i = 0; $i < 30; $i++)
                    <div class="particle" style="
                        left: {{ rand(0, 100) }}%;
                        width: {{ rand(2, 6) }}px;
                        height: {{ rand(2, 6) }}px;
                        animation-duration: {{ rand(5, 15) }}s;
                        animation-delay: {{ rand(0, 10) }}s;
                        background: rgba({{ rand(100, 200) }}, {{ rand(50, 120) }}, {{ rand(200, 255) }}, 0.5);
                    "></div>
                @endfor
            </div>

            <div class="hero-content">
                <img src="{{asset('images/brandname/horizontal-hall-dos-conquistadores.png')}}" alt="Hall dos Conquistadores" class="hero-logo w-72 md:w-96 mb-6" />
                <h1 class="hero-title font-pixel">Games e Informações</h1>
                <p class="hero-subtitle">
                    Com uma comunidade unida, você encontrará uma vasta coleção de
                    <span class="text-violet-400 font-semibold">informações sobre jogos clássicos</span>,
                    <span class="text-violet-400 font-semibold">lives da galera no YouTube</span>,
                    análises detalhadas, histórias curiosas e guias de gameplay.
                    O <span class="text-violet-400 font-semibold">Hall dos Conquistadores</span> mantém você atualizado
                    sobre campanhas, lançamentos, eventos e tendências.
                </p>
                <div class="hero-cta">
                    <a href="{{route('app.home')}}" class="btn-hero">
                        Acesse agora
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </div>

            <div class="scroll-indicator">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="7 13 12 18 17 13"/><polyline points="7 6 12 11 17 6"/>
                </svg>
            </div>
        </section>

        <section class="channels-section">
            <div class="channels-header">
                <h2 class="font-pixel">Canais da Comunidade</h2>
                <p>Acompanhe os criadores de conteúdo</p>
            </div>

            <div class="channels-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                @foreach($channels as $channel)
                    <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="channel-card">
                        <img src="{{Storage::url($channel->brand)}}" alt="{{$channel->title}}" />
                        <span class="name">{{$channel->title}}</span>
                        <span class="subs">
                            {{ $channel->followers_count }}
                            {{ $channel->followers_count == 1 ? 'inscrito' : 'inscritos' }}
                        </span>
                    </a>
                @endforeach
            </div>
        </section>

        <footer class="site-footer">
            <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
        </footer>

    </body>
</html>
