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

    @auth
        <section class="bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0 px-4 py-2 lg:pb-20 lg:pt-[100px] rounded">
                <livewire:roleta/>
        </section>

        @stack('roleta.js')
    @endauth

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
