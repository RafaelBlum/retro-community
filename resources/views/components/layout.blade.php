<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ isDarkMode: localStorage.getItem('dark') === 'true' }"
      x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="{'dark': isDarkMode}">
    <head>
        @include('components.partials.favicon')
        <title>{{config('app.name')}}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        {{$slot}}
    </body>

    <script>
        window.spin = function () {
            const wheel = document.getElementById('wheel');
            const result = document.getElementById('result');

            const names = ["João", "Maria", "Pedro", "Ana", "Lucas", "Carla", "Fernando", "Juliana", "Rafael", "Bianca"];

            const min = 1024;
            const max = 9999;
            const spins = Math.floor(Math.random() * (max - min)) + min;

            const deg = spins;

            wheel.style.transition = 'transform 4s ease-out';
            wheel.style.transform = `rotate(${deg}deg)`;

            wheel.addEventListener('transitionend', function handler() {
                const normalizedDeg = deg % 360;
                const sectorSize = 360 / names.length;
                const index = Math.floor(((360 - normalizedDeg + (sectorSize / 2)) % 360) / sectorSize);
                const selectedName = names[index];

                result.textContent = `🎉 Sorteado: ${selectedName} 🎉`;
                result.classList.remove('hidden');

                window.confetti();

                wheel.removeEventListener('transitionend', handler);
            });
        }


    </script>
</html>
