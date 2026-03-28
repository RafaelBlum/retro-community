{{-- resources/views/landing.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR" x-data="{ dark: true }" :class="dark ? 'dark' : ''">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intruder Users</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');

        body {
            font-family: 'Share Tech Mono', monospace;
            transition: background-color 0.5s ease;
        }

        .dark body,
        html.dark body {
            background-color: #0a0a1a;
        }

        .light-body {
            background-color: #f0e6ff;
        }

        canvas {
            image-rendering: pixelated;
        }

        .scanlines::after {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(to bottom,
                    transparent,
                    transparent 2px,
                    rgba(0, 0, 0, 0.08) 2px,
                    rgba(0, 0, 0, 0.08) 4px);
            pointer-events: none;
        }

        .synthwave-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .synthwave-bg .grid-floor {
            position: absolute;
            bottom: 0;
            left: -50%;
            width: 200%;
            height: 60%;
            background:
                linear-gradient(rgba(139, 92, 246, 0.15) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.15) 1px, transparent 1px);
            background-size: 60px 60px;
            transform: perspective(400px) rotateX(60deg);
            transform-origin: center top;
            animation: gridScroll 2s linear infinite;
        }

        @keyframes gridScroll {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 0 60px;
            }
        }

        .synthwave-bg .gradient-top {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to bottom,
                    #0a0a1a 0%,
                    rgba(30, 10, 60, 0.8) 60%,
                    transparent 100%);
        }

        .synthwave-bg .stars {
            position: absolute;
            inset: 0;
        }

        .synthwave-bg .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s ease-in-out infinite alternate;
        }

        @keyframes twinkle {
            0% {
                opacity: 0.2;
            }

            100% {
                opacity: 1;
            }
        }

        /* Light mode synthwave */
        .synthwave-bg-light {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .synthwave-bg-light .grid-floor {
            position: absolute;
            bottom: 0;
            left: -50%;
            width: 200%;
            height: 60%;
            background:
                linear-gradient(rgba(168, 85, 247, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168, 85, 247, 0.1) 1px, transparent 1px);
            background-size: 60px 60px;
            transform: perspective(400px) rotateX(60deg);
            transform-origin: center top;
            animation: gridScroll 2s linear infinite;
        }

        .synthwave-bg-light .gradient-top {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to bottom,
                    #f0e6ff 0%,
                    rgba(233, 213, 255, 0.8) 60%,
                    transparent 100%);
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .blink {
            animation: blink 1s step-end infinite;
        }

        @keyframes flash {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }
        }

        .flash {
            animation: flash 0.15s ease-in-out 3;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center p-4 select-none relative"
    :class="dark ? 'bg-[#0a0a1a] text-green-400' : 'bg-[#f0e6ff] text-purple-700'">

    {{-- Synthwave Background Dark --}}
    <div x-show="dark" class="synthwave-bg">
        <div class="gradient-top"></div>
        <div class="grid-floor"></div>
        <div class="stars" id="stars-dark"></div>
    </div>

    {{-- Synthwave Background Light --}}
    <div x-show="!dark" class="synthwave-bg-light">
        <div class="gradient-top"></div>
        <div class="grid-floor"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 w-full max-w-2xl">
        {{-- Logo + Dark/Light Toggle --}}
        <div class="flex items-center justify-center relative mb-4">
            <a href="{{ route('app.home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-xs transition-colors cursor-pointer"
                :class="dark ? 'text-green-700 hover:text-green-400' : 'text-purple-400 hover:text-purple-600'">
                ◀ HOME
            </a>
            <img src="{{ asset('images/game/conqueros-invaders-logo.png') }}" alt="Intruder Users"
                class="h-20 md:h-24 object-contain drop-shadow-lg">
            <button @click="dark = !dark"
                class="absolute right-0 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-500 cursor-pointer"
                :class="dark ? 'bg-yellow-500/20 hover:bg-yellow-500/30' : 'bg-indigo-500/20 hover:bg-indigo-500/30'"
                :style="dark ? 'box-shadow: 0 0 15px 5px rgba(250,204,21,0.3)' : 'box-shadow: 0 0 15px 5px rgba(192,132,252,0.3)'">

                {{-- Sun pixel art (dark mode) --}}
                <svg x-show="dark" class="w-6 h-6 transition-all duration-500" viewBox="0 0 16 16"
                    style="image-rendering: pixelated">
                    <rect x="7" y="0" width="2" height="2" fill="#facc15" />
                    <rect x="3" y="1" width="2" height="1" fill="#fde047" />
                    <rect x="11" y="1" width="2" height="1" fill="#fde047" />
                    <rect x="5" y="3" width="6" height="2" fill="#facc15" />
                    <rect x="5" y="3" width="6" height="2" fill="#facc15" />
                    <rect x="0" y="5" width="2" height="2" fill="#fde047" />
                    <rect x="14" y="5" width="2" height="2" fill="#fde047" />
                    <rect x="3" y="5" width="10" height="6" fill="#facc15" />
                    <rect x="4" y="6" width="8" height="4" fill="#fde047" />
                    <rect x="5" y="7" width="6" height="2" fill="#fef08a" />
                    <rect x="0" y="9" width="2" height="2" fill="#fde047" />
                    <rect x="14" y="9" width="2" height="2" fill="#fde047" />
                    <rect x="5" y="11" width="6" height="2" fill="#facc15" />
                    <rect x="3" y="13" width="2" height="1" fill="#fde047" />
                    <rect x="11" y="13" width="2" height="1" fill="#fde047" />
                    <rect x="7" y="14" width="2" height="2" fill="#facc15" />
                </svg>

                {{-- Moon pixel art (light mode) --}}
                <svg x-show="!dark" class="w-6 h-6 transition-all duration-500" viewBox="0 0 16 16"
                    style="image-rendering: pixelated">
                    <rect x="6" y="0" width="2" height="2" fill="#c084fc" />
                    <rect x="3" y="1" width="3" height="2" fill="#a855f7" />
                    <rect x="10" y="2" width="2" height="2" fill="#a855f7" />
                    <rect x="1" y="3" width="3" height="2" fill="#a855f7" />
                    <rect x="12" y="4" width="2" height="2" fill="#a855f7" />
                    <rect x="1" y="5" width="3" height="2" fill="#a855f7" />
                    <rect x="13" y="6" width="2" height="2" fill="#a855f7" />
                    <rect x="2" y="7" width="2" height="2" fill="#a855f7" />
                    <rect x="13" y="8" width="2" height="2" fill="#a855f7" />
                    <rect x="1" y="9" width="3" height="2" fill="#a855f7" />
                    <rect x="12" y="10" width="2" height="2" fill="#a855f7" />
                    <rect x="1" y="11" width="3" height="2" fill="#a855f7" />
                    <rect x="10" y="12" width="2" height="2" fill="#a855f7" />
                    <rect x="3" y="13" width="3" height="2" fill="#a855f7" />
                    <rect x="6" y="14" width="2" height="2" fill="#c084fc" />
                </svg>
            </button>
        </div>

        {{--
        ╔══════════════════════════════════════════════════════╗
        ║ No controller, passe os usuários para a view assim: ║
        ║ ║
        ║ return view('landing', [ ║
        ║ 'users' => \App\Models\User::all(['id','name']) ║
        ║ ]); ║
        ╚══════════════════════════════════════════════════════╝
        --}}

        <div x-data="spaceInvaders({{ $users->map(fn($u) => ['id' => $u->id, 'name' => $u->name])->toJson() }})"
            x-init="init()" class="w-full max-w-2xl">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-3 px-1">
                <div>
                    <span class="text-xs" :class="dark ? 'text-green-600' : 'text-purple-400'">SCORE</span>
                    <div class="text-2xl" :class="dark ? 'text-green-300' : 'text-purple-600'"
                        x-text="score.toString().padStart(6,'0')">000000</div>
                </div>
                <div class="text-center">
                    <div class="text-sm" :class="dark ? 'text-green-500' : 'text-purple-500'">INTRUDER USERS</div>
                    <div class="text-xs mt-0.5" :class="dark ? 'text-green-700' : 'text-purple-300'">v1.0.0</div>
                </div>
                <div class="text-right">
                    <span class="text-xs" :class="dark ? 'text-green-600' : 'text-purple-400'">VIDAS</span>
                    <div class="flex gap-1 justify-end mt-0.5">
                        <template x-for="i in 3" :key="i">
                            <svg class="w-6 h-6" viewBox="0 0 16 16" :style="i <= lives ? '' : 'opacity: 0.2'">
                                <rect x="3" y="0" width="2" height="2" :fill="dark ? '#4ade80' : '#a855f7'" />
                                <rect x="5" y="0" width="2" height="2" :fill="dark ? '#4ade80' : '#a855f7'" />
                                <rect x="9" y="0" width="2" height="2" :fill="dark ? '#4ade80' : '#a855f7'" />
                                <rect x="11" y="0" width="2" height="2" :fill="dark ? '#4ade80' : '#a855f7'" />
                                <rect x="1" y="2" width="2" height="2" :fill="dark ? '#4ade80' : '#a855f7'" />
                                <rect x="3" y="2" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="5" y="2" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="7" y="2" width="2" height="2" :fill="dark ? '#4ade80' : '#a855f7'" />
                                <rect x="9" y="2" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="11" y="2" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="13" y="2" width="2" height="2" :fill="dark ? '#4ade80' : '#a855f7'" />
                                <rect x="1" y="4" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="3" y="4" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="5" y="4" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="7" y="4" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="9" y="4" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="11" y="4" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="13" y="4" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="3" y="6" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="5" y="6" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="7" y="6" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="9" y="6" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="11" y="6" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="5" y="8" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="7" y="8" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="9" y="8" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                                <rect x="7" y="10" width="2" height="2" :fill="dark ? '#86efac' : '#c084fc'" />
                            </svg>
                        </template>
                    </div>
                </div>
            </div>

            {{-- Game Canvas --}}
            <div class="relative scanlines rounded-lg overflow-hidden border bg-gray-900 shadow-lg"
                :class="dark ? 'border-green-900 shadow-green-900/30' : 'border-purple-300 shadow-purple-500/20'">
                <canvas x-ref="canvas" width="640" height="480" class="w-full block"></canvas>

                {{-- Overlay: Start Screen --}}
                <div x-show="state === 'idle'" x-transition:leave="transition-opacity duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="absolute inset-0 flex flex-col items-center justify-center bg-gray-900/90">
                    <div class="text-3xl text-green-300 mb-2">👾 INTRUDER USERS</div>
                    <div class="text-green-600 text-sm mb-6">
                        <span x-text="users.length"></span> usuários cadastrados
                    </div>
                    <button @click="startGame()"
                        class="border border-green-500 text-green-400 px-8 py-2 text-sm hover:bg-green-900/40 transition-colors cursor-pointer">
                        [ INICIAR JOGO ]
                    </button>
                    <div class="mt-6 text-xs text-green-800 space-y-1 text-center">
                        <div>← → MOVER &nbsp; ESPAÇO ATIRAR</div>
                        <div>Mobile: botões abaixo</div>
                    </div>
                </div>

                {{-- Overlay: Game Over --}}
                <div x-show="state === 'gameover'" x-transition:enter="transition-opacity duration-500"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    class="absolute inset-0 flex flex-col items-center justify-center bg-gray-900/90">
                    <div class="text-red-400 text-3xl mb-2">GAME OVER</div>
                    <div class="text-green-600 text-sm mb-1">Pontuação Final</div>
                    <div class="text-green-300 text-4xl mb-6" x-text="score.toString().padStart(6,'0')"></div>
                    <button @click="startGame()"
                        class="border border-green-500 text-green-400 px-8 py-2 text-sm hover:bg-green-900/40 transition-colors cursor-pointer">
                        [ JOGAR NOVAMENTE ]
                    </button>
                </div>

                {{-- Overlay: Victory --}}
                <div x-show="state === 'victory'" x-transition:enter="transition-opacity duration-500"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    class="absolute inset-0 flex flex-col items-center justify-center bg-gray-900/90">
                    <div class="text-yellow-300 text-3xl mb-2">🏆 VITÓRIA!</div>
                    <div class="text-green-600 text-sm mb-1">Todos os usuários eliminados!</div>
                    <div class="text-green-300 text-4xl mb-6" x-text="score.toString().padStart(6,'0')"></div>
                    <button @click="nextWave()"
                        class="border border-yellow-500 text-yellow-400 px-8 py-2 text-sm hover:bg-yellow-900/40 transition-colors cursor-pointer">
                        [ PRÓXIMA ONDA ]
                    </button>
                </div>
            </div>

            {{-- Mobile Controls --}}
            <div class="flex justify-between items-center mt-4 px-4 gap-4" x-show="state === 'playing'">
                <div class="flex gap-2">
                    <button @touchstart.prevent="keys.left = true" @touchend.prevent="keys.left = false"
                        @mousedown="keys.left = true" @mouseup="keys.left = false"
                        class="border w-14 h-14 text-xl rounded-lg cursor-pointer"
                        :class="dark ? 'bg-green-900/30 border-green-800 text-green-400 active:bg-green-800/40' : 'bg-purple-100 border-purple-300 text-purple-600 active:bg-purple-200'">◀</button>
                    <button @touchstart.prevent="keys.right = true" @touchend.prevent="keys.right = false"
                        @mousedown="keys.right = true" @mouseup="keys.right = false"
                        class="border w-14 h-14 text-xl rounded-lg cursor-pointer"
                        :class="dark ? 'bg-green-900/30 border-green-800 text-green-400 active:bg-green-800/40' : 'bg-purple-100 border-purple-300 text-purple-600 active:bg-purple-200'">▶</button>
                </div>
                <button @touchstart.prevent="shoot()" @click="shoot()"
                    class="border px-10 h-14 text-sm rounded-lg cursor-pointer"
                    :class="dark ? 'bg-green-900/30 border-green-500 text-green-300 active:bg-green-700/40' : 'bg-purple-100 border-purple-400 text-purple-600 active:bg-purple-200'">ATIRAR</button>
            </div>

            {{-- Wave indicator --}}
            <div class="flex justify-center mt-3 gap-1" x-show="state !== 'idle'">
                <span class="text-xs" :class="dark ? 'text-green-700' : 'text-purple-400'">ONDA</span>
                <span class="text-xs" :class="dark ? 'text-green-500' : 'text-purple-600'" x-text="wave"></span>
            </div>
        </div>

        <script>
            function spaceInvaders(users) {
                return {
                    // ─── Estado Alpine ───────────────────────────────────────────
                    users,
                    state: 'idle',   // 'idle' | 'playing' | 'gameover' | 'victory'
                    score: 0,
                    lives: 3,
                    wave: 1,
                    keys: { left: false, right: false, space: false },

                    // ─── Internals do jogo ───────────────────────────────────────
                    ctx: null,
                    canvas: null,
                    animFrame: null,
                    lastTime: 0,
                    audioCtx: null,

                    // Entidades
                    player: null,
                    bullets: [],        // { x, y, speed }
                    enemies: [],        // { x, y, letter, color, alive, dx, dy }
                    enemyBullets: [],   // { x, y }
                    barriers: [],       // { x, y, health }
                    particles: [],      // efeitos de explosão

                    // Cadência de tiro inimigo
                    enemyShootTimer: 0,
                    enemyShootInterval: 1800, // ms
                    playerShootCooldown: 0,
                    playerShootDelay: 350,

                    // Movimento dos inimigos
                    enemyDir: 1,
                    enemySpeed: 40,    // px/s
                    enemyDropped: false,

                    // ─── Init ────────────────────────────────────────────────────
                    init() {
                        this.canvas = this.$refs.canvas;
                        this.ctx = this.canvas.getContext('2d');
                        this.drawIdleScreen();
                        this.setupKeyboard();
                    },

                    // Inicializa o AudioContext na primeira interação do usuário
                    initAudio() {
                        if (this.audioCtx) return;
                        this.audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                    },

                    // ─── Sons (Web Audio API — síntese pura, sem arquivos) ───────

                    // Tiro do jogador: pulso curto agudo
                    soundPlayerShoot() {
                        if (!this.audioCtx) return;
                        const ac = this.audioCtx;
                        const osc = ac.createOscillator();
                        const gain = ac.createGain();
                        osc.connect(gain);
                        gain.connect(ac.destination);
                        osc.type = 'square';
                        osc.frequency.setValueAtTime(880, ac.currentTime);
                        osc.frequency.exponentialRampToValueAtTime(220, ac.currentTime + 0.08);
                        gain.gain.setValueAtTime(0.18, ac.currentTime);
                        gain.gain.exponentialRampToValueAtTime(0.001, ac.currentTime + 0.1);
                        osc.start(ac.currentTime);
                        osc.stop(ac.currentTime + 0.1);
                    },

                    // Tiro inimigo: tom mais grave e sinistro
                    soundEnemyShoot() {
                        if (!this.audioCtx) return;
                        const ac = this.audioCtx;
                        const osc = ac.createOscillator();
                        const gain = ac.createGain();
                        osc.connect(gain);
                        gain.connect(ac.destination);
                        osc.type = 'sawtooth';
                        osc.frequency.setValueAtTime(180, ac.currentTime);
                        osc.frequency.exponentialRampToValueAtTime(80, ac.currentTime + 0.12);
                        gain.gain.setValueAtTime(0.12, ac.currentTime);
                        gain.gain.exponentialRampToValueAtTime(0.001, ac.currentTime + 0.13);
                        osc.start(ac.currentTime);
                        osc.stop(ac.currentTime + 0.13);
                    },

                    // Explosão de inimigo: ruído com envelope
                    soundEnemyDie() {
                        if (!this.audioCtx) return;
                        const ac = this.audioCtx;
                        const bufSize = ac.sampleRate * 0.22;
                        const buf = ac.createBuffer(1, bufSize, ac.sampleRate);
                        const data = buf.getChannelData(0);
                        for (let i = 0; i < bufSize; i++) data[i] = Math.random() * 2 - 1;
                        const src = ac.createBufferSource();
                        src.buffer = buf;
                        const gain = ac.createGain();
                        const filter = ac.createBiquadFilter();
                        filter.type = 'bandpass';
                        filter.frequency.value = 400;
                        filter.Q.value = 0.8;
                        src.connect(filter);
                        filter.connect(gain);
                        gain.connect(ac.destination);
                        gain.gain.setValueAtTime(0.35, ac.currentTime);
                        gain.gain.exponentialRampToValueAtTime(0.001, ac.currentTime + 0.22);
                        src.start(ac.currentTime);
                        src.stop(ac.currentTime + 0.22);
                    },

                    // Jogador levou hit: buzz grave
                    soundPlayerHit() {
                        if (!this.audioCtx) return;
                        const ac = this.audioCtx;
                        const osc = ac.createOscillator();
                        const gain = ac.createGain();
                        osc.connect(gain);
                        gain.connect(ac.destination);
                        osc.type = 'sawtooth';
                        osc.frequency.setValueAtTime(120, ac.currentTime);
                        osc.frequency.exponentialRampToValueAtTime(40, ac.currentTime + 0.3);
                        gain.gain.setValueAtTime(0.25, ac.currentTime);
                        gain.gain.exponentialRampToValueAtTime(0.001, ac.currentTime + 0.3);
                        osc.start(ac.currentTime);
                        osc.stop(ac.currentTime + 0.3);
                    },

                    // Vitória: jingle ascendente
                    soundVictory() {
                        if (!this.audioCtx) return;
                        const ac = this.audioCtx;
                        const notes = [523, 659, 784, 1047]; // C5 E5 G5 C6
                        notes.forEach((freq, i) => {
                            const osc = ac.createOscillator();
                            const gain = ac.createGain();
                            osc.connect(gain);
                            gain.connect(ac.destination);
                            osc.type = 'triangle';
                            osc.frequency.value = freq;
                            const t = ac.currentTime + i * 0.13;
                            gain.gain.setValueAtTime(0, t);
                            gain.gain.linearRampToValueAtTime(0.2, t + 0.04);
                            gain.gain.exponentialRampToValueAtTime(0.001, t + 0.25);
                            osc.start(t);
                            osc.stop(t + 0.26);
                        });
                    },

                    // Game Over: jingle descendente
                    soundGameOver() {
                        if (!this.audioCtx) return;
                        const ac = this.audioCtx;
                        const notes = [392, 330, 262, 196]; // G4 E4 C4 G3
                        notes.forEach((freq, i) => {
                            const osc = ac.createOscillator();
                            const gain = ac.createGain();
                            osc.connect(gain);
                            gain.connect(ac.destination);
                            osc.type = 'sawtooth';
                            osc.frequency.value = freq;
                            const t = ac.currentTime + i * 0.18;
                            gain.gain.setValueAtTime(0, t);
                            gain.gain.linearRampToValueAtTime(0.18, t + 0.05);
                            gain.gain.exponentialRampToValueAtTime(0.001, t + 0.35);
                            osc.start(t);
                            osc.stop(t + 0.36);
                        });
                    },

                    setupKeyboard() {
                        window.addEventListener('keydown', (e) => {
                            if (e.code === 'ArrowLeft') this.keys.left = true;
                            if (e.code === 'ArrowRight') this.keys.right = true;
                            if (e.code === 'Space') {
                                e.preventDefault();
                                if (this.state === 'idle' || this.state === 'gameover') {
                                    this.startGame();
                                } else if (this.state === 'victory') {
                                    this.nextWave();
                                } else {
                                    this.shoot();
                                }
                            }
                        });
                        window.addEventListener('keyup', (e) => {
                            if (e.code === 'ArrowLeft') this.keys.left = false;
                            if (e.code === 'ArrowRight') this.keys.right = false;
                        });
                    },

                    // ─── Game Setup ──────────────────────────────────────────────
                    startGame() {
                        this.initAudio();
                        // Reset completo (novo jogo do zero)
                        this.score = 0;
                        this.lives = 3;
                        this.wave = 1;
                        this.enemySpeed = 40;
                        this._launchWave();
                    },

                    nextWave() {
                        this.initAudio();
                        // Próxima onda: mantém score, lives e wave (já incrementados em endGame)
                        this.enemySpeed = 40 + (this.wave - 1) * 10;
                        this._launchWave();
                    },

                    _launchWave() {
                        if (this.animFrame) cancelAnimationFrame(this.animFrame);
                        this.animFrame = null;

                        const W = this.canvas.width;
                        const H = this.canvas.height;

                        this.bullets = [];
                        this.enemyBullets = [];
                        this.particles = [];
                        this.enemyDir = 1;
                        this.enemyShootTimer = 0;
                        this.playerShootCooldown = 0;

                        // Player
                        this.player = { x: W / 2, y: H - 50, w: 36, h: 20, speed: 220 };

                        // Barriers (4 bunkers)
                        this.barriers = [];
                        const bPositions = [0.18, 0.38, 0.62, 0.82];
                        for (const bx of bPositions) {
                            for (let bi = 0; bi < 8; bi++) {
                                const col = bi % 4;
                                const row = Math.floor(bi / 4);
                                this.barriers.push({
                                    x: bx * W - 24 + col * 12,
                                    y: H - 100 + row * 12,
                                    health: 3
                                });
                            }
                        }

                        this.spawnEnemies();
                        this.state = 'playing';
                        this.lastTime = performance.now();
                        this.loop(this.lastTime);
                    },

                    spawnEnemies() {
                        const W = this.canvas.width;
                        this.enemies = [];
                        this.enemyDir = 1;
                        this.enemyDropped = false;

                        // Usa os usuários reais; se houver mais de 40, pega apenas os 40 primeiros
                        const pool = this.users.length > 0 ? this.users : [{ name: 'Guest' }];
                        const cols = Math.min(10, pool.length);
                        const rows = Math.ceil(Math.min(pool.length, 40) / cols);

                        const colors = ['#4ade80', '#34d399', '#a3e635', '#22d3ee', '#60a5fa', '#f472b6', '#fb923c', '#facc15'];

                        let idx = 0;
                        for (let r = 0; r < rows; r++) {
                            for (let c = 0; c < cols && idx < pool.length && idx < 40; c++, idx++) {
                                this.enemies.push({
                                    x: 60 + c * 54,
                                    y: 60 + r * 52,
                                    w: 36, h: 36,
                                    letter: pool[idx].name.charAt(0).toUpperCase(),
                                    color: colors[(r * cols + c) % colors.length],
                                    name: pool[idx].name,
                                    alive: true,
                                    animOffset: Math.random() * Math.PI * 2,
                                });
                            }
                        }
                    },

                    // ─── Game Loop ───────────────────────────────────────────────
                    loop(timestamp) {
                        const dt = Math.min((timestamp - this.lastTime) / 1000, 0.05); // cap 50ms
                        this.lastTime = timestamp;

                        if (this.state === 'playing') {
                            this.update(dt, timestamp);
                            this.draw(timestamp);
                            this.animFrame = requestAnimationFrame(t => this.loop(t));
                        }
                    },

                    // ─── Update ──────────────────────────────────────────────────
                    update(dt, now) {
                        const W = this.canvas.width;
                        const H = this.canvas.height;

                        // Player movement
                        if (this.keys.left) this.player.x = Math.max(this.player.w / 2, this.player.x - this.player.speed * dt);
                        if (this.keys.right) this.player.x = Math.min(W - this.player.w / 2, this.player.x + this.player.speed * dt);

                        // Player shoot cooldown
                        if (this.playerShootCooldown > 0) this.playerShootCooldown -= dt * 1000;

                        // Player bullets
                        this.bullets = this.bullets.filter(b => {
                            b.y -= 480 * dt;
                            return b.y > 0;
                        });

                        // Enemy movement
                        let hitWall = false;
                        const alive = this.enemies.filter(e => e.alive);
                        for (const e of alive) {
                            e.x += this.enemyDir * (this.enemySpeed + this.wave * 8) * dt;
                            if (e.x + e.w / 2 >= W - 10 || e.x - e.w / 2 <= 10) hitWall = true;
                        }
                        if (hitWall) {
                            this.enemyDir *= -1;
                            for (const e of alive) e.y += 18;
                        }

                        // Enemy shoot
                        this.enemyShootTimer += dt * 1000;
                        if (this.enemyShootTimer >= this.enemyShootInterval && alive.length > 0) {
                            this.enemyShootTimer = 0;
                            const shooter = alive[Math.floor(Math.random() * alive.length)];
                            this.enemyBullets.push({ x: shooter.x, y: shooter.y + 20 });
                            this.soundEnemyShoot();
                            // Wave progresso: atiram mais rápido
                            this.enemyShootInterval = Math.max(400, 1800 - (this.wave - 1) * 200 - (40 - alive.length) * 18);
                        }

                        // Enemy bullets
                        this.enemyBullets = this.enemyBullets.filter(b => {
                            b.y += 240 * dt;
                            return b.y < H;
                        });

                        // Particles
                        this.particles = this.particles.filter(p => {
                            p.x += p.vx * dt;
                            p.y += p.vy * dt;
                            p.life -= dt;
                            p.vy += 80 * dt;
                            return p.life > 0;
                        });

                        // ── Colisões ──
                        // Bullet × Enemy
                        for (const b of this.bullets) {
                            for (const e of this.enemies) {
                                if (!e.alive) continue;
                                if (Math.abs(b.x - e.x) < e.w / 2 + 3 && Math.abs(b.y - e.y) < e.h / 2 + 3) {
                                    e.alive = false;
                                    b.y = -999; // remove bala
                                    this.score += 10 * this.wave;
                                    this.spawnExplosion(e.x, e.y, e.color);
                                    this.soundEnemyDie();
                                }
                            }
                        }

                        // Bullet × Barrier
                        for (const b of this.bullets) {
                            for (const bar of this.barriers) {
                                if (bar.health <= 0) continue;
                                if (b.x >= bar.x && b.x <= bar.x + 10 && b.y >= bar.y && b.y <= bar.y + 10) {
                                    bar.health--;
                                    b.y = -999;
                                }
                            }
                        }

                        // EnemyBullet × Player
                        for (const b of this.enemyBullets) {
                            if (Math.abs(b.x - this.player.x) < this.player.w / 2 + 4 &&
                                Math.abs(b.y - this.player.y) < this.player.h / 2 + 4) {
                                b.y = H + 1;
                                this.lives--;
                                this.spawnExplosion(this.player.x, this.player.y, '#4ade80');
                                this.soundPlayerHit();
                                if (this.lives <= 0) {
                                    this.endGame('gameover');
                                    return;
                                }
                            }
                        }

                        // EnemyBullet × Barrier
                        for (const b of this.enemyBullets) {
                            for (const bar of this.barriers) {
                                if (bar.health <= 0) continue;
                                if (b.x >= bar.x && b.x <= bar.x + 10 && b.y >= bar.y && b.y <= bar.y + 10) {
                                    bar.health--;
                                    b.y = H + 1;
                                }
                            }
                        }

                        // Enemy alcançou base
                        for (const e of this.enemies) {
                            if (e.alive && e.y + e.h / 2 >= H - 60) {
                                this.endGame('gameover');
                                return;
                            }
                        }

                        // Todos eliminados → vitória
                        if (alive.length === 0) {
                            this.wave++;
                            this.endGame('victory');
                        }
                    },

                    // ─── Shoot ───────────────────────────────────────────────────
                    shoot() {
                        if (this.state !== 'playing') return;
                        if (this.playerShootCooldown > 0) return;
                        this.bullets.push({ x: this.player.x, y: this.player.y - this.player.h / 2 });
                        this.playerShootCooldown = this.playerShootDelay;
                        this.soundPlayerShoot();
                    },

                    // ─── Explosão ────────────────────────────────────────────────
                    spawnExplosion(x, y, color) {
                        for (let i = 0; i < 12; i++) {
                            const angle = (Math.PI * 2 / 12) * i + Math.random() * 0.3;
                            const speed = 60 + Math.random() * 120;
                            this.particles.push({
                                x, y,
                                vx: Math.cos(angle) * speed,
                                vy: Math.sin(angle) * speed - 30,
                                life: 0.4 + Math.random() * 0.3,
                                maxLife: 0.7,
                                color,
                                size: 2 + Math.random() * 3,
                            });
                        }
                    },

                    // ─── End Game ────────────────────────────────────────────────
                    endGame(result) {
                        this.state = result;
                        if (this.animFrame) {
                            cancelAnimationFrame(this.animFrame);
                            this.animFrame = null;
                        }
                        if (result === 'victory') this.soundVictory();
                        if (result === 'gameover') this.soundGameOver();
                        // Faz um último draw para mostrar o estado final
                        this.draw(performance.now());
                    },

                    // ─── Draw ────────────────────────────────────────────────────
                    draw(now) {
                        const W = this.canvas.width;
                        const H = this.canvas.height;
                        const ctx = this.ctx;

                        // Background
                        ctx.fillStyle = '#030712';
                        ctx.fillRect(0, 0, W, H);

                        // Stars
                        ctx.fillStyle = 'rgba(255,255,255,0.4)';
                        // usa semente fixa para estrelas consistentes
                        const seed = 42;
                        for (let i = 0; i < 60; i++) {
                            const sx = ((seed * (i + 1) * 1234567) % W + W) % W;
                            const sy = ((seed * (i + 1) * 7654321) % H + H) % H;
                            const brightness = 0.2 + ((i * 37) % 10) / 10 * 0.8;
                            ctx.globalAlpha = brightness * (0.5 + 0.5 * Math.sin(now / 1000 + i));
                            ctx.fillRect(sx, sy, 1, 1);
                        }
                        ctx.globalAlpha = 1;

                        // Barriers
                        for (const bar of this.barriers) {
                            if (bar.health <= 0) continue;
                            const alpha = bar.health / 3;
                            ctx.fillStyle = `rgba(74, 222, 128, ${alpha})`;
                            ctx.fillRect(bar.x, bar.y, 10, 10);
                        }

                        // Player
                        this.drawPlayer(this.player.x, this.player.y, '#4ade80');

                        // Player bullets
                        for (const b of this.bullets) {
                            ctx.fillStyle = '#bbf7d0';
                            ctx.shadowBlur = 6;
                            ctx.shadowColor = '#4ade80';
                            ctx.fillRect(b.x - 2, b.y - 8, 4, 10);
                            ctx.shadowBlur = 0;
                        }

                        // Enemies
                        for (const e of this.enemies) {
                            if (!e.alive) continue;
                            this.drawEnemy(e, now);
                        }

                        // Enemy bullets
                        for (const b of this.enemyBullets) {
                            ctx.fillStyle = '#f87171';
                            ctx.shadowBlur = 6;
                            ctx.shadowColor = '#ef4444';
                            ctx.fillRect(b.x - 2, b.y, 4, 12);
                            ctx.shadowBlur = 0;
                        }

                        // Particles
                        for (const p of this.particles) {
                            const a = p.life / (p.maxLife || 0.7);
                            ctx.globalAlpha = a;
                            ctx.fillStyle = p.color;
                            ctx.beginPath();
                            ctx.arc(p.x, p.y, p.size * a, 0, Math.PI * 2);
                            ctx.fill();
                        }
                        ctx.globalAlpha = 1;

                        // Bottom line
                        ctx.strokeStyle = 'rgba(74, 222, 128, 0.3)';
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.moveTo(0, H - 42);
                        ctx.lineTo(W, H - 42);
                        ctx.stroke();
                    },

                    drawPlayer(x, y, color) {
                        const ctx = this.ctx;
                        ctx.fillStyle = color;
                        ctx.shadowBlur = 8;
                        ctx.shadowColor = color;
                        // Corpo da nave (forma de seta simples)
                        ctx.beginPath();
                        ctx.moveTo(x, y - 12);           // topo
                        ctx.lineTo(x + 18, y + 8);       // direita
                        ctx.lineTo(x + 10, y + 4);
                        ctx.lineTo(x + 10, y + 10);
                        ctx.lineTo(x - 10, y + 10);
                        ctx.lineTo(x - 10, y + 4);
                        ctx.lineTo(x - 18, y + 8);       // esquerda
                        ctx.closePath();
                        ctx.fill();
                        ctx.shadowBlur = 0;
                    },

                    drawEnemy(e, now) {
                        const ctx = this.ctx;
                        const t = now / 1000;
                        const bob = Math.sin(t * 2 + e.animOffset) * 3; // animação de flutuação

                        // Sombra/glow
                        ctx.shadowBlur = 12;
                        ctx.shadowColor = e.color;

                        // Círculo base
                        ctx.beginPath();
                        ctx.arc(e.x, e.y + bob, 16, 0, Math.PI * 2);
                        ctx.fillStyle = e.color + '33';
                        ctx.fill();

                        ctx.beginPath();
                        ctx.arc(e.x, e.y + bob, 14, 0, Math.PI * 2);
                        ctx.strokeStyle = e.color;
                        ctx.lineWidth = 1.5;
                        ctx.stroke();

                        // Letra do usuário
                        ctx.shadowBlur = 0;
                        ctx.fillStyle = e.color;
                        ctx.font = 'bold 14px "Share Tech Mono", monospace';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        ctx.fillText(e.letter, e.x, e.y + bob);

                        // Olhinhos alienígenas (detalhes)
                        ctx.fillStyle = '#030712';
                        ctx.beginPath();
                        ctx.arc(e.x - 5, e.y + bob - 2, 2, 0, Math.PI * 2);
                        ctx.arc(e.x + 5, e.y + bob - 2, 2, 0, Math.PI * 2);
                        ctx.fill();
                    },

                    drawIdleScreen() {
                        const ctx = this.ctx;
                        const W = this.canvas.width;
                        const H = this.canvas.height;
                        ctx.fillStyle = '#030712';
                        ctx.fillRect(0, 0, W, H);
                    },
                };
            }
        </script>

        <script>
            const starsContainer = document.getElementById('stars-dark');
            if (starsContainer) {
                for (let i = 0; i < 80; i++) {
                    const star = document.createElement('div');
                    star.className = 'star';
                    star.style.top = Math.random() * 50 + '%';
                    star.style.left = Math.random() * 100 + '%';
                    star.style.animationDelay = Math.random() * 3 + 's';
                    star.style.animationDuration = (2 + Math.random() * 3) + 's';
                    const size = Math.random() > 0.8 ? 3 : Math.random() > 0.5 ? 2 : 1;
                    star.style.width = size + 'px';
                    star.style.height = size + 'px';
                    starsContainer.appendChild(star);
                }
            }
        </script>
</body>

</html>