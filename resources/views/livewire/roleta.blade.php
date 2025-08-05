<div>

    <div class="mr-auto place-self-center lg:col-span-7">
        {{-- Textarea para entrada de nomes separados por vírgula --}}
        <textarea
            wire:model.defer="inputNomes" rows="4" placeholder="Digite os nomes separados por vírgula"
            class="w-full p-4 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
        ></textarea>


        {{-- Exibição de erros de validação --}}
        @error('inputNomes')
            <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
        @enderror

        {{-- Botões para gerar a roleta e girar --}}
        <div class="flex space-x-4 mt-4">
            <a
                wire:click="gerarRoleta"
                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded disabled:opacity-50"
                wire:loading.attr="disabled"
                wire:target="gerarRoleta"
            >
                Gerar Roleta
            </a>

            <button
                wire:click="girar"
                class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded disabled:opacity-50"
                @if($girando) disabled @endif
            >
                Girar
            </button>
        </div>
    </div>
    <div class="lg:col-span-5 lg:flex lg:items-end lg:justify-end">

        {{-- A roleta aparece somente se houver nomes --}}
        @if(count($nomes) > 0)
            <div class="relative mt-10 flex justify-center items-center">
                {{-- Círculo da roleta --}}
                <div
                    id="wheel"
                    class="w-80 h-80 rounded-full border-8 border-white relative overflow-hidden transition-transform duration-[4000ms] ease-out shadow-lg"
                >
                    {{-- Fundo com gradiente em setores --}}
                    <div id="wheel-bg" class="absolute inset-0 rounded-full"></div>

                    {{-- Labels com nomes --}}
                    <div id="labels"></div>
                </div>

                {{-- Ponteiro --}}
                <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                    <div
                        class="w-0 h-0 border-l-8 border-r-8 border-b-[20px] border-l-transparent border-r-transparent border-b-red-600"
                    ></div>
                </div>
            </div>
        @endif
    </div>

    {{-- Exibe o resultado do sorteio --}}
    @if($resultado)
        <div class="mt-8 px-6 py-3 bg-slate-700 text-white font-bold rounded shadow-md text-center text-xl" role="alert">
            🎉 Resultado: {{ $resultado }}
        </div>
    @endif

</div>

{{-- Script para gerar o gradiente, labels e animar a roleta --}}
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            let currentRotation = 0;

            // Renderiza a roleta quando o componente é atualizado
            Livewire.hook('message.processed', (message, component) => {
                renderWheel();
            });

            // Evento disparado pelo backend para girar a roleta
            window.addEventListener('girar-roleta', event => {
                const index = event.detail.index;
                const total = event.detail.total;

                const slice = 360 / total;
                const stopAngle = index * slice + slice / 2;
                const extraSpins = 5 * 360;

                // Calcula a rotação final
                currentRotation = (currentRotation + extraSpins + (360 - stopAngle)) % 360;

                const wheel = document.getElementById('wheel');
                if (!wheel) return;

                wheel.style.transition = 'transform 4s ease-out';
                wheel.style.transform = `rotate(${currentRotation}deg)`;
            });

            function renderWheel() {
                const nomes = @json($nomes);
                if (!nomes.length) return;

                const slice = 360 / nomes.length;
                const colors = [
                    '#f87171', '#facc15', '#4ade80', '#60a5fa', '#c084fc',
                    '#fb923c', '#34d399', '#f472b6', '#a3e635', '#38bdf8'
                ];

                const wheelBg = document.getElementById('wheel-bg');
                const labels = document.getElementById('labels');
                if (!wheelBg || !labels) return;

                // Cria o fundo em conic-gradient colorido
                const bg = nomes.map((_, i) => {
                    const start = slice * i;
                    const end = slice * (i + 1);
                    return `${colors[i % colors.length]} ${start}deg ${end}deg`;
                }).join(', ');

                wheelBg.style.background = `conic-gradient(${bg})`;

                // Limpa e cria os labels posicionados corretamente
                labels.innerHTML = '';
                nomes.forEach((name, i) => {
                    const angle = slice * i;
                    const label = document.createElement('div');
                    label.className = 'absolute left-1/2 top-1/2 transform origin-bottom text-white font-semibold text-sm select-none';
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
