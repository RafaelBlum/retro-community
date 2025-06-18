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

        // const names = [
        //     "João", "Maria", "Pedro", "Ana", "Lucas",
        //     "Carla", "Fernando", "Juliana", "Rafael", "Bianca"
        // ];
        //
        // const wheel = document.getElementById('wheel');
        // const wheelBg = document.getElementById('wheel-bg');
        // const labels = document.getElementById('labels');
        // const result = document.getElementById('result');
        //
        // let spinning = false;
        // let currentRotation = 0;
        //
        // // Função para desenhar a roleta
        // function renderWheel() {
        //     const slice = 360 / names.length;
        //
        //     // Gerar o conic-gradient
        //     const colors = [
        //         "#f87171", "#facc15", "#4ade80", "#60a5fa", "#c084fc",
        //         "#fb923c", "#34d399", "#f472b6", "#a3e635", "#38bdf8"
        //     ];
        //     const bg = names.map((_, i) => {
        //         const start = slice * i;
        //         const end = slice * (i + 1);
        //         return `${colors[i % colors.length]} ${start}deg ${end}deg`;
        //     }).join(', ');
        //
        //     wheelBg.style.background = `conic-gradient(${bg})`;
        //
        //     // Limpar labels antigos
        //     labels.innerHTML = '';
        //
        //     // Adicionar labels posicionados
        //     names.forEach((name, i) => {
        //         const angle = slice * i;
        //         const label = document.createElement('div');
        //         label.className = 'absolute left-1/2 top-1/2 transform origin-bottom text-white font-semibold text-sm';
        //         label.style.transform = `
        //     rotate(${angle}deg)
        //     translateY(-180px)
        //     rotate(${-angle}deg)
        // `;
        //         label.innerText = name;
        //         labels.appendChild(label);
        //     });
        // }
        //
        // // Função de giro
        // function spin() {
        //     if (spinning) return;
        //     spinning = true;
        //     result.classList.add('hidden');
        //
        //     const slice = 360 / names.length;
        //     const randomIndex = Math.floor(Math.random() * names.length);
        //     const extraSpins = 5 * 360;
        //     const stopAngle = randomIndex * slice + slice / 2;
        //
        //     const targetRotation = extraSpins + (360 - stopAngle);
        //
        //     currentRotation = (currentRotation + targetRotation) % 360;
        //
        //     wheel.style.transition = 'transform 4s ease-out';
        //     wheel.style.transform = `rotate(${currentRotation}deg)`;
        //
        //     setTimeout(() => {
        //         spinning = false;
        //         result.innerText = `🎉 Resultado: ${names[randomIndex]}`;
        //         result.classList.remove('hidden');
        //     }, 4000);
        // }
        //
        // // Inicializa
        // renderWheel();



    </script>
</html>
