<x-layout>
    <x-partials.navbar-section/>

    {{--  HEADER HOME  --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ $channel->name }}</h1>
                <p class="max-w-2xl mb-4 text-sm text-gray-500 lg:mb-8 md:text-base lg:text-base dark:text-gray-500">
                    Bem-vindo ao meu perfil <em class="text-purple-600 dark:text-purple-500">{{$channel->name}}</em> na {{config('app.name')}}!
                    <span>{{PHP_EOL . $channel->description}}</span>
                </p>
                <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="inline-flex justify-center items-center px-3 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg class="w-10 h-10 mt-3 mx-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="red" d="M14.712 4.633a1.754 1.754 0 00-1.234-1.234C12.382 3.11 8 3.11 8 3.11s-4.382 0-5.478.289c-.6.161-1.072.634-1.234 1.234C1 5.728 1 8 1 8s0 2.283.288 3.367c.162.6.635 1.073 1.234 1.234C3.618 12.89 8 12.89 8 12.89s4.382 0 5.478-.289a1.754 1.754 0 001.234-1.234C15 10.272 15 8 15 8s0-2.272-.288-3.367z"/>
                        <path fill="#ffffff" d="M6.593 10.11l3.644-2.098-3.644-2.11v4.208z"/>
                    </svg>
                    Acesse agora
                </a>
            </div>
            <div class="lg:col-span-5 lg:flex lg:items-end lg:justify-end">
                <div class="relative text-center">
                    <img src="{{ asset('images/hero-9.png') }}" alt="hero image" class="up vertical-loop-animation relative inset-0 object-cover z-10 mx-auto" width="600">
                    <img src="{{Storage::url($channel->brand)}}" alt="hero image" class="header_img_2 rounded-full absolute inset-0 z-20 mx-auto" width="400">
                </div>
            </div>
        </div>
    </section>


    <section class="bg-gray-50 dark:bg-gray-800 space-x-8 rounded-s-lg">
            <div class="mx-auto max-w-screen-xl max-w-screen-sm max-w-screen-md py-8 px-8">
                <div class="grid grid-cols-5 xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 gap-x-8 gap-y-8">
                    <div class="bg-yellow-400 rounded-lg shadow-xl min-h-[50px] col-span-3 row-span-3 card-text-center">1</div>
                    <div class="bg-red-400 rounded-lg shadow-xl min-h-[50px] card-text-center">2</div>
                    <div class="bg-orange-400 rounded-lg shadow-xl min-h-[50px] card-text-center">3</div>
                    <div class="bg-green-400 rounded-lg shadow-xl min-h-[50px] card-text-center">4</div>
                    <div class="bg-teal-400 rounded-lg shadow-xl min-h-[50px] card-text-center">5</div>
                    <div class="bg-blue-400 rounded-lg shadow-xl min-h-[50px] card-text-center">6</div>
                    <div class="bg-indigo-400 rounded-lg shadow-xl min-h-[50px] card-text-center">7</div>
                    <div class="bg-purple-400 rounded-lg shadow-xl min-h-[50px] card-text-center">8</div>
                    <div class="bg-pink-400 rounded-lg shadow-xl min-h-[50px] card-text-center">9</div>
                    <div class="bg-slate-400 rounded-lg shadow-xl min-h-[50px] card-text-center">10</div>
                </div>
        </div>
    </section>


    @if(auth()->user())
        {{-- COMPONENTE LIVEWIRE ROLLET --}}
        <section class="bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0 px-4 py-2 lg:pb-20 lg:pt-[100px] rounded">

            <div class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 grid grid-cols-3 gap-4 lg:pt-5 up">
                <div class="flex justify-center items-center col-span-2 esq">
                    <div class="relative w-72 h-72 rounded-full border-[8px] border-gray-300 overflow-hidden">
                        <!-- Aqui você pode colocar seu conic-gradient ou canvas -->
                        <div class="absolute inset-0 flex items-center justify-center text-lg font-bold">
                            🎡 Sua Roleta Aqui
                        </div>
                        <!-- Ponteiro -->
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-0 h-0
                        border-l-[10px] border-l-transparent
                        border-r-[10px] border-r-transparent
                        border-b-[20px] border-b-red-500">
                        </div>
                    </div>
                </div>

                <!-- CONTROLES -->
                <div class="rounded-lg shadow-lg p-6 space-y-4 dir">
                    <h2 class="text-2xl font-bold">🎯 Girar Roleta Aleatória</h2>

                    <textarea placeholder="Digite nomes separados por vírgula..."
                              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>

                    <div class="flex gap-4">
                        <button class="flex-1 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                            Gerar Roleta
                        </button>
                        <button class="flex-1 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            Girar
                        </button>
                    </div>

                    {{--  SEÇÃO OPÇÕES  --}}
                    <div class="flex-1 overflow-y-auto p-2 space-y-6">

                        <div x-data="{ open: false, closeAfterDelay() { this.open = true; setTimeout(() => this.open = false, 5000); } }" class="mb-8 w-full rounded-lg p-4 shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] sm:p-8 lg:px-6 xl:px-8 dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)]"
                             style="border: 2px green solid">

                            <button class="faq-btn flex w-full text-left" @click="open = ! open">

                                <div
                                    class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary/5 text-primary dark:bg-white/5">
                                    <svg :class="openFaq1 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                            fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">
                                        ⚙️ Opções
                                    </h4>
                                </div>
                            </button>

                            <div x-show="open" @click.outside="open = false" x-transition class="faq-content pl-[62px]">

                            <input type="checkbox" class="w-4 h-4">
                            <span>Botão Spin</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span>Reproduzir Sons</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span>Jogar Confete</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span>Remover vencedores</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span>Multiplicar entradas</span>
                        </label>

                        <!-- Duração -->
                        <div class="flex items-center justify-between">
                            <label class="font-medium">Duração da Spin</label>
                            <select class="border rounded px-2 py-1 text-sm">
                                <option>6 sec</option>
                                <option>10 sec</option>
                                <option>14 sec</option>
                            </select>
                        </div>

                        <div>
                            <label class="font-medium">Temas</label>
                            <div class="flex gap-1 flex-wrap mt-1">
                                <span class="w-6 h-6 rounded-full border" style="background:#5B68BB;"></span>
                                <span class="w-6 h-6 rounded-full border" style="background:#A746B9;"></span>
                                <span class="w-6 h-6 rounded-full border" style="background:#E33F76;"></span>
                                <!-- ...adicione os outros -->
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="font-medium">Cor de Fundo</label>
                            <input type="color" value="#D1E4FF" class="w-12 h-8 border rounded">
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="font-medium">Cor do Texto</label>
                            <input type="color" value="#1A1A1A" class="w-12 h-8 border rounded">
                        </div>

                        <div class="mt-3">
                            <div class="flex gap-2 mb-2">
                                <button class="px-2 py-1 bg-gray-200 rounded text-sm">Ordenar</button>
                                <button class="px-2 py-1 bg-gray-200 rounded text-sm">Misturar</button>
                                <button class="px-2 py-1 bg-gray-200 rounded text-sm">Limpar</button>
                            </div>

                            <
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <livewire:roleta />
            <livewire:roletao />
                <livewire:lista-nomes />


    </div>

