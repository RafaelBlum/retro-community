<div class="max-w-screen-xl px-4 pt-20 pb-2 mx-auto lg:gap-8 xl:gap-0 lg:py-16 grid grid-cols-1 lg:grid-cols-2 gap-6 lg:pt-5 up" style="border: greenyellow 1px solid">

    <div class="flex flex-col justify-center items-center" style="border: blue 1px solid">
        <textarea class="w-80 h-40 p-3 border rounded-lg basic-64"
                  placeholder="insira nomes"
                  wire:model.live="inputNames"
        ></textarea>
    </div>

    <div class="flex flex-col items-center justify-center space-y-6" style="border: #00bb00 1px solid">
            <!-- Roleta -->
            <div class="relative">

                <div id="wheel" class="w-96 h-96 rounded-full border-8 border-white relative overflow-hidden transition-transform duration-[4000ms] ease-out">

                    <!-- Fatias -->
                    <div class="absolute inset-0 rounded-full"
                         style="background: conic-gradient(
                                #f87171 0% 10%,
                                #facc15 10% 20%,
                                #4ade80 20% 30%,
                                #60a5fa 30% 40%,
                                #c084fc 40% 50%,
                                #fb923c 50% 60%,
                                #34d399 60% 70%,
                                #f472b6 70% 80%,
                                #a3e635 80% 90%,
                                #38bdf8 90% 100%
                         );">
                    </div>


                    @foreach($names as $n)
                        <div class="absolute top-4 left-1/2 transform -translate-x-1/2 rotate-[0deg] text-white font-semibold text-sm">{{$n}}</div>
                    @endforeach
                    <!-- Nomes -->
                </div>

                <!-- Ponteiro -->
                <div class="relative top-[-20px] left-1/2 transform -translate-x-1/2">
                    <div
                        class="w-0 h-0 border-l-8 border-r-8 border-b-[20px] border-l-transparent border-r-transparent border-b-red-600">
                    </div>
                </div>

                <!-- Botão -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <button onclick="spin()"
                            class="bg-white text-slate-800 font-bold px-6 py-3 rounded-full shadow-lg border-4 border-slate-300 hover:bg-slate-100 transition">
                        Girar
                    </button>
                </div>
            </div>

    </div>


    <!-- Resultado -->
    <div id="result" class="flex flex-col items-center justify-center space-y-6"
         class="text-2xl font-bold text-white bg-slate-800 px-6 py-3 rounded shadow-md hidden">
    </div>

    <div class="flex flex-wrap gap-2 w-80">
        @foreach($names as $n)
            <span class="px-3 py-1 bg-blue-500 text-white rounded-lg shadow">{{$n}}</span>
        @endforeach
    </div>

</div>
