<div class="grid lg:grid-cols-3 gap-6">

    <!-- Painel lateral de controle -->
    <div class="rounded-lg shadow-lg p-6 space-y-4">
        <h2 class="text-xl font-bold">🎯 Controle da Roleta</h2>

        <textarea
            wire:model.debounce.500ms="inputNomes"
            placeholder="Digite nomes separados por vírgula"
            class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>

        @error('inputNomes')
        <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <button wire:click="girar"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded"
                @if($girando) disabled @endif>
            Girar
        </button>
    </div>

    <!-- Roleta -->
    <div class="col-span-2 flex justify-center items-center">
        @if(count($nomes) > 0)
            <div class="relative w-80 h-80">
                <div id="wheel" class="w-full h-full rounded-full border-8 border-gray-300 relative overflow-hidden transition-transform duration-[4000ms] ease-out shadow-lg">
                    <div id="wheel-bg" class="absolute inset-0 rounded-full"></div>
                    <div id="labels"></div>
                </div>

                <!-- Ponteiro -->
                <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                    <div class="w-0 h-0 border-l-8 border-r-8 border-b-[20px] border-l-transparent border-r-transparent border-b-red-600"></div>
                </div>
            </div>
        @endif
    </div>

    <!-- Resultado -->
    @if($result)
        <div class="col-span-3 mt-4 text-center text-xl font-bold text-green-700">
            🎉 Sorteado: {{ $result }}
        </div>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            let currentRotation = 0;

            function renderWheel() {
                const nomes = @json($nomes);
                if (!nomes.length) return;

                const slice = 360 / nomes.length;
                const colors = ['#f87171','#facc15','#4ade80','#60a5fa','#c084fc','#fb923c','#34d399','#f472b6','#a3e635','#38bdf8'];

                const wheelBg = document.getElementById('wheel-bg');
                const labels = document.getElementById('labels');
                if (!wheelBg || !labels) return;

                // Cria o fundo em conic-gradient
                const bg = nomes.map((_, i) => `${colors[i % colors.length]} ${slice*i}deg ${slice*(i+1)}deg`).join(', ');
                wheelBg.style.background = `conic-gradient(${bg})`;

                // Cria os labels
                labels.innerHTML = '';
                nomes.forEach((name, i) => {
                    const angle = slice * i;
                    const label = document.createElement('div');
                    label.className = 'absolute left-1/2 top-1/2 transform origin-bottom text-white font-semibold text-sm select-none';
                    label.style.transform = `rotate(${angle}deg) translateY(-140px) rotate(${-angle}deg)`;
                    label.innerText = name;
                    labels.appendChild(label);
                });
            }

            // Renderiza sempre que o componente atualizar
            Livewire.hook('message.processed', () => renderWheel());

            // Gira a roleta via evento disparado pelo backend
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

        });
    </script>
@endpush