</section>


        {{-- MODELO ROLLET --}}
        <section class="bg-gray-50 dark:bg-gray-800">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6 up">
                <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Roleta</h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Sorteios</p>
                </div>

                <div class="flex flex-col items-center justify-center space-y-6 up" style="border: #ce0d45 solid 2px">
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


                            <!-- Nomes -->
                            <div class="absolute top-4 left-1/2 transform -translate-x-1/2 rotate-[0deg] text-white font-semibold text-sm">João</div>
                            <div class="absolute right-6 top-14 transform rotate-[36deg] text-white font-semibold text-sm">Maria</div>
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 rotate-[72deg] text-white font-semibold text-sm">Pedro</div>
                            <div class="absolute right-6 bottom-14 transform rotate-[108deg] text-white font-semibold text-sm">Ana</div>
                            <div class="absolute top-[calc(100%-16px)] left-1/2 transform -translate-x-1/2 rotate-[144deg] text-white font-semibold text-sm">Lucas</div>
                            <div class="absolute left-6 bottom-14 transform rotate-[180deg] text-white font-semibold text-sm">Carla</div>
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 rotate-[216deg] text-white font-semibold text-sm">Fernando</div>
                            <div class="absolute left-6 top-14 transform rotate-[252deg] text-white font-semibold text-sm">Juliana</div>
                            <div class="absolute top-4 left-1/2 transform -translate-x-1/2 rotate-[288deg] text-white font-semibold text-sm">Rafael</div>
                            <div class="absolute top-4 left-1/2 transform -translate-x-1/2 rotate-[324deg] text-white font-semibold text-sm">Bianca</div>
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

                    <!-- Resultado -->
                    <div id="result"
                         class="text-2xl font-bold text-white bg-slate-800 px-6 py-3 rounded shadow-md hidden">
                    </div>
                </div>

            </div>
        </section>
    @endif

    <section class="bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
            <div class="flex justify-center items-end text-center">
                <div class= "inline-block text-left bg-white border-gray-400 dark:border-none dark:bg-gray-900 rounded-lg overflow-hidden align-bottom transition-all transform shadow-2xl sm:align-middle sm:max-w-xl sm:w-full">
                    <div class="items-center w-full mr-auto ml-auto relative max-w-7xl md:px-12 lg:px-12 up">
                        <div class="grid grid-cols-1">
                            <div class="mt-4 mr-auto mb-4 ml-auto bg-white border-gray-400 dark:border-none dark:bg-gray-900 max-w-lg">

                                <div class="flex flex-col items-center pt-6 pr-6 pb-6 pl-6">
                                    <img src="{{Storage::url($channel->user->avatar)}}" class="flex-shrink-0 object-cover object-center btn- flex w-16 h-16 mr-auto -mb-8 ml-auto rounded-full shadow-xl" style="border: {{ $channel->color }} solid 5px;">
                                    <p class="mt-8 text-2xl font-semibold leading-none tracking-tighter lg:text-3xl">{{$channel->user->name}}</p>
                                    <p class="mt-3 text-base leading-relaxed text-center">{{$channel->description}}</p>

                                    <div class="w-full mt-6">
                                        <a href="{{'https://www.youtube.com/@' . $channel->link}}" class="flex text-center items-center justify-center w-full pt-4 pr-10 pb-4 pl-10 text-base font-medium {{($channel->color != null ? 'bg-['.$channel->color.']' : 'bg-indigo-600 dark:bg-amber-300')}} text-gray-900 dark:text-white rounded-xl transition duration-500 ease-in-out transform hover:bg-indigo-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Acesse e inscreva-se no canal
                                            <svg class="w-5 ml-3 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.0073 2.10365C8.60568 1.64993 7.08206 2.28104 6.41181 3.59294L5.60603 5.17011C5.51029 5.35751 5.35787 5.50992 5.17048 5.60566L3.5933 6.41144C2.2814 7.08169 1.6503 8.60532 2.10401 10.0069L2.64947 11.6919C2.71428 11.8921 2.71428 12.1077 2.64947 12.3079L2.10401 13.9929C1.6503 15.3945 2.28141 16.9181 3.5933 17.5883L5.17048 18.3941C5.35787 18.4899 5.51029 18.6423 5.60603 18.8297L6.41181 20.4068C7.08206 21.7187 8.60569 22.3498 10.0073 21.8961L11.6923 21.3507C11.8925 21.2859 12.108 21.2859 12.3082 21.3507L13.9932 21.8961C15.3948 22.3498 16.9185 21.7187 17.5887 20.4068L18.3945 18.8297C18.4902 18.6423 18.6426 18.4899 18.83 18.3941L20.4072 17.5883C21.7191 16.9181 22.3502 15.3945 21.8965 13.9929L21.351 12.3079C21.2862 12.1077 21.2862 11.8921 21.351 11.6919L21.8965 10.0069C22.3502 8.60531 21.7191 7.08169 20.4072 6.41144L18.83 5.60566C18.6426 5.50992 18.4902 5.3575 18.3945 5.17011L17.5887 3.59294C16.9185 2.28104 15.3948 1.64993 13.9932 2.10365L12.3082 2.6491C12.108 2.71391 11.8925 2.71391 11.6923 2.6491L10.0073 2.10365ZM8.19283 4.50286C8.41624 4.06556 8.92412 3.8552 9.39132 4.00643L11.0763 4.55189C11.6769 4.74632 12.3236 4.74632 12.9242 4.55189L14.6092 4.00643C15.0764 3.8552 15.5843 4.06556 15.8077 4.50286L16.6135 6.08004C16.9007 6.64222 17.3579 7.09946 17.9201 7.38668L19.4973 8.19246C19.9346 8.41588 20.145 8.92375 19.9937 9.39095L19.4483 11.076C19.2538 11.6766 19.2538 12.3232 19.4483 12.9238L19.9937 14.6088C20.145 15.076 19.9346 15.5839 19.4973 15.8073L17.9201 16.6131C17.3579 16.9003 16.9007 17.3576 16.6135 17.9197L15.8077 19.4969C15.5843 19.9342 15.0764 20.1446 14.6092 19.9933L12.9242 19.4479C12.3236 19.2535 11.6769 19.2535 11.0763 19.4479L9.39132 19.9933C8.92412 20.1446 8.41624 19.9342 8.19283 19.4969L7.38705 17.9197C7.09983 17.3576 6.64258 16.9003 6.08041 16.6131L4.50323 15.8073C4.06593 15.5839 3.85556 15.076 4.0068 14.6088L4.55226 12.9238C4.74668 12.3232 4.74668 11.6766 4.55226 11.076L4.0068 9.39095C3.85556 8.92375 4.06593 8.41588 4.50323 8.19246L6.0804 7.38668C6.64258 7.09946 7.09983 6.64222 7.38705 6.08004L8.19283 4.50286ZM6.75984 11.7573L11.0025 15.9999L18.0736 8.92885L16.6594 7.51464L11.0025 13.1715L8.17406 10.343L6.75984 11.7573Z"></path></svg>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($channel->camping)
        <section class="bg-gray-50 dark:bg-gray-800" id="campaind_id">
            <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
                <!-- Row -->
                <div class="items-center gap-8 flex justify-center xl:gap-16">
                    <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                        <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{$channel->camping->title}}</h2>
                        <p class="mb-8 font-light lg:text-xl">
                            {{$channel->camping->content}}</p>

                        <div class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                            <iframe class="w-[620px] h-[200px] mt-3 border-none" src="{{$channel->camping->linkGoal}}" frameborder="0"></iframe>
                        </div>
                    </div>
                    <div class="flex justify-center">

                        <iframe class="w-[220px] h-[300px] mt-3 border-none" src="{{$channel->camping->qrCode}}" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="w-full mt-20 text-gray-900 dark:text-white">
                    <p class="flex text-center items-center justify-center w-full text-base font-medium">
                        Ajude o canal acessando o nosso QR code
                        <svg class="w-8 ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 17V16H13V13H16V15H18V17H17V19H15V21H13V18H15V17H16ZM21 21H17V19H19V17H21V21ZM3 3H11V11H3V3ZM5 5V9H9V5H5ZM13 3H21V11H13V3ZM15 5V9H19V5H15ZM3 13H11V21H3V13ZM5 15V19H9V15H5ZM18 13H21V15H18V13ZM6 6H8V8H6V6ZM6 16H8V18H6V16ZM16 6H18V8H16V6Z"></path></svg>
                    </p>
                </div>

                <div class="items-center gap-8 lg:grid lg:grid-cols xl:gap-16">
                    <img class="hidden w-full mb-4 rounded-lg lg:mb-0 m-10 lg:flex" src="{{Storage::url($channel->camping->image)}}" alt="dashboard feature image">
                </div>
            </div>
        </section>
    @endif


    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">

            <div class="flex flex-row items-center justify-center mb-10">
                <x-partials.title-section title="Postadas recentemente" description=""/>
            </div>

            <div class="flex items-center justify-center mt-2">
                @foreach($posts as $post)
                    <a href="{{route('posts.post', ['slug'=>$post->slug])}}" class="relative w-full h-60 bg-cover bg-center border-[5px] border-red-200 border-opacity-80 bg-no-repeat" style="background-image: url('{{Storage::url($post->featured_image_url)}}');">
                        <div class="absolute bottom-1 left-1 flex gap-1 text-white text-xs items-center">
                            <svg class="ml-4 mr-1 justify-center" style="width:20px;height:20px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                            </svg>
                            <span>{{$post->views}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-partials.footer />

    <script>

    </script>


</x-layout>
