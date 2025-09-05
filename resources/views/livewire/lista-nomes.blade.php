<div class="flex space-x-6">
    {{-- Campo de texto --}}
    <textarea
        wire:model.live="inputNomes"
        placeholder="Digite nomes separados por vírgula ou espaço"
        class="w-80 h-40 p-3 border rounded-lg"
    ></textarea>

    {{-- Roleta visual --}}
    <div
        x-data="{ nomes: @entangle('nomes') }"
        class="relative flex items-center justify-center"
    >
        {{-- Círculo colorido --}}
        <div
            class="w-80 h-80 rounded-full flex items-center justify-center border-4 border-gray-700"
            :style="{
                background: `conic-gradient(${
                    nomes.map((_, i) => `hsl(${i * (360 / nomes.length)}, 70%, 50%) ${(i * 100 / nomes.length)}% ${(i+1) * 100 / nomes.length}%`).join(', ')
                })`
            }"
        >
            {{-- Ponteiro no meio --}}
            <div class="absolute top-2 left-1/2 transform -translate-x-1/2 text-2xl">
                🔻
            </div>
        </div>

        {{-- Nomes posicionados em volta --}}
        <template x-for="(nome, index) in nomes" :key="index">
            <div
                class="absolute left-1/2 top-1/2 text-sm font-bold text-white"
                :style="`
                    transform: rotate(${index * (360 / nomes.length)}deg) translate(100px);
                    transform-origin: center;
                `"
            >
                <span x-text="nome" class="block text-center"></span>
            </div>
        </template>
    </div>
</div>



