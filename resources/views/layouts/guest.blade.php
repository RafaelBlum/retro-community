<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            transition: background-color 2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body.night-mode {
            background-color: #0f172a;
        }

        body.day-mode {
            background-color: #1e3a5f;
        }

        .sun-toggle,
        .moon-toggle {
            transition: all 1.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .sun-toggle.hidden,
        .moon-toggle.hidden {
            transform: translateY(30px) rotate(180deg);
            opacity: 0;
            scale: 0.3;
            pointer-events: none;
            filter: blur(8px);
        }

        .moon-toggle span,
        .sun-toggle span {
            transition: all 1.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .moon-toggle:not(.hidden) span {
            animation: float-moon 4s ease-in-out infinite;
        }

        .sun-toggle:not(.hidden) span {
            animation: pulse-sun 3s ease-in-out infinite;
        }

        @keyframes float-moon {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(5deg);
            }
        }

        @keyframes pulse-sun {

            0%,
            100% {
                transform: scale(1);
                filter: drop-shadow(0 0 20px #fbbf24);
            }

            50% {
                transform: scale(1.1);
                filter: drop-shadow(0 0 40px #f59e0b) drop-shadow(0 0 60px #fbbf24);
            }
        }

        .card-header {
            transition: background 2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-header.night {
            background: linear-gradient(to bottom, #581c87, #1e1b4b);
        }

        .card-header.day {
            background: linear-gradient(to bottom, #38bdf8, #6366f1);
        }

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            transition: opacity 2s ease;
        }

        .star {
            position: absolute;
            width: 3px;
            height: 3px;
            background: white;
            border-radius: 50%;
            animation: twinkle 2s ease-in-out infinite alternate;
        }

        @keyframes twinkle {
            0% {
                opacity: 0.2;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        .day-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            background: radial-gradient(ellipse at top right, rgba(251, 191, 36, 0.15), transparent 60%);
            transition: opacity 2s ease;
        }

        .day-particles {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
            transition: opacity 2s ease;
        }

        .day-particle {
            position: absolute;
            bottom: -10px;
            border-radius: 50%;
            animation: float-up linear infinite;
        }

        @keyframes float-up {
            0% {
                transform: translateY(0) scale(0);
                opacity: 0;
            }
            10% {
                opacity: 0.7;
            }
            90% {
                opacity: 0.7;
            }
            100% {
                transform: translateY(-110vh) scale(1);
                opacity: 0;
            }
        }

        .mountain-far {
            transform-origin: bottom center;
            animation: mountain-breathe 8s ease-in-out infinite;
        }

        .mountain-near {
            transform-origin: bottom center;
            animation: mountain-breathe 6s ease-in-out infinite reverse;
        }

        .mountain-card-far {
            transform-origin: bottom center;
            animation: mountain-breathe 7s ease-in-out infinite;
            animation-delay: 1s;
        }

        .mountain-card-near {
            transform-origin: bottom center;
            animation: mountain-breathe 5s ease-in-out infinite reverse;
            animation-delay: 0.5s;
        }

        @keyframes mountain-breathe {
            0%, 100% {
                transform: scaleY(1);
                opacity: 0.4;
            }
            50% {
                transform: scaleY(1.06);
                opacity: 0.55;
            }
        }
    </style>
</head>

<body
    class="auth-page-gamer min-h-screen flex items-center justify-center font-sans antialiased overflow-hidden night-mode">

    <div id="stars" class="stars"></div>
    <div id="day-overlay" class="day-overlay" style="opacity: 0;"></div>
    <div id="day-particles" class="day-particles" style="opacity: 0;"></div>

    <div id="moon-toggle" class="moon-toggle absolute top-20 right-20 z-50 cursor-pointer">
        <span class="text-6xl drop-shadow-[0_0_20px_#fff]">🌙</span>
    </div>

    <div id="sun-toggle" class="sun-toggle absolute top-20 right-20 z-50 cursor-pointer">
        <span class="text-6xl drop-shadow-[0_0_20px_#fbbf24]">☀️</span>
    </div>

    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="mountain-far absolute bottom-0 w-full h-54 bg-indigo-950 opacity-40"
            style="clip-path: polygon(0% 100%, 15% 30%, 35% 80%, 50% 20%, 75% 85%, 100% 100%);"></div>

        <div class="mountain-near absolute bottom-0 w-full h-40 bg-indigo-900 opacity-60"
            style="clip-path: polygon(0% 100%, 25% 40%, 45% 75%, 65% 35%, 85% 70%, 100% 100%);"></div>
    </div>

    <div
        class="z-10 w-full max-w-md login-card rounded-2xl shadow-2xl overflow-hidden bg-[#0f172a]/90 backdrop-blur-md">
        <div id="card-header" class="card-header h-48 flex items-end justify-center relative night">

            <div class="mountain-card-far absolute bottom-0 w-full h-34 bg-indigo-950 opacity-40"
                style="clip-path: polygon(0% 100%, 15% 30%, 35% 80%, 50% 40%, 95% 120%, 100% 100%);"></div>

            <div class="mountain-card-near absolute bottom-0 w-full h-20 bg-indigo-900 opacity-60"
                style="clip-path: polygon(0% 100%, 25% 40%, 45% 75%, 65% 35%, 85% 70%, 100% 100%);"></div>

            <div
                class="z-30 mb-[-24px] bg-[#1e293b] rounded-xl px-4 py-2 border-2 border-indigo-500 shadow-2xl flex items-center justify-center up">
                <img src="{{ asset('images/brandname/horizontal-hall-dos-conquistadores.png') }}"
                    class="h-8 w-auto object-contain">
            </div>
        </div>

        <div class="p-8 pt-10">
            {{ $slot }}

            <div class="z-20 mt-6 animate-float">
                <a href="{{ route('register') }}"
                    class="bg-indigo-600/20 backdrop-blur-sm border border-indigo-500/50 px-6 py-2 rounded-full text-indigo-200 text-xs font-bold tracking-tighter hover:bg-indigo-600 transition-all duration-500 flex items-center gap-2">
                    🎮 AINDA NÃO É UM SEGUIDOR? <span class="text-green-400">CADASTRE-SE</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        (function () {
            const hour = new Date().getHours();
            let isNight = hour >= 18 || hour < 6;

            const moonToggle = document.getElementById('moon-toggle');
            const sunToggle = document.getElementById('sun-toggle');
            const cardHeader = document.getElementById('card-header');
            const body = document.body;
            const starsContainer = document.getElementById('stars');
            const dayOverlay = document.getElementById('day-overlay');
            const dayParticles = document.getElementById('day-particles');

            function createStars() {
                for (let i = 0; i < 50; i++) {
                    const star = document.createElement('div');
                    star.className = 'star';
                    star.style.top = Math.random() * 60 + '%';
                    star.style.left = Math.random() * 100 + '%';
                    star.style.animationDelay = Math.random() * 2 + 's';
                    star.style.animationDuration = (1.5 + Math.random() * 2) + 's';
                    star.style.width = (2 + Math.random() * 3) + 'px';
                    star.style.height = star.style.width;
                    starsContainer.appendChild(star);
                }
            }
            createStars();

            function createDayParticles() {
                const colors = [
                    'rgba(139, 92, 246, 0.5)',
                    'rgba(99, 102, 241, 0.5)',
                    'rgba(56, 189, 248, 0.4)',
                    'rgba(74, 222, 128, 0.4)',
                    'rgba(251, 191, 36, 0.3)',
                ];
                for (let i = 0; i < 25; i++) {
                    const p = document.createElement('div');
                    p.className = 'day-particle';
                    const size = 3 + Math.random() * 6;
                    p.style.width = size + 'px';
                    p.style.height = size + 'px';
                    p.style.left = Math.random() * 100 + '%';
                    p.style.background = colors[Math.floor(Math.random() * colors.length)];
                    p.style.animationDuration = (8 + Math.random() * 12) + 's';
                    p.style.animationDelay = Math.random() * 10 + 's';
                    dayParticles.appendChild(p);
                }
            }
            createDayParticles();

            function updateUI() {
                if (isNight) {
                    moonToggle.classList.remove('hidden');
                    sunToggle.classList.add('hidden');
                    cardHeader.classList.add('night');
                    cardHeader.classList.remove('day');
                    body.classList.add('night-mode');
                    body.classList.remove('day-mode');
                    starsContainer.style.opacity = '1';
                    dayOverlay.style.opacity = '0';
                    dayParticles.style.opacity = '0';
                } else {
                    moonToggle.classList.add('hidden');
                    sunToggle.classList.remove('hidden');
                    cardHeader.classList.add('day');
                    cardHeader.classList.remove('night');
                    body.classList.add('day-mode');
                    body.classList.remove('night-mode');
                    starsContainer.style.opacity = '0';
                    dayOverlay.style.opacity = '1';
                    dayParticles.style.opacity = '1';
                }
            }

            moonToggle.addEventListener('click', function () {
                isNight = false;
                updateUI();
            });

            sunToggle.addEventListener('click', function () {
                isNight = true;
                updateUI();
            });

            updateUI();
        })();
    </script>
</body>

</html>