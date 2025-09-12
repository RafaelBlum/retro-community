<div class="max-w-screen-xl px-4 pt-20 pb-2 mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 lg:pt-5 up">

    {{-- Textarea --}}
    <div class="flex flex-col justify-center items-center">
        <textarea class="w-80 h-40 p-3 border rounded-lg"
                  placeholder="insira nomes separados por vírgula ou espaço"
                  wire:model.live="inputNames"
        ></textarea>
    </div>

    {{-- Roleta --}}
    <div class="relative w-96 h-96 mx-auto">
        {{-- Fundo colorido --}}
        <div class="absolute inset-0 rounded-full"
             style="background: conic-gradient(
                 @foreach($names as $i => $name)
                     hsl({{ $i * (360 / count($names)) }}, 70%, 50%) {{ ($i * (100 / count($names))) }}% {{ (($i+1) * (100 / count($names))) }}%
                     @if(!$loop->last),@endif
                 @endforeach
             );">
        </div>

        {{-- Nomes --}}
        @foreach($names as $i => $n)
            @php
                $angle = $i * (360 / max(1, count($names)));
            @endphp
            <div class="absolute left-1/2 top-1/2 origin-center text-white font-bold text-sm"
                 style="transform: rotate({{ $angle }}deg) translate(130px) rotate(0deg);">
                {{ $n }}
            </div>
        @endforeach

        {{-- Ponteiro --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-2">
            <div class="w-0 h-0 border-l-8 border-r-8 border-b-[20px] border-l-transparent border-r-transparent border-b-red-600"></div>
        </div>

        {{-- Botão Girar --}}
        <button @click="spin()"
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                   bg-white text-slate-800 font-bold px-6 py-3 rounded-full shadow-lg border-4 border-slate-300 hover:bg-slate-100 transition">
            Girar
        </button>
    </div>





    {{-- Resultado --}}
    <div id="result"
         class="text-2xl font-bold text-white bg-slate-800 px-6 py-3 rounded shadow-md hidden text-center col-span-2">
    </div>
</div>

