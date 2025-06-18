<div class="flex flex-col items-center justify-center space-y-8">

    {{-- FORM --}}
    <div class="w-full max-w-xl">
        <textarea wire:model="inputNomes" rows="4"
                  placeholder="Digite os nomes separados por vírgula"
                  class="w-full p-4 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>

        @error('inputNomes')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="flex space-x-4 mt-4">
            <button wire:click="gerarRoleta"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-bold">
                Gerar Roleta
            </button>

            <button wire:click="girar" @disabled($girando)
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold">
                Girar
            </button>
        </div>
    </div>

    {{-- ROLETA --}}
    @if(count($nomes) >= 2)
        <div class="relative flex items-center justify-center">
            <div id="wheel"
                 class="w-96 h-96 rounded-full border-8 border-white relative overflow-hidden transition-transform duration-[4000ms] ease-out">
                <div id="wheel-bg" class="absolute inset-0 rounded-full"></div>
                <div id="labels"></div>
            </div>

            {{-- Ponteiro --}}
            <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                <div class="w-0 h-0 border-l-8 border-r-8 border-b-[20px] border-l-transparent border-r-transparent border-b-red-600"></div>
            </div>
        </div>
    @endif

    {{-- RESULTADO --}}
    @if($resultado)
        <div class="text-2xl font-bold text-white bg-slate-700 px-6 py-3 rounded shadow-md">
            🎉 Resultado: {{ $resultado }}
        </div>
    @endif
</div>


{{-- SCRIPT --}}
@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {
            let currentRotation = 0;

            Livewire.hook('message.processed', (message, component) => {
                renderWheel();
            });

            window.addEventListener('girar-roleta', event => {
                const index = event.detail.index;
                const total = event.detail.total;

                const slice = 360 / total;
                const stopAngle = index * slice + slice / 2;
                const extraSpins = 5 * 360;

                currentRotation = (currentRotation + extraSpins + (360 - stopAngle)) % 360;

                const wheel = document.getElementById('wheel');
                if (!wheel) return;
                wheel.style.transition = 'transform 4s ease-out';
                wheel.style.transform = `rotate(${currentRotation}deg)`;
            });

            function renderWheel() {
                const nomes = @json($nomes);
                const slice = 360 / nomes.length;
                const colors = [
                    '#f87171', '#facc15', '#4ade80', '#60a5fa', '#c084fc',
                    '#fb923c', '#34d399', '#f472b6', '#a3e635', '#38bdf8'
                ];

                const wheelBg = document.getElementById('wheel-bg');
                const labels = document.getElementById('labels');
                if (!wheelBg || !labels) return;

                const bg = nomes.map((_, i) => {
                    const start = slice * i;
                    const end = slice * (i + 1);
                    return `${colors[i % colors.length]} ${start}deg ${end}deg`;
                }).join(', ');

                wheelBg.style.background = `conic-gradient(${bg})`;

                labels.innerHTML = '';
                nomes.forEach((name, i) => {
                    const angle = slice * i;
                    const label = document.createElement('div');
                    label.className = 'absolute left-1/2 top-1/2 transform origin-bottom text-white font-semibold text-sm';
                    label.style.transform = `
                    rotate(${angle}deg)
                    translateY(-180px)
                    rotate(${-angle}deg)
                `;
                    label.innerText = name;
                    labels.appendChild(label);
                });
            }
        });
    </script>
@endpush
