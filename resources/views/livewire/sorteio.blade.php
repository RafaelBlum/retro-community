<div class="flex space-x-2">
    <textarea wire:model.live="inputNomes"
              class="w-80 h-40 p-3 border rounded-lg"
              placeholder="Insira os nomes por vírgula ou espaço"
    ></textarea>


    <div>
        @foreach($nomes as $nome)
            <span class="px-3 py-1 bg-blue-500 text-white rounded-lg shadow">
                {{$nome}}
            </span>
        @endforeach
    </div>
</div>
