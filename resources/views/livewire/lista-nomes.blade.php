<div class="flex space-x-6">
    {{-- Campo de texto --}}
    <textarea
        wire:model.live="inputNomes"
        placeholder="Digite nomes separados por vírgula ou espaço"
        class="w-80 h-40 p-3 border rounded-lg"
    ></textarea>

    {{-- Blocos de nomes --}}
    <div class="flex flex-wrap gap-2 w-80">
        @foreach($nomes as $nome)
            <span class="px-3 py-1 bg-blue-500 text-white rounded-lg shadow">
                {{ $nome }}
            </span>
        @endforeach
    </div>
</div>

