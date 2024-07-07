<x-layout>
    <x-partials.navbar-section/>

    {{--  HEADER HOME  --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ $channel->name }}</h1>
                <p class="max-w-2xl mb-4 text-sm text-gray-500 lg:mb-8 md:text-base lg:text-base dark:text-gray-500">
                    Bem-vindo ao meu perfil <em class="text-purple-600 dark:text-purple-500">{{$channel->name}}</em> na {{config('app.name')}}!
                    Aqui você descobrirá todas as informações sobre meu canal e muito mais.
                    Objetivo é sempre fortalecer e ampliar a visibilidade do incrível trabalho da comunidade retrô.
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


    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
            <div class="flex justify-center items-end text-center">
                <div class= "inline-block text-left bg-gray-900 rounded-lg overflow-hidden align-bottom transition-all transform shadow-2xl sm:align-middle sm:max-w-xl sm:w-full">
                    <div class="items-center w-full mr-auto ml-auto relative max-w-7xl md:px-12 lg:px-12 up">
                        <div class="grid grid-cols-1">
                            <div class="mt-4 mr-auto mb-4 ml-auto bg-gray-900 max-w-lg">
                                <div class="flex flex-col items-center pt-6 pr-6 pb-6 pl-6">
                                    <img
                                        src="{{Storage::url($channel->user->avatar)}}" class="flex-shrink-0 object-cover object-center btn- flex w-16 h-16 mr-auto -mb-8 ml-auto rounded-full shadow-xl">
                                    <p class="mt-8 text-2xl font-semibold leading-none text-white tracking-tighter lg:text-3xl">{{$channel->user->name}}</p>
                                    <p class="mt-3 text-base leading-relaxed text-center text-gray-200">{{$channel->description}}</p>
                                    <div class="w-full mt-6">
                                        <a href="{{'https://www.youtube.com/@' . $channel->link}}" class="flex text-center items-center justify-center w-full pt-4 pr-10 pb-4 pl-10 text-base
                    font-medium text-white bg-indigo-600 rounded-xl transition duration-500 ease-in-out transform
                    hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Acesse e inscreva-se no canal
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

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">

            <div class="flex flex-row items-center justify-center mb-10">
                <x-partials.title-section title="Postadas recentemente" description=""/>
            </div>

            <div class="flex items-center justify-center mt-2">
                @foreach($posts as $post)
                    <a href="{{route('posts.post', ['post'=>$post])}}" class="relative w-full h-60 bg-cover bg-center border-[5px] border-red-200 border-opacity-80 bg-no-repeat" style="background-image: url('{{Storage::url($post->featured_image_url)}}');">
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
