<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    @include('components.partials.favicon')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    @vite(['resources/css/landing.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="antialiased bg-[#0a0a1a] text-white" style="overflow-x: hidden;">

    <section class="hero-wrapper">
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
            <div class="logo-pulse">
                <img src="{{asset('images/brandname/Hall-dos-conquistadores.png')}}" alt="Hall dos Conquistadores"
                    class="hero-logo w-72 md:w-72 mb-6" />
            </div>
            <h1 class="hero-title font-pixel">Games e desafios</h1>
            <p class="hero-subtitle">
                O <span class="text-violet-400 font-semibold">Hall dos Conquistadores</span> é uma plataforma inovadora
                projetada para elevar a presença digital de criadores de conteúdo e entusiastas de RetroAchievements.
                Unimos a paixão pelos desafios clássicos à dinâmica do YouTube, oferecendo um ecossistema que prioriza
                a segurança, a escalabilidade e o respeito mútuo.
            </p>
            <div class="hero-cta">
                <a href="{{route('app.home')}}" class="btn-hero">
                    Acesse agora
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>

            <a href="#about" class="scroll-indicator">
                <div class="scroll-mouse">
                    <div class="scroll-wheel"></div>
                </div>
                <span class="scroll-text">Explore</span>
            </a>
        </div>
    </section>

    <section id="about" class="channels-section">
        <div class="stars-bg"></div>
        <div class="nebula-glow"></div>

        {{-- Retro Spaceship 1 --}}
        <div class="retro-ship ship-1">
            <div class="ship-body">
                <div class="ship-row">
                    <div class="px c1"></div>
                    <div class="px c2"></div>
                    <div class="px c2"></div>
                    <div class="px c1"></div>
                </div>
                <div class="ship-row">
                    <div class="px c3"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c3"></div>
                </div>
                <div class="ship-row">
                    <div class="px c5"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c5"></div>
                </div>
                <div class="ship-row">
                    <div class="px c3"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c3"></div>
                </div>
                <div class="ship-row">
                    <div class="px c1"></div>
                    <div class="px c2"></div>
                    <div class="px c2"></div>
                    <div class="px c1"></div>
                </div>
            </div>
            <div class="ship-engine">
                <div class="flame flame-1"></div>
                <div class="flame flame-2"></div>
                <div class="flame flame-3"></div>
            </div>
        </div>

        {{-- Retro Spaceship 2 --}}
        <div class="retro-ship ship-2">
            <div class="ship-body">
                <div class="ship-row">
                    <div class="px c1"></div>
                    <div class="px c2"></div>
                    <div class="px c2"></div>
                    <div class="px c1"></div>
                </div>
                <div class="ship-row">
                    <div class="px c3"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c3"></div>
                </div>
                <div class="ship-row">
                    <div class="px c5"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c5"></div>
                </div>
                <div class="ship-row">
                    <div class="px c3"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c4"></div>
                    <div class="px c3"></div>
                </div>
                <div class="ship-row">
                    <div class="px c1"></div>
                    <div class="px c2"></div>
                    <div class="px c2"></div>
                    <div class="px c1"></div>
                </div>
            </div>
            <div class="ship-engine">
                <div class="flame flame-1"></div>
                <div class="flame flame-2"></div>
                <div class="flame flame-3"></div>
            </div>
        </div>

        {{-- Projectiles from ships toward button --}}
        <div class="projectile p1"></div>
        <div class="projectile p2"></div>
        <div class="projectile p3"></div>
        <div class="projectile p4"></div>
        <div class="projectile p5"></div>
        <div class="projectile p6"></div>

        <div class="about-content">
            <div class="about-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5z" />
                    <path d="M2 17l10 5 10-5" />
                    <path d="M2 12l10 5 10-5" />
                </svg>
            </div>
            <h2 class="font-pixel">Objetivo da Comunidade</h2>
            <p class="about-subtitle">Faça parte dessa comunidade</p>

            <p id="text-sm" class="text-xs text-gray-400 leading-relaxed max-w-2xl mx-auto">
                Nosso objetivo é fomentar desafios coletivos e a busca pela "masterização", transformando as
                experiências individuais — de glórias e persistência — em uma jornada comunitária.
                Aqui, conectamos os inscritos aos seus canais favoritos em um ambiente imersivo,
                interativo e totalmente dedicado à cultura dos jogos retro.
            </p>

            <a href="{{ route('app.game') }}" class="game-btn">
                <span class="game-btn-pulse"></span>
                <span class="impact-flash"></span>
                <span class="game-btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="5 3 19 12 5 21 5 3" />
                    </svg>
                </span>
                Jogar agora
            </a>
        </div>

    </section>

    <footer class="site-footer">
        <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
        <span>Desenvolvido por <a href="https://github.com/RafaelBlum">Rafael Blum</a></span>
        <span> - Hall dos Conquistadores {{ date('Y') }}</span>
    </footer>
    @livewireScripts
</body>

</html>