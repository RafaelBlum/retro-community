<x-layout>

    <x-partials.navbar-section/>

    <div class="relative isolate px-6 pt lg:px-8 bg-white dark:bg-gray-900 text-white dark:text-white">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <div class="mx-auto max-w-screen-md py-32 sm:py-48 lg:py-56">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-3 py-1 text-sm leading-6 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Desenvolvimento da Hack. <a href="https://github.com/RafaelBlum/hack-orelha-lascada" target="_blank" class="font-semibold text-indigo-400">
                        <span class="absolute inset-0" aria-hidden="true"></span>Acesse documentação <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/brandname/horizontal-retrocommunity.png')}}" alt=""
                     class="" />
                <h3 class="text-4xl font-bold tracking-tight">Games e informações</h3>
                <p class="mt-6 text-lg leading-8">
                    Com uma comunidade unida, você encontrará uma vasta coleção de <em class="text-blue-400 bold">informações sobre jogos clássicos</em>, <em class="text-blue-400 bold">lives da galera no YouTube</em>, análises detalhadas
                    e até histórias curiosas e guias de gameplay. Além disso, o <em class="text-blue-400 bold">Retrô Community</em> mantém você atualizado
                    sobre campanhas, lançamentos, eventos e tendências.
                </p>

                @if($campings)
                    @foreach($campings as $campaing)
                        <div class="overflow-hidden shadow-xl transition duration-500 ease-in-out transform hover:scale-105">
                            <iframe class="w-[220px] h-[300px] mt-3 border-none"
                                    src="{{$campaing->qrCode}}" frameborder="0"></iframe>
                        </div>
                    @endforeach
                @endif

                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{route('app.home')}}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Saiba mais sobre
                    </a>
                </div>
            </div>

            <section class="mt-10">
                <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-16">
                    <ul class="mx-auto grid gap-{{$grid}} sm:grid-cols-{{$grid}} md:grid-cols-{{$grid}} justify-center">
                        @foreach($channels as $channel)
                            <li class="flex flex-col items-center gap-1 text-center">
                                <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="font-light text-white dark:text-white hover:underline">
                                    <img src="{{Storage::url($channel->brand)}}" alt="{{$channel->name}}" class="w-16 h-16 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />
                                </a>
                                <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="text-sm font-light text-white dark:text-white">
                                    {{$channel->name}}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </section>
        </div>

        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>

    <section class="bg-gray-50 dark:bg-gray-800 -mt-20">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">We didn't reinvent the wheel</h2>
                <p class="mb-4">We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need.</p>
                <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                {{--                <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">--}}
                {{--                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">--}}
                <div class="relative flex flex-col items-center rounded-[20px] w-[400px] mx-auto p-4 bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none">
                    <div class="relative flex h-32 w-full justify-center rounded-xl bg-cover" >
                        <img src='https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/media/banner.ef572d78f29b0fee0a09.png' class="absolute flex h-32 w-full justify-center rounded-xl bg-cover">
                        <div class="absolute -bottom-12 flex h-[87px] w-[87px] items-center justify-center rounded-full border-[4px] border-white bg-pink-400 dark:!border-navy-700">
                            <img class="h-full w-full rounded-full" src='https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/media/avatar11.1060b63041fdffa5f8ef.png' alt="" />
                        </div>
                    </div>
                    <div class="mt-16 flex flex-col items-center">
                        <h4 class="text-xl font-bold text-navy-700 dark:text-white">
                            Adela Parkson
                        </h4>
                        <p class="text-base font-normal text-gray-600">Product Manager</p>
                    </div>
                    <div class="mt-6 mb-3 flex gap-14 md:!gap-14">
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-2xl font-bold text-navy-700 dark:text-white">17</p>
                            <p class="text-sm font-normal text-gray-600">Posts</p>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-2xl font-bold text-navy-700 dark:text-white">
                                9.7K
                            </p>
                            <p class="text-sm font-normal text-gray-600">Followers</p>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-2xl font-bold text-navy-700 dark:text-white">
                                434
                            </p>
                            <p class="text-sm font-normal text-gray-600">Following</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
            <div class="overflow-x-hidden">
                <div class="px-6 py-8">
                    <div class="container flex justify-between mx-auto">
                        <div class="w-full lg:w-8/12">
                            <div class="flex items-center justify-between">
                                <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                            </div>

                            <div class="mt-6">
                                <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                    <div class="flex items-center justify-between"><span class="font-light text-gray-600">Jun 1,
                                2020</span><a href="#"
                                              class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                                    </div>
                                    <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">Build
                                            Your New Idea with Laravel Freamwork.</a>
                                        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                                            reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                                    </div>
                                    <div class="flex items-center justify-between mt-4"><a href="#"
                                                                                           class="text-blue-500 hover:underline">Read more</a>
                                        <div><a href="#" class="flex items-center"><img
                                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                                    alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                                <h1 class="font-bold text-gray-700 hover:underline">Alex John</h1>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="hidden w-4/12 -mx-8 lg:block">
                            <div class="px-8">
                                <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                                <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                                    <ul class="-mx-4">
                                        <li class="flex items-center"><img
                                                src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                                alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                            <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Alex John</a><span
                                                    class="text-sm font-light text-gray-700">Created 23 Posts</span></p>
                                        </li>
                                        <li class="flex items-center mt-6"><img
                                                src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                                alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                            <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Jane Doe</a><span
                                                    class="text-sm font-light text-gray-700">Created 52 Posts</span></p>
                                        </li>
                                    </ul>
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
            <div class="flex items-center justify-center mt-2">
                <a href="#" class="relative w-full h-60 bg-cover bg-center bg-no-repeat" style="background-image: url('{{asset('/images/landing/background.jpg')}}');">
                    <div class="absolute bottom-1 left-1 flex gap-1 text-white text-xs items-center">
                        <svg class="ml-4 mr-1 justify-center" style="width:20px;height:20px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                        </svg>
                        <span>23</span>
                    </div>
                </a>
                <a href="#" class="relative w-full h-60 bg-cover bg-center bg-no-repeat" style="background-image: url('{{asset('/images/landing/wallpaper.jpg')}}');">
                    <div class="absolute bottom-1 left-1 flex gap-1 text-white text-xs items-center">
                        <svg class="ml-4 mr-1 justify-center" style="width:20px;height:20px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                        </svg>
                        <span>23</span>
                    </div>
                </a>
                <a href="#" class="relative w-full h-60 bg-cover bg-center bg-no-repeat" style="background-image: url('{{asset('/images/landing/wallpaper3.jpg')}}');">
                    <div class="absolute bottom-1 left-1 flex gap-1 text-white text-xs items-center">
                        <svg class="ml-4 mr-1 justify-center" style="width:20px;height:20px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                        </svg>
                        <span>23</span>
                    </div>
                </a>
            </div>
        </div>
    </section>


    <section class="bg-white dark:bg-gray-900 text-white dark:text-white">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl text-white dark:text-white">Building digital <br>products & brands.</h1>
                <p class="max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl">This free and open-source landing page template was built using the utility classes from <a href="https://tailwindcss.com" class="hover:underline">Tailwind CSS</a> and based on the components from the <a href="https://flowbite.com/docs/getting-started/introduction/" class="hover:underline">Flowbite Library</a> and the <a href="https://flowbite.com/blocks/" class="hover:underline">Blocks System</a>.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="https://github.com/themesberg/landwind" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg> View on GitHub
                    </a>
                    <a href="https://www.figma.com/community/file/1125744163617429490" class="inline-flex items-center justify-center w-full px-5 py-3 mb-2 mr-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:w-auto focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <svg class="w-4 h-4 mr-2" id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 300" width="1667" height="2500"><style type="text/css">.st0{fill:#0acf83}.st1{fill:#a259ff}.st2{fill:#f24e1e}.st3{fill:#ff7262}.st4{fill:#1abcfe}</style><title>Figma.logo</title><desc>Created using Figma</desc><path id="path0_fill" class="st0" d="M50 300c27.6 0 50-22.4 50-50v-50H50c-27.6 0-50 22.4-50 50s22.4 50 50 50z"/><path id="path1_fill" class="st1" d="M0 150c0-27.6 22.4-50 50-50h50v100H50c-27.6 0-50-22.4-50-50z"/><path id="path1_fill_1_" class="st2" d="M0 50C0 22.4 22.4 0 50 0h50v100H50C22.4 100 0 77.6 0 50z"/><path id="path2_fill" class="st3" d="M100 0h50c27.6 0 50 22.4 50 50s-22.4 50-50 50h-50V0z"/><path id="path3_fill" class="st4" d="M200 150c0 27.6-22.4 50-50 50s-50-22.4-50-50 22.4-50 50-50 50 22.4 50 50z"/></svg> Get Figma file
                    </a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{asset('images/hero-3.png')}}" alt="hero image">
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">

        <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-16">
            <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 sm:grid-cols-3 lg:grid-cols-6 dark:text-gray-400">
                <a href="#" class="flex items-center lg:justify-center">
                    <svg class="h-9 hover:text-gray-900 dark:hover:text-white" viewBox="0 0 125 35" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M64.828 7.11521C64.828 8.52061 63.6775 9.65275 62.2492 9.65275C60.8209 9.65275 59.6704 8.52061 59.6704 7.11521C59.6704 5.70981 60.7813 4.57766 62.2492 4.57766C63.7171 4.6167 64.828 5.74883 64.828 7.11521ZM54.1953 12.2293C54.1953 12.4636 54.1953 12.854 54.1953 12.854C54.1953 12.854 52.9655 11.2923 50.3469 11.2923C46.0225 11.2923 42.6502 14.5327 42.6502 19.0221C42.6502 23.4726 45.9829 26.7518 50.3469 26.7518C53.0051 26.7518 54.1953 25.1513 54.1953 25.1513V25.815C54.1953 26.1272 54.4334 26.3615 54.7508 26.3615H57.9644V11.6828C57.9644 11.6828 55.0285 11.6828 54.7508 11.6828C54.4334 11.6828 54.1953 11.956 54.1953 12.2293ZM54.1953 21.6378C53.6002 22.4966 52.41 23.2383 50.9818 23.2383C48.4426 23.2383 46.4985 21.6768 46.4985 19.0221C46.4985 16.3675 48.4426 14.806 50.9818 14.806C52.3703 14.806 53.6399 15.5867 54.1953 16.4065V21.6378ZM60.3448 11.6828H64.1535V26.3615H60.3448V11.6828ZM117.237 11.2923C114.619 11.2923 113.389 12.854 113.389 12.854V4.6167H109.58V26.3615C109.58 26.3615 112.516 26.3615 112.794 26.3615C113.111 26.3615 113.349 26.0882 113.349 25.815V25.1513C113.349 25.1513 114.579 26.7518 117.198 26.7518C121.522 26.7518 124.895 23.4726 124.895 19.0221C124.895 14.5717 121.522 11.2923 117.237 11.2923ZM116.603 23.1993C115.135 23.1993 113.984 22.4575 113.389 21.5986V16.3675C113.984 15.5867 115.254 14.7668 116.603 14.7668C119.142 14.7668 121.086 16.3284 121.086 18.9831C121.086 21.6378 119.142 23.1993 116.603 23.1993ZM107.597 17.6557V26.4005H103.788V18.0852C103.788 15.6648 102.994 14.6888 100.852 14.6888C99.7015 14.6888 98.5113 15.2744 97.7574 16.1332V26.3615H93.9488V11.6828H96.964C97.2814 11.6828 97.5195 11.956 97.5195 12.2293V12.854C98.6302 11.7218 100.098 11.2923 101.566 11.2923C103.233 11.2923 104.621 11.7609 105.732 12.6977C107.081 13.7908 107.597 15.1962 107.597 17.6557ZM84.7048 11.2923C82.0862 11.2923 80.8564 12.854 80.8564 12.854V4.6167H77.0476V26.3615C77.0476 26.3615 79.9834 26.3615 80.2611 26.3615C80.5787 26.3615 80.8166 26.0882 80.8166 25.815V25.1513C80.8166 25.1513 82.0465 26.7518 84.665 26.7518C88.9895 26.7518 92.3617 23.4726 92.3617 19.0221C92.4015 14.5717 89.0292 11.2923 84.7048 11.2923ZM84.0699 23.1993C82.602 23.1993 81.4515 22.4575 80.8564 21.5986V16.3675C81.4515 15.5867 82.721 14.7668 84.0699 14.7668C86.6091 14.7668 88.5531 16.3284 88.5531 18.9831C88.5531 21.6378 86.6091 23.1993 84.0699 23.1993ZM73.7547 11.2923C74.9052 11.2923 75.5003 11.4876 75.5003 11.4876V14.9621C75.5003 14.9621 72.3264 13.908 70.3427 16.1332V26.4005H66.534V11.6828C66.534 11.6828 69.4699 11.6828 69.7476 11.6828C70.065 11.6828 70.3029 11.956 70.3029 12.2293V12.854C71.0171 12.0342 72.5644 11.2923 73.7547 11.2923ZM32.4423 24.4806C32.2699 24.0722 32.0976 23.6297 31.9252 23.2554C31.6493 22.6427 31.3736 22.0641 31.1322 21.5197L31.0978 21.4855C28.719 16.3804 26.1678 11.2073 23.4787 6.10219L23.3752 5.89799C23.0995 5.38748 22.8237 4.84294 22.5479 4.29839C22.2031 3.68577 21.8584 3.03913 21.3068 2.42652C20.2036 1.06516 18.6177 0.316406 16.9284 0.316406C15.2046 0.316406 13.6533 1.06516 12.5156 2.35845C11.9985 2.97107 11.6192 3.61771 11.2745 4.23032C10.9987 4.77486 10.7229 5.31941 10.4471 5.82992L10.3436 6.03413C7.68904 11.1392 5.10339 16.3124 2.7246 21.4175L2.69012 21.4855C2.44879 22.0301 2.17299 22.6087 1.89719 23.2214C1.72481 23.5957 1.55244 24.0041 1.38006 24.4466C0.93188 25.7058 0.793978 26.897 0.966355 28.1222C1.34558 30.6748 3.06935 32.8189 5.44815 33.7719C6.3445 34.1463 7.27534 34.3164 8.24065 34.3164C8.51645 34.3164 8.8612 34.2824 9.137 34.2483C10.2747 34.1122 11.4468 33.7378 12.5845 33.0912C13.9981 32.3083 15.3425 31.1852 16.8595 29.5517C18.3764 31.1852 19.7554 32.3083 21.1344 33.0912C22.2721 33.7378 23.4443 34.1122 24.5819 34.2483C24.8577 34.2824 25.2025 34.3164 25.4782 34.3164C26.4436 34.3164 27.4089 34.1463 28.2708 33.7719C30.6841 32.8189 32.3733 30.6408 32.7526 28.1222C33.0283 26.931 32.8904 25.7398 32.4423 24.4806ZM16.9259 25.893C15.1377 23.6468 13.9786 21.5327 13.5812 19.7488C13.4156 18.9891 13.3825 18.3284 13.4818 17.7338C13.5481 17.2053 13.7467 16.7429 14.0118 16.3465C14.6409 15.4546 15.7007 14.893 16.9259 14.893C18.1512 14.893 19.2441 15.4216 19.8402 16.3465C20.1051 16.7429 20.3037 17.2053 20.37 17.7338C20.4694 18.3284 20.4363 19.0221 20.2707 19.7488C19.8733 21.4995 18.7142 23.6136 16.9259 25.893ZM30.3665 27.6033C30.1305 29.3326 28.9509 30.8293 27.2993 31.4945C26.4903 31.8269 25.6139 31.9267 24.7376 31.8269C23.895 31.7273 23.0523 31.4611 22.176 30.9623C20.9624 30.2971 19.749 29.2662 18.3334 27.7363C20.558 25.0424 21.9062 22.5813 22.4118 20.3864C22.6477 19.3554 22.6815 18.4242 22.5804 17.5595C22.4456 16.7281 22.1422 15.9632 21.6703 15.298C20.6255 13.8014 18.8727 12.9367 16.9178 12.9367C14.9628 12.9367 13.21 13.8347 12.1652 15.298C11.6933 15.9632 11.39 16.7281 11.2551 17.5595C11.1203 18.4242 11.154 19.3887 11.4237 20.3864C11.9293 22.5813 13.3112 25.0757 15.5021 27.7695C14.1202 29.2994 12.873 30.3304 11.6596 30.9955C10.7832 31.4945 9.94059 31.7605 9.09795 31.8603C8.18787 31.9599 7.31152 31.8269 6.53628 31.5277C4.88468 30.8625 3.70497 29.366 3.46902 27.6365C3.36791 26.8051 3.43531 25.9737 3.77238 25.0424C3.8735 24.7098 4.04202 24.3774 4.21055 23.9782C4.4465 23.4461 4.71615 22.8807 4.9858 22.3153L5.0195 22.2489C7.34523 17.2935 9.83948 12.2383 12.4349 7.31623L12.536 7.11668C12.8056 6.61782 13.0753 6.0857 13.3449 5.58684C13.6146 5.05472 13.9179 4.55585 14.2886 4.12351C14.9965 3.32532 15.9403 2.89298 16.9852 2.89298C18.03 2.89298 18.9738 3.32532 19.6817 4.12351C20.0524 4.55585 20.3557 5.05472 20.6255 5.58684C20.8951 6.0857 21.1647 6.61782 21.4343 7.11668L21.5355 7.31623C24.0971 12.2716 26.5914 17.3267 28.9171 22.2821V22.3153C29.1867 22.8475 29.4227 23.4461 29.6924 23.9782C29.8609 24.3774 30.0294 24.7098 30.1305 25.0424C30.4003 25.9071 30.5013 26.7385 30.3665 27.6033Z" fill="currentColor"/>
                    </svg>
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <svg class="h-9 hover:text-gray-900 dark:hover:text-white" viewBox="0 0 86 29" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6008 10.2627V13.2312L18.6907 13.2281C18.4733 14.8653 17.9215 16.0641 17.0826 16.9031C16.0487 17.9378 14.4351 19.0766 11.6008 19.0766C7.23238 19.0766 3.81427 15.5531 3.81427 11.1808C3.81427 6.80853 7.23238 3.28487 11.6008 3.28487C13.9585 3.28487 15.6794 4.21232 16.9503 5.40473L19.0432 3.31011C17.2721 1.6161 14.9144 0.316406 11.6036 0.316406C5.62156 0.316406 0.589844 5.19338 0.589844 11.1808C0.589844 17.1682 5.62156 22.0451 11.6036 22.0451C14.8322 22.0451 17.2694 20.9852 19.1756 18.9979C21.1362 17.0356 21.7451 14.2818 21.7451 12.0546C21.7451 11.3921 21.6949 10.7802 21.5974 10.2627H11.6008ZM71.4046 21.6192V1.11445H68.4101V21.6192H71.4046ZM29.9511 22.0482C33.8151 22.0482 36.9643 19.0797 36.9643 15.0513C36.9643 10.9945 33.8151 8.05451 29.9511 8.05451C26.0857 8.05451 22.9365 10.9945 22.9365 15.0513C22.9365 19.0797 26.0857 22.0482 29.9511 22.0482ZM29.9511 10.8116C32.0691 10.8116 33.8945 12.534 33.8945 15.0513C33.8945 17.5404 32.0691 19.2911 29.9511 19.2911C27.833 19.2911 26.0076 17.5435 26.0076 15.0513C26.0076 12.534 27.833 10.8116 29.9511 10.8116ZM45.0825 22.0482C48.9465 22.0482 52.0957 19.0797 52.0957 15.0513C52.0957 10.9945 48.9465 8.05451 45.0825 8.05451C41.2171 8.05451 38.0679 10.9977 38.0679 15.0513C38.0679 19.0797 41.2171 22.0482 45.0825 22.0482ZM45.0825 10.8116C47.2005 10.8116 49.0259 12.534 49.0259 15.0513C49.0259 17.5404 47.2005 19.2911 45.0825 19.2911C42.9644 19.2911 41.139 17.5435 41.139 15.0513C41.139 12.534 42.9644 10.8116 45.0825 10.8116ZM66.5972 8.48038V21.0387C66.5972 26.2059 63.5512 28.3164 59.9519 28.3164C56.563 28.3164 54.523 26.0482 53.7539 24.1934L56.4265 23.0798C56.903 24.2186 58.0694 25.5624 59.9477 25.5624C62.2525 25.5624 63.6807 24.1397 63.6807 21.4615V20.4552H63.5734C62.8865 21.3037 61.5627 22.0451 59.892 22.0451C56.3958 22.0451 53.1923 18.9977 53.1923 15.0766C53.1923 11.1271 56.3958 8.05451 59.892 8.05451C61.5585 8.05451 62.8837 8.79579 63.5734 9.6192H63.6807V8.48038H66.5972ZM63.8981 15.0766C63.8981 12.6129 62.2553 10.8116 60.1651 10.8116C58.0471 10.8116 56.2732 12.6129 56.2732 15.0766C56.2732 17.5152 58.0471 19.2911 60.1651 19.2911C62.2553 19.2911 63.8981 17.5152 63.8981 15.0766ZM83.0747 17.3542L85.4575 18.9442C84.6883 20.083 82.835 22.0451 79.6315 22.0451C75.6602 22.0451 72.6935 18.9726 72.6935 15.0483C72.6935 10.8874 75.6853 8.05143 79.2887 8.05143C82.9172 8.05143 84.6911 10.941 85.2721 12.5026L85.5898 13.2976L76.2426 17.1713C76.9589 18.5751 78.0708 19.2912 79.6315 19.2912C81.1949 19.2912 82.2804 18.5215 83.0747 17.3542ZM75.7382 14.8369L81.9864 12.2407C81.6436 11.3668 80.6097 10.758 79.3918 10.758C77.8326 10.758 75.6602 12.1366 75.7382 14.8369Z" fill="currentColor"/>
                    </svg>
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <svg class="h-8 hover:text-gray-900 dark:hover:text-white" viewBox="0 0 151 34" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_3753_27919)"><path d="M150.059 16.1144V13.4753H146.783V9.37378L146.673 9.40894L143.596 10.3464H143.538V13.4519H138.682V11.7175C138.682 10.9207 138.869 10.2996 139.221 9.8894C139.572 9.47925 140.088 9.27417 140.721 9.27417C141.189 9.27417 141.682 9.39136 142.15 9.60229L142.268 9.64917V6.88237L142.221 6.85894C141.775 6.70073 141.166 6.6187 140.416 6.6187C139.467 6.6187 138.6 6.82964 137.838 7.24448C137.076 7.64292 136.479 8.24058 136.068 8.99058C135.646 9.74058 135.436 10.6078 135.436 11.557V13.4554H133.162V16.0921H135.447V27.2015H138.717V16.0921H143.577V23.1468C143.577 26.0531 144.943 27.5296 147.655 27.5296C148.1 27.5296 148.569 27.4734 149.038 27.3773C149.524 27.2718 149.858 27.1664 150.045 27.0609L150.092 27.0374V24.3773L149.96 24.4664C149.784 24.5835 149.561 24.6855 149.304 24.7558C149.046 24.8261 148.823 24.873 148.657 24.873C148.024 24.873 147.555 24.7089 147.267 24.3726C146.969 24.0386 146.821 23.4468 146.821 22.6148V16.1226H150.079L150.072 16.1062L150.059 16.1144ZM125.813 24.88C124.626 24.88 123.689 24.4851 123.024 23.7082C122.364 22.9289 122.028 21.8167 122.028 20.4035C122.028 18.9457 122.364 17.8019 123.028 17.0097C123.689 16.2222 124.617 15.8214 125.789 15.8214C126.925 15.8214 127.816 16.2035 128.472 16.9582C129.129 17.7175 129.457 18.8496 129.457 20.3238C129.457 21.8167 129.152 22.964 128.543 23.7304C127.933 24.4921 127.019 24.8789 125.824 24.8789L125.813 24.88ZM125.964 13.1449C123.703 13.1449 121.9 13.8082 120.616 15.1183C119.339 16.4308 118.685 18.2425 118.685 20.5089C118.685 22.6652 119.318 24.3937 120.575 25.6535C121.829 26.9191 123.536 27.5753 125.646 27.5753C127.839 27.5753 129.607 26.8957 130.886 25.5773C132.175 24.2507 132.815 22.4531 132.815 20.2417C132.815 18.055 132.206 16.3089 130.999 15.0621C129.792 13.8035 128.1 13.1683 125.96 13.1683L125.964 13.1449ZM113.397 13.1683C111.85 13.1683 110.58 13.5621 109.6 14.3402C108.625 15.123 108.124 16.1449 108.124 17.3871C108.124 18.0363 108.234 18.6058 108.447 19.098C108.658 19.5832 108.986 20.0121 109.425 20.373C109.858 20.7246 110.526 21.0996 111.417 21.4839C112.167 21.7886 112.718 22.0464 113.074 22.2574C113.425 22.4531 113.674 22.6558 113.8 22.8515C113.941 23.039 114.011 23.3085 114.011 23.625C114.011 24.5554 113.322 25.0031 111.902 25.0031C111.372 25.0031 110.77 24.8929 110.111 24.675C109.447 24.4593 108.83 24.1476 108.275 23.7468L108.134 23.6531V26.7937L108.181 26.8171C108.65 27.0281 109.228 27.2156 109.916 27.3562C110.601 27.5085 111.228 27.5789 111.767 27.5789C113.443 27.5789 114.791 27.1804 115.775 26.4023C116.759 25.6148 117.263 24.5625 117.263 23.2804C117.263 22.3546 116.994 21.5578 116.461 20.9191C115.933 20.2792 115.019 19.6957 113.738 19.18C112.727 18.7699 112.074 18.43 111.793 18.1722C111.535 17.9191 111.414 17.5628 111.414 17.1128C111.414 16.7144 111.579 16.3933 111.912 16.1355C112.248 15.8718 112.716 15.7406 113.302 15.7406C113.847 15.7406 114.404 15.8226 114.966 15.9925C115.517 16.166 116.004 16.391 116.408 16.6675L116.545 16.7613V13.7613L116.498 13.7378C116.117 13.5738 115.623 13.4367 115.021 13.3277C114.424 13.214 113.881 13.1636 113.41 13.1636L113.397 13.1683ZM99.582 24.8941C98.3984 24.8941 97.4609 24.5027 96.8047 23.7222C96.1367 22.9488 95.8027 21.8355 95.8027 20.4175C95.8027 18.9644 96.1379 17.816 96.8035 17.0273C97.4598 16.2398 98.3902 15.839 99.5574 15.839C100.694 15.839 101.596 16.221 102.247 16.9757C102.894 17.7375 103.231 18.8695 103.231 20.3437C103.231 21.8343 102.915 22.9804 102.305 23.748C101.708 24.5097 100.794 24.8964 99.5867 24.8964L99.582 24.8941ZM99.7508 13.166C97.4773 13.166 95.6727 13.8269 94.3953 15.1371C93.1098 16.4496 92.4617 18.2601 92.4617 20.5277C92.4617 22.6839 93.0945 24.4113 94.3402 25.6722C95.5965 26.9378 97.3004 27.5941 99.4086 27.5941C101.612 27.5941 103.37 26.9144 104.659 25.5902C105.941 24.2613 106.592 22.4636 106.592 20.2523C106.592 18.0644 105.983 16.3183 104.787 15.0726C103.58 13.8128 101.886 13.1777 99.7484 13.1777L99.7508 13.166ZM87.5164 15.8824V13.4917H84.282V27.2378H87.5164V20.2066C87.5164 19.0113 87.7859 18.0269 88.3215 17.2828C88.8488 16.5421 89.552 16.1812 90.4074 16.1812C90.7004 16.1812 91.0285 16.2281 91.3895 16.3218C91.741 16.4156 91.9941 16.5093 92.1395 16.6265L92.2801 16.7203V13.4625L92.2285 13.439C91.9238 13.3031 91.502 13.2375 90.9629 13.2375C90.1543 13.2375 89.4277 13.5 88.8043 14.0109C88.2535 14.4656 87.8586 15.0843 87.5562 15.8578H87.4977L87.527 15.8812L87.5164 15.8824ZM78.4695 13.1636C76.9812 13.1636 75.657 13.4742 74.532 14.1011C73.3977 14.7339 72.5281 15.6246 71.9305 16.773C71.3445 17.9097 71.0398 19.2398 71.0398 20.7222C71.0398 22.023 71.3352 23.2113 71.907 24.2636C72.4859 25.3183 73.3016 26.1386 74.3328 26.7128C75.357 27.2789 76.5477 27.5683 77.8648 27.5683C79.4023 27.5683 80.7125 27.2636 81.7672 26.6542L81.8141 26.6308V23.6636L81.6734 23.7609C81.1965 24.1124 80.6656 24.3878 80.0914 24.5871C79.5195 24.7863 78.9992 24.8871 78.5445 24.8871C77.2719 24.8871 76.2547 24.4886 75.5141 23.7093C74.7641 22.9124 74.3891 21.8109 74.3891 20.4281C74.3891 19.0218 74.7875 17.8968 75.5562 17.0765C76.3297 16.2328 77.3469 15.8109 78.5914 15.8109C79.6461 15.8109 80.6855 16.1742 81.6652 16.8773L81.8059 16.971V13.8539L81.7672 13.8304C81.398 13.6195 80.8965 13.4554 80.2672 13.3218C79.6508 13.1929 79.0437 13.1296 78.4648 13.1296L78.4695 13.1636ZM68.8203 13.4578H65.5906V27.2156H68.825V13.4578H68.8203ZM67.2266 7.61011C66.6945 7.61011 66.2305 7.79058 65.8484 8.14917C65.4664 8.51011 65.2719 8.96245 65.2719 9.49683C65.2719 10.0242 65.4676 10.4695 65.8461 10.821C66.2211 11.1726 66.6898 11.346 67.2289 11.346C67.768 11.346 68.2367 11.1703 68.6176 10.8187C69.002 10.4671 69.1965 10.0218 69.1965 9.49448C69.1965 8.97886 69.009 8.53355 68.634 8.15855C68.259 7.80698 67.7902 7.61948 67.2277 7.61948L67.2266 7.61011ZM59.1535 12.4593V27.2249H62.4582V8.05425H57.8879L52.0953 22.3019L46.4586 8.0519H41.7078V27.2378H44.8133V12.4781H44.9188L50.8719 27.2414H53.2098L59.0691 12.4792H59.1805L59.1629 12.4722L59.1535 12.4593ZM16.884 18.4242H32.0949V33.648H16.8605L16.8816 18.4347L16.884 18.4242ZM0.0828125 18.4335H15.2914V33.648H0.078125L0.0828125 18.4347V18.4335ZM16.8852 1.63237H32.0961V16.8433H16.8758L16.8852 1.62769V1.63237ZM0.0828125 1.63003H15.2914V16.8433H0.078125L0.0828125 1.62769V1.63003Z" fill="currentColor"/></g><defs><clipPath id="clip0_3753_27919"><rect width="150" height="32.8125" fill="white" transform="translate(0.0820312 0.835449)"/></clipPath></defs>
                    </svg>
                </a>

                <a href="#" class="flex items-center lg:justify-center">
                    <svg class="h-9 hover:text-gray-900 dark:hover:text-white" viewBox="0 0 124 38" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M50.8299 17.3952C54.7246 18.342 56.3124 19.8121 56.3124 22.4701C56.3124 25.615 53.9096 27.6473 50.1907 27.6473C47.5621 27.6473 45.1252 26.7135 43.1446 24.9452C43.104 24.9089 43.0791 24.8582 43.0754 24.8038C43.0716 24.7494 43.0893 24.6957 43.1246 24.6542L44.8747 22.5724C44.8926 22.5512 44.9145 22.5336 44.9392 22.5209C44.9639 22.5082 44.9909 22.5005 45.0185 22.4983C45.0462 22.4961 45.0741 22.4995 45.1005 22.5082C45.1269 22.5169 45.1513 22.5307 45.1723 22.5489C46.8747 24.0226 48.3966 24.6506 50.2619 24.6506C51.9419 24.6506 52.9857 23.9232 52.9857 22.7541C52.9857 21.6986 52.4694 21.1088 49.4104 20.4043C45.8174 19.5351 43.7374 18.4108 43.7374 15.2323C43.7374 12.2686 46.1484 10.1986 49.5991 10.1986C51.9455 10.1986 53.9548 10.8937 55.7384 12.3244C55.8243 12.3938 55.8419 12.5185 55.7778 12.609L54.2165 14.8084C54.2002 14.831 54.1796 14.8501 54.1558 14.8647C54.1321 14.8793 54.1057 14.8891 54.0781 14.8935C54.0506 14.8978 54.0224 14.8967 53.9953 14.8902C53.9682 14.8837 53.9427 14.8718 53.9202 14.8554C52.4218 13.7381 50.9928 13.1959 49.5509 13.1959C48.0643 13.1959 47.0646 13.9104 47.0646 14.9718C47.0646 16.095 47.635 16.6302 50.8305 17.3934L50.8299 17.3952ZM64.7256 14.2432C63.1144 14.2432 61.7924 14.8783 60.7016 16.1779V14.7137C60.7016 14.6582 60.6795 14.6049 60.6403 14.5657C60.601 14.5264 60.5478 14.5043 60.4922 14.5043H57.6308C57.5752 14.5043 57.522 14.5264 57.4827 14.5657C57.4435 14.6049 57.4214 14.6582 57.4214 14.7137V30.9851C57.4214 31.0998 57.5155 31.1939 57.6308 31.1939H60.4928C60.6087 31.1939 60.7028 31.0998 60.7028 30.9846V25.8479C61.793 27.0711 63.1156 27.6697 64.7274 27.6697C67.7235 27.6697 70.755 25.3645 70.755 20.9565C70.755 16.5484 67.7218 14.2432 64.7256 14.2432ZM67.4248 20.9571C67.4248 23.2011 66.0429 24.7676 64.0635 24.7676C62.1053 24.7676 60.6293 23.1299 60.6293 20.9571C60.6293 18.7842 62.1053 17.1465 64.0635 17.1465C66.0111 17.1465 67.4254 18.7489 67.4254 20.9571H67.4248ZM78.5255 14.2432C74.6679 14.2432 71.6465 17.2129 71.6465 21.0059C71.6465 24.7565 74.6467 27.695 78.4773 27.695C82.3485 27.695 85.3793 24.7347 85.3793 20.9571C85.3793 17.1923 82.3684 14.2427 78.5249 14.2427L78.5255 14.2432ZM78.5249 24.7906C76.4726 24.7906 74.926 23.1423 74.926 20.9565C74.926 18.7618 76.4197 17.1694 78.4779 17.1694C80.542 17.1694 82.1003 18.8177 82.1003 21.0047C82.1003 23.1981 80.5961 24.79 78.5249 24.79V24.7906ZM93.6168 14.5043C93.7326 14.5043 93.8261 14.5984 93.8261 14.7137V17.1735C93.8262 17.201 93.8208 17.2282 93.8104 17.2536C93.7999 17.279 93.7846 17.3021 93.7652 17.3215C93.7458 17.341 93.7227 17.3564 93.6974 17.3669C93.672 17.3774 93.6448 17.3829 93.6173 17.3829H90.4683V23.2993C90.4683 24.2343 90.8788 24.6506 91.7973 24.6506C92.3818 24.6538 92.9582 24.5145 93.4768 24.2449C93.5089 24.229 93.5444 24.2215 93.5802 24.2232C93.6159 24.2249 93.6507 24.2356 93.6811 24.2545C93.7115 24.2733 93.7366 24.2996 93.7541 24.3308C93.7715 24.3621 93.7807 24.3973 93.7808 24.433V26.7747C93.7808 26.8494 93.7397 26.9199 93.675 26.957C92.8723 27.4115 92.0208 27.6232 90.9934 27.6232C88.4689 27.6232 87.1887 26.3195 87.1887 23.7468V17.3834H85.8127C85.7853 17.3834 85.7581 17.3779 85.7328 17.3673C85.7075 17.3568 85.6846 17.3413 85.6652 17.3219C85.6459 17.3024 85.6306 17.2794 85.6202 17.254C85.6098 17.2287 85.6044 17.2015 85.6045 17.1741V14.7137C85.6045 14.5984 85.6974 14.5043 85.8127 14.5043H87.1887V11.2841C87.1887 11.1689 87.2828 11.0748 87.3993 11.0748H90.2607C90.3766 11.0748 90.4701 11.1689 90.4701 11.2841V14.5043H93.6191H93.6168ZM109.48 14.5167C109.566 14.5167 109.644 14.5696 109.675 14.6519L113.018 23.3751L116.07 14.6566C116.085 14.6155 116.112 14.5798 116.147 14.5545C116.183 14.5293 116.225 14.5156 116.269 14.5155H119.248C119.282 14.5155 119.316 14.5238 119.346 14.5398C119.376 14.5558 119.402 14.5789 119.421 14.6072C119.441 14.6354 119.452 14.668 119.456 14.7019C119.46 14.7359 119.455 14.7702 119.442 14.8019L114.477 27.6332C113.448 30.2812 112.279 31.2656 110.166 31.2656C109.036 31.2656 108.122 31.0316 107.108 30.4835C107.062 30.4584 107.027 30.4163 107.01 30.366C106.993 30.3157 106.997 30.261 107.019 30.213L107.989 28.0843C108.001 28.058 108.018 28.0345 108.04 28.0151C108.061 27.9957 108.086 27.9808 108.113 27.9714C108.14 27.9626 108.169 27.9595 108.198 27.9622C108.227 27.9649 108.255 27.9734 108.28 27.9872C108.823 28.2842 109.354 28.4342 109.859 28.4342C110.482 28.4342 110.939 28.2295 111.404 27.1981L107.311 17.3834H104.638V27.201C104.638 27.3169 104.544 27.4109 104.429 27.4109H101.567C101.539 27.4109 101.512 27.4055 101.486 27.395C101.461 27.3844 101.438 27.3689 101.418 27.3494C101.399 27.3299 101.384 27.3068 101.373 27.2813C101.363 27.2558 101.357 27.2286 101.357 27.201V17.3834H99.9824C99.9269 17.383 99.8738 17.3607 99.8345 17.3215C99.7952 17.2822 99.773 17.229 99.7725 17.1735V14.7019C99.7725 14.5861 99.8666 14.492 99.9818 14.492H101.357V13.8863C101.357 11.0719 102.754 9.58291 105.398 9.58291C106.484 9.58291 107.209 9.75638 107.777 9.92398C107.866 9.95162 107.925 10.0334 107.925 10.1251V12.5361C107.926 12.5695 107.918 12.6024 107.903 12.6322C107.888 12.662 107.866 12.6878 107.839 12.7074C107.813 12.727 107.781 12.7398 107.748 12.7448C107.715 12.7498 107.682 12.7468 107.65 12.7361C107.113 12.5573 106.634 12.4385 106.038 12.4385C105.038 12.4385 104.591 12.9578 104.591 14.1215V14.5167H109.479H109.48ZM98.2289 14.5043C98.3441 14.5043 98.4382 14.5984 98.4382 14.7137V27.2004C98.4382 27.3157 98.3441 27.4098 98.2283 27.4098H95.3662C95.3106 27.4098 95.2573 27.3877 95.218 27.3485C95.1786 27.3092 95.1564 27.256 95.1563 27.2004V14.7137C95.1563 14.5984 95.2504 14.5043 95.3656 14.5043H98.2277H98.2289ZM96.8122 8.81903C97.3565 8.81903 97.8786 9.03525 98.2634 9.42013C98.6483 9.80502 98.8645 10.327 98.8645 10.8713C98.8645 11.4156 98.6483 11.9377 98.2634 12.3225C97.8786 12.7074 97.3565 12.9236 96.8122 12.9236C96.2679 12.9236 95.7459 12.7074 95.361 12.3225C94.9762 11.9377 94.7599 11.4156 94.7599 10.8713C94.7599 10.327 94.9762 9.80502 95.361 9.42013C95.7459 9.03525 96.2679 8.81903 96.8122 8.81903ZM121.886 18.5184C121.621 18.5194 121.359 18.468 121.114 18.3671C120.869 18.2663 120.646 18.118 120.459 17.9307C120.272 17.7435 120.124 17.5211 120.023 17.2763C119.922 17.0314 119.871 16.7691 119.872 16.5043C119.872 16.2385 119.924 15.9752 120.026 15.7296C120.127 15.484 120.277 15.2608 120.465 15.0729C120.653 14.8849 120.876 14.7358 121.122 14.6341C121.367 14.5324 121.63 14.4801 121.896 14.4802C122.161 14.4791 122.423 14.5303 122.668 14.631C122.913 14.7318 123.135 14.88 123.323 15.0671C123.51 15.2543 123.658 15.4766 123.759 15.7214C123.86 15.9661 123.911 16.2284 123.91 16.4931C123.91 16.7591 123.858 17.0225 123.756 17.2682C123.655 17.514 123.506 17.7373 123.318 17.9254C123.13 18.1135 122.906 18.2627 122.661 18.3646C122.415 18.4664 122.152 18.5189 121.886 18.519V18.5184ZM121.896 14.6808C120.865 14.6808 120.084 15.5011 120.084 16.5049C120.084 17.5087 120.859 18.3179 121.886 18.3179C122.917 18.3179 123.699 17.4981 123.699 16.4937C123.699 15.4899 122.922 14.6808 121.896 14.6808ZM122.343 16.7007L122.912 17.4981H122.432L121.92 16.7666H121.479V17.4981H121.077V15.3841H122.02C122.51 15.3841 122.834 15.6358 122.834 16.0586C122.834 16.4055 122.634 16.6172 122.343 16.6995L122.343 16.7007ZM122.002 15.7469H121.478V16.4149H122.002C122.264 16.4149 122.419 16.2867 122.419 16.0797C122.419 15.8622 122.264 15.7463 122.002 15.7463V15.7469ZM18.9768 0.305176C8.75288 0.305176 0.464844 8.70847 0.464844 18.933C0.464256 28.54 7.78083 36.2953 17.1462 37.4714H20.8074C30.1728 36.2953 37.4893 28.54 37.4893 18.9324C37.4893 8.70847 29.2007 0.305176 18.9774 0.305176H18.9768ZM27.4665 27.0064C27.3877 27.1359 27.284 27.2486 27.1616 27.3379C27.0391 27.4273 26.9002 27.4917 26.7528 27.5273C26.6054 27.5629 26.4525 27.5691 26.3027 27.5455C26.1529 27.5219 26.0093 27.469 25.88 27.3898C21.5325 24.733 16.0612 24.1331 9.61732 25.605C9.46966 25.639 9.31676 25.6435 9.16736 25.6183C9.01796 25.5931 8.87499 25.5387 8.74664 25.4582C8.61829 25.3777 8.50707 25.2726 8.41934 25.1491C8.33162 25.0256 8.26911 24.886 8.23539 24.7382C8.20146 24.5905 8.19701 24.4375 8.22229 24.2881C8.24756 24.1386 8.30207 23.9956 8.3827 23.8672C8.46332 23.7389 8.56848 23.6277 8.69214 23.54C8.8158 23.4523 8.95554 23.3899 9.10336 23.3563C16.1553 21.745 22.204 22.439 27.0837 25.4204C27.3446 25.5803 27.5314 25.8371 27.603 26.1346C27.6747 26.4321 27.6254 26.7458 27.4659 27.007L27.4665 27.0064ZM29.7317 21.9656C29.5314 22.2916 29.2099 22.5248 28.8377 22.6139C28.4656 22.703 28.0733 22.6407 27.747 22.4407C22.7721 19.3828 15.1862 18.4966 9.29977 20.2837C8.93342 20.3943 8.53819 20.3552 8.2006 20.175C7.86301 19.9948 7.61058 19.6882 7.49856 19.3223C7.26922 18.5578 7.6985 17.7539 8.46121 17.5228C15.1856 15.4823 23.5436 16.4702 29.2577 19.9809C29.5837 20.1813 29.8168 20.5029 29.9058 20.875C29.9948 21.2472 29.9324 21.6394 29.7323 21.9656H29.7317ZM29.9269 16.7166C23.9594 13.173 14.1165 12.8472 8.42004 14.5761C7.98054 14.7093 7.50613 14.6624 7.10118 14.4458C6.69622 14.2292 6.3939 13.8606 6.26071 13.4211C6.12752 12.9816 6.17437 12.5072 6.39096 12.1023C6.60756 11.6973 6.97615 11.395 7.41565 11.2618C13.9548 9.27712 24.8256 9.66053 31.6952 13.7375C31.8908 13.8535 32.0617 14.0069 32.198 14.1889C32.3343 14.371 32.4334 14.5781 32.4897 14.7984C32.5459 15.0188 32.5582 15.248 32.5258 15.4731C32.4934 15.6982 32.417 15.9148 32.3009 16.1103C32.185 16.3061 32.0316 16.477 31.8495 16.6134C31.6674 16.7498 31.4603 16.849 31.2398 16.9053C31.0194 16.9615 30.79 16.9738 30.5648 16.9413C30.3397 16.9088 30.1231 16.8323 29.9275 16.716L29.9269 16.7166Z" fill="currentColor"/>
                    </svg>
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <svg class="h-9 hover:text-gray-900 dark:hover:text-white" viewBox="0 0 137 37" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M53.3228 13.9636C51.5883 13.9636 50.7303 15.3285 50.3366 16.209C50.1166 16.7006 50.0551 17.0893 49.8767 17.0893C49.6253 17.0893 49.8054 16.7514 49.5997 16.0022C49.329 15.0165 48.5133 13.9636 46.78 13.9636C44.9577 13.9636 44.1775 15.5032 43.8075 16.3493C43.5545 16.9276 43.5542 17.0893 43.3597 17.0893C43.0778 17.0893 43.3113 16.6298 43.4381 16.0897C43.688 15.0263 43.498 14.2136 43.498 14.2136H40.6094V25.0758H44.5523C44.5523 25.0758 44.5523 20.5363 44.5523 19.6714C44.5523 18.6054 44.9982 17.2528 45.7625 17.2528C46.6456 17.2528 46.8224 17.931 46.8224 19.1869C46.8224 20.3255 46.8224 25.0781 46.8224 25.0781H50.7812C50.7812 25.0781 50.7812 20.511 50.7812 19.6714C50.7812 18.7226 51.1684 17.2528 51.9972 17.2528C52.8926 17.2528 53.0511 18.2056 53.0511 19.1869C53.0511 20.1682 53.0511 25.0758 53.0511 25.0758H56.9387C56.9387 25.0758 56.9387 20.7719 56.9387 18.6882C56.9387 15.8535 55.9395 13.9636 53.3228 13.9636Z" fill="currentColor"/>
                        <path d="M120.249 13.9636C118.514 13.9636 117.656 15.3285 117.262 16.209C117.042 16.7006 116.981 17.0893 116.802 17.0893C116.551 17.0893 116.719 16.6601 116.526 16.0022C116.237 15.0217 115.518 13.9636 113.706 13.9636C111.884 13.9636 111.103 15.5032 110.733 16.3493C110.48 16.9276 110.48 17.0893 110.286 17.0893C110.004 17.0893 110.237 16.6298 110.364 16.0897C110.614 15.0263 110.424 14.2136 110.424 14.2136H107.535V25.0758H111.478C111.478 25.0758 111.478 20.5363 111.478 19.6714C111.478 18.6054 111.924 17.2528 112.688 17.2528C113.571 17.2528 113.748 17.931 113.748 19.1869C113.748 20.3255 113.748 25.0781 113.748 25.0781H117.707C117.707 25.0781 117.707 20.511 117.707 19.6714C117.707 18.7226 118.094 17.2528 118.923 17.2528C119.819 17.2528 119.977 18.2056 119.977 19.1869C119.977 20.1682 119.977 25.0758 119.977 25.0758H123.865C123.865 25.0758 123.865 20.7719 123.865 18.6882C123.865 15.8535 122.865 13.9636 120.249 13.9636Z" fill="currentColor"/>
                        <path d="M62.7138 22.5371C61.7709 22.7549 61.2821 22.4645 61.2821 21.8395C61.2821 20.9834 62.1676 20.6406 63.4315 20.6406C63.9887 20.6406 64.5126 20.6888 64.5126 20.6888C64.5126 21.0552 63.7172 22.3056 62.7138 22.5371ZM63.6737 13.9661C60.6534 13.9661 58.4862 15.0765 58.4862 15.0765V18.3405C58.4862 18.3405 60.8795 16.9645 62.821 16.9645C64.3707 16.9645 64.5611 17.8003 64.4905 18.494C64.4905 18.494 64.0437 18.3757 62.6797 18.3757C59.4661 18.3757 57.8438 19.8362 57.8438 22.1782C57.8438 24.3997 59.667 25.3284 61.2031 25.3284C63.4446 25.3284 64.4299 23.8221 64.7327 23.1075C64.9428 22.6117 64.9811 22.2776 65.1699 22.2776C65.3849 22.2776 65.3125 22.5172 65.3021 23.0107C65.2839 23.8748 65.3246 24.528 65.4616 25.0782H68.4334V19.7326C68.4334 16.395 67.2525 13.9661 63.6737 13.9661Z" fill="currentColor"/>
                        <path d="M74.9258 25.0783H78.8688V10.9255H74.9258V25.0783Z" fill="currentColor"/>
                        <path d="M83.2111 19.6471C83.2111 18.6705 84.1184 17.7819 85.7842 17.7819C87.5992 17.7819 89.059 18.6558 89.3864 18.8542V15.0765C89.3864 15.0765 88.2331 13.9661 85.3984 13.9661C82.4103 13.9661 79.9219 15.7146 79.9219 19.4781C79.9219 23.2415 82.1801 25.3284 85.3904 25.3284C87.898 25.3284 89.3928 23.9506 89.3928 23.9506V20.3624C88.9199 20.6271 87.6021 21.5415 85.8023 21.5415C83.8964 21.5415 83.2111 20.6648 83.2111 19.6471Z" fill="currentColor"/>
                        <path d="M97.373 13.9662C95.0905 13.9662 94.2223 16.1293 94.047 16.5049C93.8716 16.8804 93.785 17.0964 93.6415 17.0918C93.3923 17.0837 93.566 16.6308 93.6631 16.3375C93.8467 15.7834 94.2357 14.3297 94.2357 12.543C94.2357 11.3311 94.0718 10.9255 94.0718 10.9255H90.668V25.0783H94.611C94.611 25.0783 94.611 20.5543 94.611 19.6741C94.611 18.7937 94.9623 17.2554 95.9556 17.2554C96.7784 17.2554 97.036 17.8651 97.036 19.0927C97.036 20.3201 97.036 25.0783 97.036 25.0783H100.979C100.979 25.0783 100.979 21.7679 100.979 19.3289C100.979 16.5406 100.517 13.9662 97.373 13.9662Z" fill="currentColor"/>
                        <path d="M102.258 14.2285V25.0782H106.201V14.2285C106.201 14.2285 105.538 14.6162 104.233 14.6162C102.929 14.6162 102.258 14.2285 102.258 14.2285Z" fill="currentColor"/>
                        <path d="M104.218 10.8157C102.885 10.8157 101.805 11.521 101.805 12.391C101.805 13.2609 102.885 13.9662 104.218 13.9662C105.551 13.9662 106.632 13.2609 106.632 12.391C106.632 11.521 105.551 10.8157 104.218 10.8157Z" fill="currentColor"/>
                        <path d="M69.707 14.2285V25.0782H73.6499V14.2285C73.6499 14.2285 72.9872 14.6162 71.6825 14.6162C70.3779 14.6162 69.707 14.2285 69.707 14.2285Z" fill="currentColor"/>
                        <path d="M71.6674 10.8157C70.3345 10.8157 69.2539 11.521 69.2539 12.391C69.2539 13.2609 70.3345 13.9662 71.6674 13.9662C73.0005 13.9662 74.0811 13.2609 74.0811 12.391C74.0811 11.521 73.0005 10.8157 71.6674 10.8157Z" fill="currentColor"/>
                        <path d="M130.616 22.744C129.712 22.744 129.047 21.5972 129.047 19.9993C129.047 18.4475 129.73 17.2552 130.585 17.2552C131.682 17.2552 132.15 18.2614 132.15 19.9993C132.15 21.8071 131.719 22.744 130.616 22.744ZM131.699 13.9636C129.672 13.9636 128.743 15.4835 128.339 16.3493C128.072 16.9214 128.086 17.0893 127.891 17.0893C127.609 17.0893 127.843 16.6298 127.97 16.0897C128.219 15.0263 128.029 14.2136 128.029 14.2136H125.141V28.0756H129.084C129.084 28.0756 129.084 25.8073 129.084 23.6807C129.55 24.4722 130.414 25.3179 131.747 25.3179C134.598 25.3179 136.033 22.9056 136.033 19.6462C136.033 15.952 134.315 13.9636 131.699 13.9636Z" fill="currentColor"/>
                        <path d="M26.682 17.2446C26.9471 17.213 27.2012 17.2115 27.4346 17.2446C27.5697 16.9348 27.593 16.4007 27.4714 15.819C27.2907 14.9545 27.0463 14.4313 26.5411 14.5127C26.036 14.5941 26.0173 15.2205 26.1979 16.0851C26.2995 16.5714 26.4804 16.987 26.682 17.2446Z" fill="currentColor"/>
                        <path d="M22.3442 17.9286C22.7056 18.0873 22.9278 18.1924 23.0147 18.1005C23.0706 18.0433 23.054 17.934 22.9677 17.7929C22.7893 17.5017 22.4222 17.2064 22.033 17.0405C21.2368 16.6978 20.2872 16.8118 19.5546 17.3381C19.3129 17.5153 19.0836 17.7608 19.1164 17.9098C19.1271 17.958 19.1633 17.9943 19.2481 18.0062C19.4476 18.029 20.1443 17.6767 20.9468 17.6276C21.5133 17.5929 21.9827 17.7701 22.3442 17.9286Z" fill="currentColor"/>
                        <path d="M21.6149 18.3436C21.1441 18.4179 20.8844 18.5732 20.7177 18.7175C20.5755 18.8417 20.4875 18.9792 20.4883 19.0759C20.4886 19.1219 20.5086 19.1484 20.5243 19.1618C20.5458 19.1806 20.5712 19.1911 20.6017 19.1911C20.7081 19.1911 20.9462 19.0955 20.9462 19.0955C21.6014 18.861 22.0335 18.8895 22.4618 18.9383C22.6985 18.9648 22.8103 18.9795 22.8622 18.8984C22.8776 18.8751 22.8962 18.8247 22.8488 18.7479C22.7385 18.569 22.2632 18.2666 21.6149 18.3436" fill="currentColor"/>
                        <path d="M25.2163 19.8666C25.5358 20.0237 25.8877 19.962 26.0024 19.7289C26.1169 19.4959 25.9506 19.1796 25.6309 19.0224C25.3113 18.8655 24.9594 18.927 24.8448 19.1601C24.7303 19.3933 24.8965 19.7094 25.2163 19.8666Z" fill="currentColor"/>
                        <path d="M27.2703 18.0709C27.0106 18.0664 26.7953 18.3516 26.7892 18.7076C26.7831 19.0638 26.9888 19.356 27.2485 19.3604C27.5081 19.3649 27.7236 19.0797 27.7295 18.7237C27.7356 18.3674 27.5299 18.0752 27.2703 18.0709Z" fill="currentColor"/>
                        <path d="M9.83004 24.4919C9.76544 24.411 9.65932 24.4356 9.55655 24.4596C9.48477 24.4764 9.40345 24.4952 9.31429 24.4937C9.1233 24.4899 8.96157 24.4085 8.87074 24.2689C8.75244 24.0872 8.75928 23.8163 8.88991 23.5064C8.90748 23.4644 8.92824 23.418 8.95084 23.3674C9.15903 22.9001 9.50765 22.118 9.11629 21.3728C8.82172 20.812 8.34133 20.4626 7.76373 20.3893C7.20923 20.319 6.63835 20.5246 6.27421 20.9263C5.69973 21.5601 5.60995 22.4226 5.72105 22.7274C5.76179 22.8389 5.82544 22.8698 5.87174 22.8761C5.96945 22.8892 6.11398 22.8181 6.20453 22.5745C6.211 22.557 6.21962 22.5298 6.23042 22.4953C6.27082 22.3666 6.34593 22.1268 6.46897 21.9346C6.61733 21.7028 6.8484 21.5432 7.11962 21.4851C7.39594 21.4259 7.67834 21.4787 7.91474 21.6335C8.31723 21.8967 8.47219 22.3898 8.30037 22.8604C8.21157 23.1037 8.06727 23.569 8.09913 23.9514C8.16344 24.7251 8.63936 25.0359 9.06699 25.069C9.48275 25.0845 9.77331 24.8513 9.84682 24.6806C9.89021 24.5797 9.85359 24.5183 9.83005 24.4919" fill="currentColor"/>
                        <path d="M13.781 10.2801C15.137 8.71317 16.8063 7.35092 18.3016 6.58601C18.3533 6.55944 18.4082 6.61569 18.3802 6.66639C18.2614 6.88141 18.0329 7.34188 17.9604 7.69111C17.9491 7.74554 18.0083 7.78647 18.0542 7.75518C18.9845 7.12106 20.6029 6.44157 22.0223 6.35422C22.0833 6.35044 22.1128 6.42867 22.0643 6.46589C21.8484 6.63154 21.6123 6.86065 21.4398 7.09244C21.4104 7.13187 21.4381 7.18868 21.4873 7.18898C22.484 7.19608 23.8891 7.54489 24.805 8.05859C24.8669 8.09327 24.8227 8.21326 24.7535 8.19739C23.3678 7.87989 21.0996 7.63891 18.7435 8.21358C16.6401 8.72668 15.0346 9.51873 13.8634 10.3705C13.8042 10.4137 13.7331 10.3355 13.781 10.2801L13.781 10.2801ZM20.5345 25.4617C20.5346 25.462 20.5348 25.4626 20.5349 25.4626C20.5352 25.463 20.5353 25.4638 20.5357 25.4642C20.5353 25.4634 20.5349 25.4626 20.5345 25.4617ZM26.1264 26.1218C26.1666 26.1049 26.1944 26.0591 26.1896 26.0136C26.184 25.9575 26.134 25.9167 26.0779 25.9225C26.0779 25.9225 23.1841 26.3507 20.4504 25.3501C20.7482 24.3823 21.5399 24.7317 22.7367 24.8283C24.8938 24.9569 26.827 24.6418 28.2558 24.2316C29.494 23.8765 31.12 23.1759 32.3831 22.1789C32.8091 23.1148 32.9595 24.1446 32.9595 24.1446C32.9595 24.1446 33.2893 24.0857 33.5648 24.2552C33.8252 24.4155 34.0162 24.7486 33.8857 25.6099C33.6201 27.219 32.9362 28.525 31.7868 29.7265C31.087 30.4796 30.2375 31.1345 29.2656 31.6107C28.7494 31.8818 28.1998 32.1164 27.6192 32.3059C23.2857 33.7212 18.85 32.1653 17.4201 28.8239C17.3061 28.5727 17.2095 28.3098 17.1335 28.0347C16.5241 25.8328 17.0414 23.1911 18.6584 21.5282C18.6585 21.528 18.6582 21.5273 18.6584 21.5273C18.758 21.4215 18.8598 21.2967 18.8598 21.1398C18.8598 21.0086 18.7764 20.8701 18.7041 20.7719C18.1383 19.9514 16.1787 18.5531 16.572 15.8472C16.8545 13.9031 18.5546 12.5341 20.1397 12.6152C20.2736 12.6222 20.4078 12.6303 20.5415 12.6382C21.2284 12.679 21.8276 12.7671 22.3931 12.7906C23.3395 12.8316 24.1906 12.6939 25.1986 11.8541C25.5386 11.5707 25.8112 11.3252 26.2725 11.247C26.321 11.2387 26.4416 11.1954 26.6827 11.2068C26.9287 11.2199 27.163 11.2875 27.3735 11.4276C28.1817 11.9654 28.2962 13.2677 28.3381 14.2205C28.362 14.7643 28.4279 16.0801 28.4502 16.4579C28.5017 17.3215 28.7287 17.4433 29.188 17.5945C29.4463 17.6797 29.6861 17.743 30.0395 17.8422C31.1092 18.1425 31.7435 18.4472 32.1431 18.8386C32.3816 19.0831 32.4925 19.3431 32.5268 19.5909C32.6528 20.5111 31.8123 21.6478 29.5872 22.6807C27.1549 23.8095 24.2041 24.0954 22.1653 23.8684C22.009 23.851 21.4529 23.788 21.451 23.7877C19.8201 23.5681 18.8899 25.6757 19.8686 27.1196C20.4995 28.0501 22.2176 28.6558 23.9367 28.6561C27.8783 28.6565 30.9078 26.9734 32.0347 25.5198C32.0685 25.4763 32.0718 25.4716 32.1249 25.3912C32.1803 25.3077 32.1347 25.2616 32.0656 25.3089C31.1448 25.9389 27.0552 28.4401 22.6808 27.6876C22.6808 27.6876 22.1493 27.6002 21.6641 27.4115C21.2785 27.2615 20.4715 26.8902 20.3734 26.0623C23.9036 27.154 26.1264 26.1219 26.1264 26.1219V26.1218ZM6.73637 17.7322C5.50864 17.971 4.42653 18.6668 3.76488 19.6279C3.36935 19.2981 2.63255 18.6595 2.50245 18.4107C1.44601 16.4049 3.65533 12.5048 5.19871 10.3023C9.01295 4.85925 14.9868 0.739281 17.7523 1.48684C18.2019 1.61408 19.6908 3.3404 19.6908 3.3404C19.6908 3.3404 16.9266 4.87423 14.363 7.01221C10.9088 9.6719 8.2995 13.5375 6.73637 17.7322ZM8.79942 26.937C8.61359 26.9687 8.42406 26.9814 8.23288 26.9767C6.38562 26.9272 4.39022 25.2641 4.19193 23.2919C3.97278 21.1119 5.08663 19.4342 7.05879 19.0364C7.29457 18.9889 7.57951 18.9615 7.88676 18.9775C8.99175 19.038 10.6201 19.8864 10.9921 22.2937C11.3216 24.4256 10.7983 26.5961 8.79942 26.937V26.937ZM33.8233 23.0768C33.8075 23.0209 33.7044 22.6441 33.5628 22.1901C33.4211 21.7358 33.2745 21.4162 33.2745 21.4162C33.8426 20.5656 33.8527 19.805 33.7772 19.374C33.6965 18.84 33.4742 18.3849 33.0261 17.9145C32.5779 17.4441 31.6614 16.9623 30.3733 16.6006C30.2261 16.5592 29.7403 16.4259 29.6976 16.413C29.6942 16.3851 29.662 14.8197 29.6328 14.1478C29.6114 13.662 29.5697 12.9036 29.3344 12.1566C29.054 11.1455 28.5653 10.2608 27.9555 9.69474C29.6385 7.95018 30.6892 6.02826 30.6867 4.37951C30.6818 1.20879 26.7878 0.24946 21.9891 2.23648C21.9841 2.23854 20.9797 2.66446 20.9724 2.66802C20.9678 2.66372 19.1343 0.864594 19.1067 0.84057C13.6355 -3.9316 -3.4707 15.0823 1.99847 19.7003L3.19371 20.7129C2.88368 21.516 2.76185 22.4362 2.86137 23.4258C2.9891 24.6967 3.64467 25.915 4.70726 26.8562C5.71596 27.75 7.04217 28.3156 8.32916 28.3145C10.4574 33.2191 15.3203 36.2279 21.0221 36.3972C27.1383 36.5789 32.2724 33.709 34.4238 28.5537C34.5645 28.1919 35.1617 26.5617 35.1617 25.1226C35.1617 23.6763 34.344 23.0768 33.8233 23.0768Z" fill="currentColor"/>
                    </svg>
                </a>
                <a href="#" class="flex items-center lg:justify-center">
                    <svg class="h-6 hover:text-gray-900 dark:hover:text-white" viewBox="0 0 124 21" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.813 0.069519L12.5605 11.1781L8.28275 0.069519H0.96875V20.2025H6.23233V6.89245L11.4008 20.2025H13.7233L18.8634 6.89245V20.2025H24.127V0.069519H16.813Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M34.8015 16.461V15.1601C34.3138 14.4663 33.2105 14.1334 32.1756 14.1334C30.9504 14.1334 29.8174 14.679 29.8174 15.8245C29.8174 16.9699 30.9504 17.5155 32.1756 17.5155C33.2105 17.5155 34.3138 17.1533 34.8015 16.4595V16.461ZM34.8015 20.201V18.7519C33.8841 19.8358 32.1117 20.5633 30.213 20.5633C27.9484 20.5633 25.1367 19.0218 25.1367 15.7614C25.1367 12.2326 27.9469 11.0578 30.213 11.0578C32.1756 11.0578 33.9183 11.6885 34.8015 12.7767V11.3277C34.8015 10.0605 33.7042 9.18487 31.8039 9.18487C30.3349 9.18487 28.8658 9.75687 27.6748 10.7542L25.9322 7.52314C27.831 5.92447 30.3691 5.26007 32.6291 5.26007C36.1783 5.26007 39.5179 6.561 39.5179 11.0871V20.2025H34.8015V20.201Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M40.1562 18.3002L42.1145 14.9826C43.2178 15.9447 45.57 16.9421 47.3186 16.9421C48.7237 16.9421 49.3051 16.5461 49.3051 15.9154C49.3051 14.1055 40.7094 15.9741 40.7094 10.0605C40.7094 7.4938 42.9739 5.26007 47.0391 5.26007C49.5489 5.26007 51.6276 6.04474 53.22 7.1902L51.4194 10.4858C50.5303 9.6366 48.8471 8.88127 47.0747 8.88127C45.9715 8.88127 45.2384 9.30514 45.2384 9.8786C45.2384 11.4773 53.7999 9.81994 53.7999 15.7966C53.7999 18.5686 51.3257 20.5633 47.103 20.5633C44.4429 20.5633 41.7205 19.6862 40.1562 18.3002Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M64.7231 20.2025V11.7149C64.7231 9.94019 63.7759 9.36672 62.2712 9.36672C60.8958 9.36672 59.9784 10.1177 59.4313 10.7821V20.201H54.7148V0.069519H59.4313V7.40285C60.3145 6.37619 62.063 5.26152 64.5372 5.26152C67.9065 5.26152 69.4335 7.13299 69.4335 9.81992V20.2025H64.7231Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M80.0535 16.461V15.1601C79.5643 14.4663 78.4626 14.1334 77.4217 14.1334C76.1965 14.1334 75.0635 14.679 75.0635 15.8245C75.0635 16.9699 76.1965 17.5155 77.4217 17.5155C78.4626 17.5155 79.5643 17.1533 80.0535 16.4595V16.461ZM80.0535 20.201V18.7519C79.1346 19.8358 77.3578 20.5633 75.465 20.5633C73.199 20.5633 70.3828 19.0218 70.3828 15.7614C70.3828 12.2326 73.199 11.0578 75.465 11.0578C77.4217 11.0578 79.1644 11.6885 80.0535 12.7767V11.3277C80.0535 10.0605 78.9488 9.18487 77.056 9.18487C75.5869 9.18487 74.1164 9.75687 72.9209 10.7542L71.1783 7.52314C73.0771 5.92447 75.6152 5.26007 77.8812 5.26007C81.4289 5.26007 84.7625 6.561 84.7625 11.0871V20.2025H80.0535V20.201Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M93.8157 16.461C95.6802 16.461 97.0913 15.097 97.0913 12.897C97.0913 10.7263 95.6802 9.36232 93.8157 9.36232C92.8046 9.36232 91.5854 9.90645 90.9995 10.6911V15.1601C91.5854 15.9447 92.8061 16.461 93.8157 16.461ZM86.2891 20.201V0.069519H90.9995V7.34419C92.0485 6.01247 93.6688 5.2418 95.3784 5.26152C99.0778 5.26152 101.895 8.13032 101.895 12.897C101.895 17.847 99.0198 20.5633 95.3784 20.5633C93.7235 20.5633 92.2247 19.8989 90.9995 18.5114V20.2025H86.2891V20.201Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M102.844 0.069519H107.554V20.2025H102.844V0.069519Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M116.336 9.00154C114.284 9.00154 113.49 10.2101 113.303 11.2646H119.396C119.27 10.2379 118.508 9.00154 116.336 9.00154ZM108.5 12.897C108.5 8.67447 111.712 5.26007 116.336 5.26007C120.709 5.26007 123.892 8.42807 123.892 13.3781V14.4385H113.368C113.704 15.7335 114.929 16.8218 117.067 16.8218C118.108 16.8218 119.821 16.3686 120.681 15.5839L122.725 18.6317C121.26 19.9267 118.81 20.5633 116.55 20.5633C111.991 20.5633 108.5 17.6358 108.5 12.897Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Work with tools you already use</h2>
                    <p class="mb-8 font-light lg:text-xl">Deliver great service experiences fast - without the complexity of traditional ITSM solutions. Accelerate critical development work, eliminate toil, and deploy changes with ease.</p>
                    <!-- List -->
                    <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Continuous integration and deployment</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Development workflow</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Knowledge management</span>
                        </li>
                    </ul>
                    <p class="mb-8 font-light lg:text-xl">Deliver great service experiences fast - without the complexity of traditional ITSM solutions.</p>
                </div>
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="./images/feature-1.png" alt="dashboard feature image">
            </div>
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="./images/feature-2.png" alt="feature image 2">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest in the world’s potential</h2>
                    <p class="mb-8 font-light lg:text-xl">Deliver great service experiences fast - without the complexity of traditional ITSM solutions. Accelerate critical development work, eliminate toil, and deploy changes with ease.</p>
                    <!-- List -->
                    <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Dynamic reports and dashboards</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Templates for everyone</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Development workflow</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Limitless business automation</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Knowledge management</span>
                        </li>
                    </ul>
                    <p class="font-light lg:text-xl">Deliver great service experiences fast - without the complexity of traditional ITSM solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
            <div class="col-span-2 mb-8">
                <p class="text-lg font-medium text-purple-600 dark:text-purple-500">Trusted Worldwide</p>
                <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">Trusted by over 600 million users and 10,000 teams</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Our rigorous security and compliance standards are at the heart of all we do. We work tirelessly to protect you and your customers.</p>
                <div class="pt-6 mt-6 space-y-4 border-t border-gray-200 dark:border-gray-700">
                    <div>
                        <a href="#" class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
                            Explore Legality Guide
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
                            Visit the Trust Center
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path></svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">99.99% uptime</h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">For Landwind, with zero maintenance downtime</p>
                </div>
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">600M+ Users</h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">Trusted by over 600 milion users around the world</p>
                </div>
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">100+ countries</h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">Have used Landwind to create functional websites</p>
                </div>
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">5+ Million</h3>
                    <p class="font-light text-gray-500 dark:text-gray-400">Transactions per day</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
            <figure class="max-w-screen-md mx-auto">
                <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                </svg>
                <blockquote>
                    <p class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">"Landwind is just awesome. It contains tons of predesigned components and pages starting from login screen to complex dashboard. Perfect choice for your next SaaS application."</p>
                </blockquote>
                <figcaption class="flex items-center justify-center mt-6 space-x-3">
                    <img class="w-6 h-6 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">
                    <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                        <div class="pr-3 font-medium text-gray-900 dark:text-white">Micheal Gough</div>
                        <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">CEO at Google</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Designed for business teams like yours</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here at Landwind we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Starter</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best option for personal use & for your next project.</p>
                    <div class="flex items-baseline justify-center my-8">
                        <span class="mr-2 text-5xl font-extrabold">$29</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Individual configuration</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>No setup, or hidden fees</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Team size: <span class="font-semibold">1 developer</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Premium support: <span class="font-semibold">6 months</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Free updates: <span class="font-semibold">6 months</span></span>
                        </li>
                    </ul>
                    <a href="#" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get started</a>
                </div>
                <!-- Pricing Card -->
                <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Company</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Relevant for multiple users, extended & premium support.</p>
                    <div class="flex items-baseline justify-center my-8">
                        <span class="mr-2 text-5xl font-extrabold">$99</span>
                        <span class="text-gray-500 dark:text-gray-400" dark:text-gray-400>/month</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Individual configuration</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>No setup, or hidden fees</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Team size: <span class="font-semibold">10 developers</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Premium support: <span class="font-semibold">24 months</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Free updates: <span class="font-semibold">24 months</span></span>
                        </li>
                    </ul>
                    <a href="#" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get started</a>
                </div>
                <!-- Pricing Card -->
                <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Enterprise</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best for large scale uses and extended redistribution rights.</p>
                    <div class="flex items-baseline justify-center my-8">
                        <span class="mr-2 text-5xl font-extrabold">$499</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Individual configuration</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>No setup, or hidden fees</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Team size: <span class="font-semibold">100+ developers</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Premium support: <span class="font-semibold">36 months</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Free updates: <span class="font-semibold">36 months</span></span>
                        </li>
                    </ul>
                    <a href="#" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get started</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6 ">
            <h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl dark:text-white">Frequently asked questions</h2>
            <div class="max-w-screen-md mx-auto">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h3 id="accordion-flush-heading-1">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-white" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                            <span>Can I use Landwind in open-source projects?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Landwind is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="#" class="text-purple-600 dark:text-purple-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-2">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                            <span>Is there a Figma file available?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Landwind is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="#" class="text-purple-600 dark:text-purple-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Landwind.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-3">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                            <span>What are the differences between Landwind and Tailwind UI?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Landwind are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Landwind relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Landwind, Landwind Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                            <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                                <li><a href="#" class="text-purple-600 dark:text-purple-500 hover:underline">Landwind Pro</a></li>
                                <li><a href="#" class="text-purple-600 dark:text-purple-500 hover:underline">Tailwind UI</a></li>
                            </ul>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-4">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                            <span>What about browser support?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Landwind are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Landwind relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Landwind, Landwind Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                            <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                                <li><a href="#" class="text-purple-600 dark:text-purple-500 hover:underline">Landwind Pro</a></li>
                                <li><a href="#" class="text-purple-600 dark:text-purple-500 hover:underline">Tailwind UI</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-screen-sm mx-auto text-center">
                <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">Start your free trial today</h2>
                <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Try Landwind Platform for 30 days. No credit card required.</p>
                <a href="#" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Free trial for 30 days</a>
            </div>
        </div>
    </section>

    <section class="relative bg-gray-50 dark:bg-gray-800 isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20"></div>
        <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-gray-50 dark:bg-gray-800 shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <img class="mx-auto h-12" src="/images/brandname/horizontal-retrocommunity.png" alt="">
            <figure class="mt-10">
                <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                    <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                </blockquote>
                <figcaption class="mt-10">
                    <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                        <div class="font-semibold text-gray-900">Judith Black</div>
                        <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="text-gray-600">CEO of Workcation</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>


    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Canais apoiadores</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
                <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">

                    <a href="#">
                        <img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="Bonnie Avatar">
                    </a>

                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400">CEO & Web Developer</span>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Bonnie drives the technical strategy of the flowbite platform and brand.</p>
                        <ul class="flex space-x-4 sm:mt-0">
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our team</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
            </div>
            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="Bonnie Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Bonnie Green</a>
                    </h3>
                    <p>CEO/Co-founder</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png" alt="Helene Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Helene Engels</a>
                    </h3>
                    <p>CTO/Co-founder</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Jese Leos</a>
                    </h3>
                    <p>SEO & Marketing</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png" alt="Joseph Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Joseph Mcfall</a>
                    </h3>
                    <p>Sales</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png" alt="Sofia Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Lana Byrd</a>
                    </h3>
                    <p>Web Designer</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/thomas-lean.png" alt="Leslie Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Leslie Livingston</a>
                    </h3>
                    <p>Graphic Designer</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="Michael Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Michael Gough</a>
                    </h3>
                    <p>React Developer</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/neil-sims.png" alt="Neil Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Neil Sims</a>
                    </h3>
                    <p>Vue.js Developer</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">

        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">


            <div class="flex flex-row items-center justify-between">
                <x-partials.title-section title="Tocados recentemente" description=""/>
                <span class="text-sm text-zinc-400">Mostrar tudo</span>
            </div>
            <div class="mt-4 -ml-3 grid grid-cols-5 gap-2">


                <div class="flex flex-col p-3 cursor-pointer gap-2 rounded-md hover:bg-white/5">
                    <img class="w-full h-full mx-auto rounded-md" src="https://i.scdn.co/image/ab67616d00001e023562c44947cd0b7696f95178" class="w-full" width={120} height={120} alt="Foto do álbum" />
                    <div>
                        <span class="font-semibold">Stone Preacher</span>
                        <span class="text-sm text-zinc-400">Understone</span>
                    </div>
                </div>

            </div>
            <div class="mt-4 -ml-3 grid grid-cols-5 gap-2">


                <div class="flex flex-col p-3 cursor-pointer gap-2 rounded-md hover:bg-white/5">
                    <img class="w-full h-full mx-auto rounded-md" src="https://i.scdn.co/image/ab67616d00001e023562c44947cd0b7696f95178" class="w-full" width={120} height={120} alt="Foto do álbum" />
                    <div>
                        <span class="font-semibold">Stone Preacher</span>
                        <span class="text-sm text-zinc-400">Understone</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <main>
        {{-- About--}}
        <section class="relative not-prose md:-mt-[76px]">
            <div class="absolute inset-0 pointer-events-none" aria-hidden="true"></div>
            <div class="relative mx-auto px-4 max-w-7xl sm:px-6">
                <div class="pointer-events-none md:pt-[76px] pt-0"></div>
                <div class="md:py-20 py-12">
                    <div class="mx-auto max-w-5xl md:pb-16 pb-10 text-center">
                        <p class="font-bold dark:text-blue-200 text-base text-secondary tracking-wide uppercase">About us</p>
                        <h1 class="font-bold font-heading leading-tighter tracking-tighter mb-4 dark:text-gray-200 md:text-6xl text-5xl">Elevate your online presence with our<br><span class="highlight dark:text-white text-accent">Beautiful Website Templates</span></h1>
                        <div class="mx-auto max-w-3xl">
                            <p class="text-muted text-xl dark:text-slate-300 mb-6">Donec efficitur, ipsum quis congue luctus, mauris magna convallis mauris, eu auctor nisi lectus non augue. Donec quis lorem non massa vulputate efficitur ac at turpis. Sed tincidunt ex a nunc convallis, et lobortis nisi tempus. Suspendisse vitae nisi eget tortor luctus maximus sed non lectus.</p>
                        </div>
                    </div>
                    <div>
                        <div class="relative m-auto max-w-5xl"><img alt="Caos Image" class="mx-auto w-full rounded-md" loading="eager" src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" crossorigin="anonymous" decoding="async" height="576" referrerpolicy="no-referrer" srcset="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80&h=225 400w, https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=768&q=80&h=432 768w, https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1024&q=80&h=576 1024w, https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2040&q=80&h=1147 2040w, https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2048&q=80&h=1152 2048w" style="object-fit:cover;object-position:center;max-width:1024px;max-height:576px;aspect-ratio:1.7777777777777777;width:100%" sizes="(max-width: 767px) 400px, (max-width: 1023px) 768px, (max-width: 2039px) 1024px, 2040px" width="1024"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default max-w-6xl">
                <div class="text-center md:mx-auto max-w-3xl mb-8 md:mb-12">
                    <h2 class="font-bold font-heading leading-tighter tracking-tighter text-3xl text-heading md:text-4xl">Statistics about us</h2>
                </div>
                <div class="flex justify-center -m-4 flex-wrap text-center">
                    <div class="w-full text-center dark:md:border-slate-500 md:border-r md:last:border-none md:w-1/4 min-w-[220px] p-4 sm:w-1/2">
                        <div class="font-bold font-heading dark:text-white lg:text-5xl text-[2.6rem] text-accent xl:text-6xl">4</div>
                        <div class="text-sm dark:text-slate-400 font-medium lg:text-base text-gray-800 tracking-widest uppercase">Offices</div>
                    </div>
                    <div class="w-full text-center dark:md:border-slate-500 md:border-r md:last:border-none md:w-1/4 min-w-[220px] p-4 sm:w-1/2">
                        <div class="font-bold font-heading dark:text-white lg:text-5xl text-[2.6rem] text-primary xl:text-6xl">248</div>
                        <div class="text-sm dark:text-slate-400 font-medium lg:text-base text-gray-800 tracking-widest uppercase">Employees</div>
                    </div>
                    <div class="w-full text-center dark:md:border-slate-500 md:border-r md:last:border-none md:w-1/4 min-w-[220px] p-4 sm:w-1/2">
                        <div class="font-bold font-heading dark:text-white lg:text-5xl text-[2.6rem] text-retro xl:text-6xl">12</div>
                        <div class="text-sm dark:text-slate-400 font-medium lg:text-base text-gray-800 tracking-widest uppercase">Templates</div>
                    </div>
                    <div class="w-full text-center dark:md:border-slate-500 md:border-r md:last:border-none md:w-1/4 min-w-[220px] p-4 sm:w-1/2">
                        <div class="font-bold font-heading dark:text-white lg:text-5xl text-[2.6rem] text-primary xl:text-6xl">24</div>
                        <div class="text-sm dark:text-slate-400 font-medium lg:text-base text-gray-800 tracking-widest uppercase">Awards</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default max-w-7xl lg:pb-12 md:pb-8">
                <div class="text-center md:mx-auto max-w-3xl mb-8 md:mb-12">
                    <h2 class="font-bold font-heading leading-tighter tracking-tighter text-3xl text-heading md:text-4xl">Our templates</h2>
                    <p class="text-muted text-xl mt-4">Etiam scelerisque, enim eget vestibulum luctus, nibh mauris blandit nulla, nec vestibulum risus justo ut enim. Praesent lacinia diam et ante imperdiet euismod.</p>
                </div>
                <div class="aspect-h-7 aspect-w-16" aria-hidden="true"></div>
                <div class="mx-auto gap-8 grid lg:grid-cols-3 md:gap-y-12 mt-12 sm:grid-cols-2">
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <symbol id="ai:tabler:template">
                                        <path d="M4 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1zm0 8a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1zm10-1h6m-6 4h6m-6 4h6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </symbol>
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Educational</h3>
                                <p class="text-muted mt-0.5">Morbi faucibus luctus quam, sit amet aliquet felis tempor id. Cras augue massa, ornare quis dignissim a, molestie vel nulla.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Interior Design</h3>
                                <p class="text-muted mt-0.5">Vivamus porttitor, tortor convallis aliquam pretium, turpis enim consectetur elit, vitae egestas purus erat ac nunc nulla.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Photography</h3>
                                <p class="text-muted mt-0.5">Duis sed lectus in nisl vehicula porttitor eget quis odio. Aliquam erat volutpat. Nulla eleifend nulla id sem fermentum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default max-w-7xl lg:pt-0 md:pt-0 pt-0">
                <div class="aspect-h-7 aspect-w-16" aria-hidden="true">
                    <div class="mx-auto w-full bg-gray-500 h-80 object-cover rounded-xl shadow-lg"><img alt="Colorful Image" class="mx-auto w-full bg-gray-500 h-80 object-cover rounded-xl shadow-lg" loading="lazy" src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" crossorigin="anonymous" decoding="async" height="320" referrerpolicy="no-referrer" srcset="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80&h=320 400w, https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=768&q=80&h=320 768w" style="object-fit:cover;object-position:center;width:100%;height:320px"></div>
                </div>
                <div class="mx-auto gap-8 grid lg:grid-cols-3 md:gap-y-12 mt-12 sm:grid-cols-2">
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">E-commerce</h3>
                                <p class="text-muted mt-0.5">Rutrum non odio at vehicula. Proin ipsum justo, dignissim in vehicula sit amet, dignissim id quam. Sed ac tincidunt sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Blog</h3>
                                <p class="text-muted mt-0.5">Nullam efficitur volutpat sem sed fringilla. Suspendisse et enim eu orci volutpat laoreet ac vitae libero.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Business</h3>
                                <p class="text-muted mt-0.5">Morbi et elit finibus, facilisis justo ut, pharetra ipsum. Donec efficitur, ipsum quis congue luctus, mauris magna.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Branding</h3>
                                <p class="text-muted mt-0.5">Suspendisse vitae nisi eget tortor luctus maximus sed non lectus. Cras malesuada pretium placerat. Nullam venenatis dolor a ante rhoncus.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Medical</h3>
                                <p class="text-muted mt-0.5">Vestibulum malesuada lacus id nibh posuere feugiat. Nam volutpat nulla a felis ultrices, id suscipit mauris congue. In hac habitasse platea dictumst.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row max-w-full sm:max-w-md">
                            <div class="flex justify-center">
                                <svg class="w-6 h-6 flex-shrink-0 mr-2 mt-1 rtl:ml-2 rtl:mr-0 text-primary" data-icon="tabler:template" height="1em" viewBox="0 0 24 24" width="1em">
                                    <use xlink:href="#ai:tabler:template"></use>
                                </svg>
                            </div>
                            <div class="mt-0.5">
                                <h3 class="font-semibold text-lg">Fashion Design</h3>
                                <p class="text-muted mt-0.5">Maecenas eu tellus eget est scelerisque lacinia et a diam. Aliquam velit lorem, vehicula id fermentum et, rhoncus et purus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default max-w-6xl">
                <div class="flex flex-col md:flex-row gap-8 md:gap-12">
                    <div class="w-full lg:w-1/2 gap-8 md:gap-12 lg:mr-16 md:mr-8 mr-0">
                        <div class="text-center md:mx-auto mb-4 md:mb-8 md:text-left rtl:md:text-right">
                            <h2 class="font-bold font-heading leading-tighter tracking-tighter text-3xl text-heading lg:text-4xl mb-4">Our values</h2>
                            <p class="text-muted dark:text-slate-400 mb-8 mt-4 text-xl">Maecenas eu tellus eget est scelerisque lacinia et a diam. Aliquam velit lorem, vehicula id fermentum et, rhoncus et purus. Nulla facilisi. Vestibulum malesuada lacus.</p>
                        </div>
                        <div class="w-full text-center md:text-left rtl:md:text-right"></div>
                    </div>
                    <div class="w-full lg:w-1/2 px-0">
                        <ul class="space-y-10">
                            <li class="flex md:-mx-4">
                                <div class="pr-4 rtl:pl-4 rtl:pr-0 rtl:sm:pl-0 rtl:sm:pr-4 sm:pl-4"><span class="flex justify-center items-center bg-blue-100 font-bold h-16 mx-auto rounded-full text-2xl text-primary w-16">1</span></div>
                                <div class="pl-4 rtl:pl-0 rtl:pr-4">
                                    <h3 class="text-xl font-heading font-semibold mb-4">Customer-centric approach</h3>
                                    <p class="text-muted dark:text-gray-400">Donec id nibh neque. Quisque et fermentum tortor. Fusce vitae dolor a mauris dignissim commodo. Ut eleifend luctus condimentum.</p>
                                </div>
                            </li>
                            <li class="flex md:-mx-4">
                                <div class="pr-4 rtl:pl-4 rtl:pr-0 rtl:sm:pl-0 rtl:sm:pr-4 sm:pl-4"><span class="flex justify-center items-center bg-blue-100 font-bold h-16 mx-auto rounded-full text-2xl text-primary w-16">2</span></div>
                                <div class="pl-4 rtl:pl-0 rtl:pr-4">
                                    <h3 class="text-xl font-heading font-semibold mb-4">Constant Improvement</h3>
                                    <p class="text-muted dark:text-gray-400">Phasellus laoreet fermentum venenatis. Vivamus dapibus pulvinar arcu eget mattis. Fusce eget mauris leo.</p>
                                </div>
                            </li>
                            <li class="flex md:-mx-4">
                                <div class="pr-4 rtl:pl-4 rtl:pr-0 rtl:sm:pl-0 rtl:sm:pr-4 sm:pl-4"><span class="flex justify-center items-center bg-blue-100 font-bold h-16 mx-auto rounded-full text-2xl text-primary w-16">3</span></div>
                                <div class="pl-4 rtl:pl-0 rtl:pr-4">
                                    <h3 class="text-xl font-heading font-semibold mb-4">Ethical Practices</h3>
                                    <p class="text-muted dark:text-gray-400">Vestibulum imperdiet libero et lectus molestie, et maximus augue porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default max-w-6xl">
                <div class="flex flex-col md:flex-row gap-8 md:gap-12 md:flex-row-reverse">
                    <div class="w-full lg:w-1/2 gap-8 md:gap-12 lg:ml-16 md:ml-8 ml-0">
                        <div class="text-center md:mx-auto mb-4 md:mb-8 md:text-left rtl:md:text-right">
                            <h2 class="font-bold font-heading leading-tighter tracking-tighter text-3xl text-heading lg:text-4xl mb-4">Achievements</h2>
                            <p class="text-muted dark:text-slate-400 mb-8 mt-4 text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, quam nec venenatis lobortis, mi risus tempus nulla, sed porttitor est nibh at nulla.</p>
                        </div>
                        <div class="w-full text-center md:text-left rtl:md:text-right"><a class="btn-primary mb-12 w-auto" href="/">See more</a></div>
                    </div>
                    <div class="w-full lg:w-1/2 px-0">
                        <ul class="space-y-10">
                            <li class="flex md:-mx-4">
                                <div class="pr-4 rtl:pl-4 rtl:pr-0 rtl:sm:pl-0 rtl:sm:pr-4 sm:pl-4">
                    <span class="flex justify-center items-center bg-blue-100 font-bold h-16 mx-auto rounded-full text-2xl text-primary w-16">
                      <svg class="w-6 h-6 icon-bold" data-icon="tabler:globe" height="1em" viewBox="0 0 24 24" width="1em">
                        <symbol id="ai:tabler:globe">
                          <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M7 9a4 4 0 1 0 8 0a4 4 0 0 0-8 0"/>
                            <path d="M5.75 15A8.015 8.015 0 1 0 15 2m-4 15v4m-4 0h8"/>
                          </g>
                        </symbol>
                        <use xlink:href="#ai:tabler:globe"></use>
                      </svg>
                    </span>
                                </div>
                                <div class="pl-4 rtl:pl-0 rtl:pr-4">
                                    <h3 class="text-xl font-heading font-semibold mb-4">Global reach</h3>
                                    <p class="text-muted dark:text-gray-400">Nam malesuada urna in enim imperdiet tincidunt. Phasellus non tincidunt nisi, at elementum mi.</p>
                                </div>
                            </li>
                            <li class="flex md:-mx-4">
                                <div class="pr-4 rtl:pl-4 rtl:pr-0 rtl:sm:pl-0 rtl:sm:pr-4 sm:pl-4">
                    <span class="flex justify-center items-center bg-blue-100 font-bold h-16 mx-auto rounded-full text-2xl text-primary w-16">
                      <svg class="w-6 h-6 icon-bold" data-icon="tabler:message-star" height="1em" viewBox="0 0 24 24" width="1em">
                        <symbol id="ai:tabler:message-star">
                          <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M8 9h8m-8 4h4.5m-2.175 6.605L8 21v-3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v4.5"/>
                            <path d="m17.8 20.817l-2.172 1.138a.392.392 0 0 1-.568-.41l.415-2.411l-1.757-1.707a.389.389 0 0 1 .217-.665l2.428-.352l1.086-2.193a.392.392 0 0 1 .702 0l1.086 2.193l2.428.352a.39.39 0 0 1 .217.665l-1.757 1.707l.414 2.41a.39.39 0 0 1-.567.411z"/>
                          </g>
                        </symbol>
                        <use xlink:href="#ai:tabler:message-star"></use>
                      </svg>
                    </span>
                                </div>
                                <div class="pl-4 rtl:pl-0 rtl:pr-4">
                                    <h3 class="text-xl font-heading font-semibold mb-4">Positive customer feedback and reviews</h3>
                                    <p class="text-muted dark:text-gray-400">Cras semper nulla leo, eget laoreet erat cursus sed. Praesent faucibus massa in purus iaculis dictum.</p>
                                </div>
                            </li>
                            <li class="flex md:-mx-4">
                                <div class="pr-4 rtl:pl-4 rtl:pr-0 rtl:sm:pl-0 rtl:sm:pr-4 sm:pl-4">
                    <span class="flex justify-center items-center bg-blue-100 font-bold h-16 mx-auto rounded-full text-2xl text-primary w-16">
                      <svg class="w-6 h-6 icon-bold" data-icon="tabler:award" height="1em" viewBox="0 0 24 24" width="1em">
                        <symbol id="ai:tabler:award">
                          <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M6 9a6 6 0 1 0 12 0A6 6 0 1 0 6 9"/>
                            <path d="m12 15l3.4 5.89l1.598-3.233l3.598.232l-3.4-5.889M6.802 12l-3.4 5.89L7 17.657l1.598 3.232l3.4-5.889"/>
                          </g>
                        </symbol>
                        <use xlink:href="#ai:tabler:award"></use>
                      </svg>
                    </span>
                                </div>
                                <div class="pl-4 rtl:pl-0 rtl:pr-4">
                                    <h3 class="text-xl font-heading font-semibold mb-4">Awards and recognition as industry experts</h3>
                                    <p class="text-muted dark:text-gray-400">Phasellus lacinia cursus velit, eu malesuada magna pretium eu. Etiam aliquet tellus purus, blandit lobortis ex rhoncus vitae.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default max-w-7xl">
                <div class="text-center md:mx-auto max-w-3xl mb-8 md:mb-12">
                    <p class="font-bold dark:text-blue-200 text-base text-secondary tracking-wide uppercase">Find us</p>
                    <h2 class="font-bold font-heading leading-tighter tracking-tighter text-3xl text-heading md:text-4xl">Our locations</h2>
                </div>
                <div class="grid sm:grid-cols-2 gap-4 md:gap-6 sm:gap-y-8 lg:grid-cols-4 md:grid-cols-3">
                    <div class="flex flex-col backdrop-blur bg-white border border-[#ffffff29] dark:bg-slate-900 dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative rounded-lg shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <div class="font-bold text-xl">EE.UU</div>
                        <p class="text-muted mt-2">1234 Lorem Ipsum St, 12345, Miami</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border border-[#ffffff29] dark:bg-slate-900 dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative rounded-lg shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <div class="font-bold text-xl">Spain</div>
                        <p class="text-muted mt-2">5678 Lorem Ipsum St, 56789, Madrid</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border border-[#ffffff29] dark:bg-slate-900 dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative rounded-lg shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <div class="font-bold text-xl">Australia</div>
                        <p class="text-muted mt-2">9012 Lorem Ipsum St, 90123, Sydney</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border border-[#ffffff29] dark:bg-slate-900 dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative rounded-lg shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <div class="font-bold text-xl">Brazil</div>
                        <p class="text-muted mt-2">3456 Lorem Ipsum St, 34567, São Paulo</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default max-w-7xl">
                <div class="text-center md:mx-auto max-w-3xl mb-8 md:mb-12">
                    <p class="font-bold dark:text-blue-200 text-base text-secondary tracking-wide uppercase">Contact us</p>
                    <h2 class="font-bold font-heading leading-tighter tracking-tighter text-3xl text-heading md:text-4xl">Technical Support</h2>
                </div>
                <div class="grid sm:grid-cols-2 gap-4 md:gap-6 sm:gap-y-8">
                    <div class="flex flex-col backdrop-blur bg-white border border-[#ffffff29] dark:bg-slate-900 dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative rounded-lg shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <svg class="h-12 w-12 mb-6 text-primary" data-icon="tabler:messages" height="1em" viewBox="0 0 24 24" width="1em">
                            <symbol id="ai:tabler:messages">
                                <path d="m21 14l-3-3h-7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1zm-7 1v2a1 1 0 0 1-1 1H6l-3 3V11a1 1 0 0 1 1-1h2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </symbol>
                            <use xlink:href="#ai:tabler:messages"></use>
                        </svg>
                        <div class="font-bold text-xl">Chat with us</div>
                        <p class="text-muted mt-2">Integer luctus laoreet libero, auctor varius purus rutrum sit amet. Ut nec molestie nisi, quis eleifend mi.</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border border-[#ffffff29] dark:bg-slate-900 dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative rounded-lg shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <svg class="h-12 w-12 mb-6 text-primary" data-icon="tabler:headset" height="1em" viewBox="0 0 24 24" width="1em">
                            <symbol id="ai:tabler:headset">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M4 14v-3a8 8 0 1 1 16 0v3m-2 5c0 1.657-2.686 3-6 3"/>
                                    <path d="M4 14a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm11 0a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2z"/>
                                </g>
                            </symbol>
                            <use xlink:href="#ai:tabler:headset"></use>
                        </svg>
                        <div class="font-bold text-xl">Call us</div>
                        <p class="text-muted mt-2">Mauris faucibus finibus orci, in posuere elit viverra non. In hac habitasse platea dictumst. Cras lobortis metus a hendrerit congue.</p>
                    </div>
                </div>
            </div>
        </section>

        {{--Blog detail--}}
        <section class="mx-auto lg:py-20 py-8 sm:py-16">
            <article>
                <header class="">
                    <div class="mb-2 flex flex-col justify-between max-w-3xl mt-0 mx-auto px-4 sm:flex-row sm:items-center sm:px-6">
                        <p>
                            <svg class="inline-block -mt-0.5 dark:text-gray-400 h-4 w-4" data-icon="tabler:clock" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:clock">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0-18 0"/>
                                        <path d="M12 7v5l3 3"/>
                                    </g>
                                </symbol>
                                <use xlink:href="#ai:tabler:clock"></use>
                            </svg>
                            <time class="inline-block" datetime="Sat Aug 12 2023 00:00:00 GMT+0000 (Coordinated Universal Time)">Aug 12, 2023</time> ·
                            <svg class="inline-block -mt-0.5 dark:text-gray-400 h-4 w-4" data-icon="tabler:user" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:user">
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0-8 0M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </symbol>
                                <use xlink:href="#ai:tabler:user"></use>
                            </svg>
                            <span class="inline-block">John Smith</span> · <a href="/category/tutorials" class="inline-block hover:underline">Tutorials </a>&nbsp;· <span>7</span> min read
                        </p>
                    </div>
                    <h1 class="mx-auto sm:px-6 max-w-3xl px-4 font-bold font-heading leading-tighter md:text-5xl text-4xl tracking-tighter">Get started with AstroWind to create a website using Astro and Tailwind CSS</h1>
                    <p class="text-muted dark:text-slate-400 max-w-3xl mb-8 md:text-2xl mt-4 mx-auto px-4 sm:px-6 text-justify text-xl">Start your web journey with AstroWind – harness Astro and Tailwind CSS for a stunning site. Explore our guide now.</p>
                    <img alt="Start your web journey with AstroWind – harness Astro and Tailwind CSS for a stunning site. Explore our guide now." class="mx-auto bg-gray-400 dark:bg-slate-700 lg:max-w-[900px] max-w-full mb-6 sm:rounded-md" loading="eager" src="https://images.unsplash.com/photo-1516996087931-5ae405802f9f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" crossorigin="anonymous" decoding="async" height="506" referrerpolicy="no-referrer" sizes="(max-width: 900px) 400px, 900px" srcset="https://images.unsplash.com/photo-1516996087931-5ae405802f9f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80&h=224 400w, https://images.unsplash.com/photo-1516996087931-5ae405802f9f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=900&q=80&h=506 900w, https://images.unsplash.com/photo-1516996087931-5ae405802f9f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1800&q=80&h=1012 1800w" style="object-fit:cover;object-position:center;max-width:900px;max-height:506px;aspect-ratio:1.7786561264822134;width:100%" width="900">
                </header>
                <div class="mx-auto sm:px-6 max-w-3xl px-6 mt-8 dark:prose-a:text-blue-400 dark:prose-headings:text-slate-300 dark:prose-invert lg:prose-xl prose prose-a:text-primary prose-headings:font-bold prose-headings:font-heading prose-headings:leading-tighter prose-headings:scroll-mt-[80px] prose-headings:tracking-tighter prose-img:rounded-md prose-img:shadow-lg prose-li:my-0 prose-md">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <h2 id="nostra-torquent-consequat-volutpat-aliquet-neque">Nostra torquent consequat volutpat aliquet neque</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit proin, aenean litora volutpat urna egestas magnis arcu non, cras ut cursus et sed morbi lectus. Integer faucibus sagittis eu nunc urna aliquet a laoreet torquent, suspendisse penatibus nulla sollicitudin congue rutrum dictum. Ornare mi habitasse fermentum phasellus dui et morbi litora sodales dictum id erat, nibh purus class ligula aenean lectus venenatis euismod cras torquent ac. Senectus sagittis conubia hendrerit at egestas porta venenatis nisi metus gravida tempor, aenean facilisis nisl ante facilisi lacus integer hac iaculis purus. Scelerisque libero torquent egestas curae tellus viverra inceptos imperdiet urna, porta suspendisse interdum primis odio morbi tempor commodo dictumst, suscipit ornare habitasse semper feugiat cras quisque lobortis.</p>
                    <p>Iaculis arcu commodo dis proin vitae himenaeos, ante tristique potenti magna ligula, sagittis libero fermentum ullamcorper sociis. Sem eros non arcu natoque fringilla lacus vestibulum lacinia integer mus viverra in proin, sagittis fusce tortor erat enim rutrum vulputate curae laoreet class diam. Inceptos convallis ac nisi natoque nam quisque magnis ut nullam fringilla curae, luctus lacus purus habitant erat magna molestie class habitasse metus, nibh lobortis tortor curabitur neque phasellus feugiat netus morbi parturient. Neque malesuada mauris justo himenaeos pharetra, ullamcorper enim ligula a nulla consequat, eget vivamus velit ridiculus.</p>
                    <h2 id="praesent-tellus-ad-sapien-erat-or">Praesent tellus ad sapien erat or</h2>
                    <ul>
                        <li>
                            <p>Quam orci nostra mi nulla, hac a.</p>
                        </li>
                        <li>
                            <p>Interdum iaculis quis tellus sociis orci nulla, quam rutrum conubia tortor primis.</p>
                        </li>
                        <li>
                            <p>Non felis sem placerat aenean duis, ornare turpis nostra.</p>
                        </li>
                        <li>
                            <p>Habitasse duis sociis sagittis cursus, ante dictumst commodo.</p>
                        </li>
                    </ul>
                    <p>Duis maecenas massa habitasse inceptos imperdiet scelerisque at condimentum ultrices, nam dui leo enim taciti varius cras habitant pretium rhoncus, ut hac euismod nostra metus sagittis mi aenean. Quam eleifend aliquet litora eget a tempor, ultricies integer vestibulum non felis sodales, eros diam massa libero iaculis.</p>
                    <p>Nisl ligula ante magnis himenaeos pellentesque orci cras integer urna ut convallis, id phasellus libero est nunc ultrices eget blandit massa ac hac, morbi vulputate quisque tellus feugiat conubia luctus tincidunt curae fermentum. Venenatis dictumst tincidunt senectus vivamus duis dis sociis taciti porta primis, rhoncus ridiculus rutrum curae mattis ullamcorper ac sagittis nascetur curabitur erat, faucibus placerat vulputate eu at habitasse nulla nisl interdum. Varius turpis dignissim montes ac ante tristique quis parturient hendrerit faucibus, consequat auctor penatibus suspendisse rutrum erat nulla inceptos est justo, etiam mollis mauris facilisi cras sociosqu eu sapien sed.</p>
                    <p>Blandit aptent conubia mollis mauris habitasse suspendisse torquent aenean, ac primis auctor congue cursus mi posuere molestie, velit elementum per feugiat libero dictumst phasellus. Convallis mollis taciti condimentum praesent id porttitor ac dictumst at, sed in eu eleifend vehicula fermentum lectus litora venenatis, gravida hac molestie cum sociosqu mus viverra torquent. Congue est fusce habitasse ridiculus integer suscipit platea volutpat, inceptos varius elementum pellentesque malesuada interdum magnis. Hac lacus eget enim purus massa commodo nec lectus natoque fames arcu, mattis class quam ut neque dui cras quis diam orci sed velit, erat morbi eros suscipit sagittis laoreet vivamus torquent nulla turpis.</p>
                    <p>Ridiculus velit suscipit consequat auctor interdum magna gravida dictumst libero ut habitasse, sollicitudin vehicula suspendisse leo erat tristique at platea sagittis proin dignissim, id ornare scelerisque et urna maecenas congue tincidunt dictum malesuada. Dui vulputate accumsan scelerisque ridiculus dictum quisque et nam hac, tempus ultricies curabitur proin netus diam vivamus. Vestibulum ante ac auctor mi urna risus lacinia vulputate justo orci sociis dui semper, commodo morbi enim vivamus neque sem pellentesque velit donec hac metus odio. Tempor ultrices himenaeos massa sollicitudin mus conubia scelerisque cubilia, nascetur potenti mauris convallis et lectus gravida egestas sociis, erat eros ultricies aptent congue tortor ornare.</p>
                    <p>Pretium aliquet sodales aliquam tincidunt litora lectus, erat dui nibh diam mus, sed hendrerit condimentum senectus arcu. Arcu a nibh auctor dapibus eros turpis tempus commodo, libero hendrerit dictum interdum mus class sed scelerisque, sapien dictumst enim magna molestie habitant donec. Fringilla dui sed curabitur commodo varius est vel, viverra primis habitant sapien montes mattis dignissim, gravida cubilia laoreet tempus aliquet senectus. Sociosqu purus praesent porttitor curae sollicitudin accumsan feugiat maecenas donec quis lacus, suscipit taciti convallis odio morbi eros nibh bibendum nunc orci. Magna cras nullam aliquam metus nibh sagittis facilisi tortor nec, mus varius curae ridiculus fames congue interdum erat urna, neque odio lobortis mi mattis diam cubilia arcu.</p>
                    <p>Laoreet fusce nec class porttitor mus proin aenean, velit vestibulum feugiat porta egestas sapien posuere, conubia nisi tempus varius hendrerit tortor. Congue aliquam scelerisque neque vivamus habitasse semper mauris pellentesque accumsan posuere, suspendisse lectus gravida erat sagittis arcu praesent mus ornare. Habitasse nibh nam morbi mollis senectus erat risus, cum sollicitudin class platea congue mattis venenatis, luctus aenean parturient hendrerit malesuada ante. Mus auctor tincidunt consequat massa tortor nulla luctus habitasse vestibulum quis velit, laoreet sagittis cum facilisi in sem tellus leo vulputate vehicula bibendum orci, felis nisl blandit lacus convallis congue turpis magna facilisis condimentum.</p>
                    <p>Dictumst pellentesque urna donec sociis suscipit montes consequat, commodo quam habitasse senectus fringilla maecenas, inceptos magna tristique eu nullam nam. Maecenas orci nibh hac eu tristique ut penatibus ultrices ante, pellentesque cubilia pharetra dis facilisis aliquam praesent malesuada vivamus, commodo cras velit convallis molestie nec tellus augue. Etiam ut convallis risus id dapibus platea laoreet accumsan, habitant et aenean netus inceptos iaculis per, mauris curae at ligula odio ad eu. Mauris erat tempor interdum sapien commodo per nullam tortor, fusce facilisis vehicula egestas dui nulla conubia ut fames, fringilla et tincidunt penatibus facilisi at mollis.</p>
                    <p>Fermentum sociosqu litora primis sollicitudin fusce diam consequat vehicula per lobortis et, viverra sodales magna rutrum sed mollis faucibus molestie purus montes est, risus nostra congue venenatis lectus enim torquent eros dis dapibus. Dui suscipit scelerisque massa ligula euismod accumsan augue, magna vel lacus ante nullam senectus commodo, viverra cubilia eros eget penatibus tempor. Mattis mauris hac felis semper dui sociis faucibus mollis ornare pretium aliquam velit nisl, quis litora sem at vel duis rutrum imperdiet natoque viverra himenaeos tempor.</p>
                    <p>Integer eu tristique purus luctus vivamus porttitor vel nisl, tortor malesuada augue vulputate diam velit pellentesque sodales, duis phasellus vestibulum fermentum leo facilisi porta. Hac porttitor cum dapibus volutpat quisque odio taciti nulla senectus mollis curae, accumsan suscipit cubilia tempor ligula in venenatis justo leo erat, magna tincidunt nullam lacinia luctus malesuada non vivamus praesent pharetra. Non quam felis montes pretium volutpat suspendisse lacus, torquent magna dictumst orci libero porta, feugiat taciti cras ridiculus aenean rutrum. Tellus nostra tincidunt hac in ligula mi vulputate venenatis pellentesque urna dui, at luctus tristique quisque vel a dignissim scelerisque platea pretium, suspendisse ante phasellus porttitor quis aliquam malesuada etiam enim nullam.</p>
                    <p>Hendrerit taciti litora nec facilisis diam vehicula magnis potenti, parturient velit egestas nisl lobortis tincidunt rutrum cursus, fusce senectus mi massa primis mattis rhoncus. Accumsan est ac varius consequat vulputate, ligula cursus euismod sagittis inceptos scelerisque, lacus malesuada torquent dictumst. Volutpat morbi metus urna rhoncus nunc tempor molestie, congue curabitur quis interdum posuere. Mollis viverra velit tortor mus netus nunc molestie metus, sem massa himenaeos luctus feugiat taciti iaculis fames porttitor, leo arcu consequat gravida dapibus pulvinar elementum.</p>
                </div>
                <div class="flex flex-col justify-between max-w-3xl mx-auto sm:flex-row sm:px-6 mt-8 px-6">
                    <ul class="mr-5 rtl:ml-5 rtl:mr-0">
                        <li class="mb-2 font-medium bg-gray-100 dark:bg-slate-700 inline-block lowercase mr-2 px-2 py-0.5 rtl:ml-2 rtl:mr-0"><a href="/tag/astro" class="text-muted hover:text-primary dark:hover:text-gray-200 dark:text-slate-300">astro</a></li>
                        <li class="mb-2 font-medium bg-gray-100 dark:bg-slate-700 inline-block lowercase mr-2 px-2 py-0.5 rtl:ml-2 rtl:mr-0"><a href="/tag/tailwind-css" class="text-muted hover:text-primary dark:hover:text-gray-200 dark:text-slate-300">tailwind css</a></li>
                    </ul>
                    <div class="align-middle dark:text-slate-600 mt-5 sm:mt-1 text-gray-500">
                        <span class="font-bold align-super dark:text-slate-400 text-slate-500">Share:</span>
                        <button class="rtl:ml-0 ml-2 rtl:mr-2" data-aw-social-share="twitter" data-aw-url="https://astrowind.vercel.app/get-started-website-with-astro-tailwind-css" title="Twitter Share" data-aw-text="Get started with AstroWind to create a website using Astro and Tailwind CSS">
                            <svg class="w-6 h-6 dark:hover:text-slate-300 dark:text-slate-500 hover:text-black text-gray-400" data-icon="tabler:brand-x" height="1em" viewBox="0 0 24 24" width="1em">
                                <use xlink:href="#ai:tabler:brand-x"></use>
                            </svg>
                        </button>
                        <button class="rtl:ml-0 ml-2 rtl:mr-2" data-aw-social-share="facebook" data-aw-url="https://astrowind.vercel.app/get-started-website-with-astro-tailwind-css" title="Facebook Share">
                            <svg class="w-6 h-6 dark:hover:text-slate-300 dark:text-slate-500 hover:text-black text-gray-400" data-icon="tabler:brand-facebook" height="1em" viewBox="0 0 24 24" width="1em">
                                <use xlink:href="#ai:tabler:brand-facebook"></use>
                            </svg>
                        </button>
                        <button class="rtl:ml-0 ml-2 rtl:mr-2" data-aw-social-share="linkedin" data-aw-url="https://astrowind.vercel.app/get-started-website-with-astro-tailwind-css" title="Linkedin Share" data-aw-text="Get started with AstroWind to create a website using Astro and Tailwind CSS">
                            <svg class="w-6 h-6 dark:hover:text-slate-300 dark:text-slate-500 hover:text-black text-gray-400" data-icon="tabler:brand-linkedin" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:brand-linkedin">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm4 5v5m0-8v.01M12 16v-5"/>
                                        <path d="M16 16v-3a2 2 0 0 0-4 0"/>
                                    </g>
                                </symbol>
                                <use xlink:href="#ai:tabler:brand-linkedin"></use>
                            </svg>
                        </button>
                        <button class="rtl:ml-0 ml-2 rtl:mr-2" data-aw-social-share="whatsapp" data-aw-url="https://astrowind.vercel.app/get-started-website-with-astro-tailwind-css" title="Whatsapp Share" data-aw-text="Get started with AstroWind to create a website using Astro and Tailwind CSS">
                            <svg class="w-6 h-6 dark:hover:text-slate-300 dark:text-slate-500 hover:text-black text-gray-400" data-icon="tabler:brand-whatsapp" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:brand-whatsapp">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="m3 21l1.65-3.8a9 9 0 1 1 3.4 2.9z"/>
                                        <path d="M9 10a.5.5 0 0 0 1 0V9a.5.5 0 0 0-1 0za5 5 0 0 0 5 5h1a.5.5 0 0 0 0-1h-1a.5.5 0 0 0 0 1"/>
                                    </g>
                                </symbol>
                                <use xlink:href="#ai:tabler:brand-whatsapp"></use>
                            </svg>
                        </button>
                        <button class="rtl:ml-0 ml-2 rtl:mr-2" data-aw-social-share="mail" data-aw-url="https://astrowind.vercel.app/get-started-website-with-astro-tailwind-css" title="Email Share" data-aw-text="Get started with AstroWind to create a website using Astro and Tailwind CSS">
                            <svg class="w-6 h-6 dark:hover:text-slate-300 dark:text-slate-500 hover:text-black text-gray-400" data-icon="tabler:mail" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:mail">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                        <path d="m3 7l9 6l9-6"/>
                                    </g>
                                </symbol>
                                <use xlink:href="#ai:tabler:mail"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </article>
        </section>
        <div class="mx-auto sm:px-6 max-w-3xl px-6 md:pb-20 md:pt-4 pb-12 pt-8">
            <a href="/blog" class="btn btn-tertiary md:px-3 px-3">
                <svg class="h-5 w-5 -ml-1.5 mr-1 rtl:-mr-1.5 rtl:ml-1" data-icon="tabler:chevron-left" height="1em" viewBox="0 0 24 24" width="1em">
                    <symbol id="ai:tabler:chevron-left">
                        <path d="m15 6l-6 6l6 6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </symbol>
                    <use xlink:href="#ai:tabler:chevron-left"></use>
                </svg>
                Back to Blog
            </a>
        </div>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="mx-auto px-4 max-w-7xl relative lg:pt-0 lg:py-20 md:pt-0 md:px-6 md:py-16 pt-0 py-12 text-default">
                <div class="flex flex-col lg:flex-row lg:justify-between mb-8">
                    <div class="md:max-w-sm">
                        <h2 class="mb-2 font-bold font-heading group sm:leading-none sm:text-4xl text-3xl tracking-tight">Related Posts</h2>
                        <a href="/blog" class="text-muted dark:text-slate-400 block duration-200 ease-in hover:text-primary lg:mb-0 mb-6 transition">View All Posts »</a>
                    </div>
                </div>
                <div class="grid -mb-6 gap-6 lg:grid-cols-4 md:grid-cols-2 row-gap-5">
                    <article class="transition mb-6">
                        <div class="rounded bg-gray-400 dark:bg-slate-700 shadow-lg mb-6 md:h-64 relative"><a href="/how-to-customize-astrowind-to-your-brand"><img alt="How to customize AstroWind template to suit your branding" class="rounded bg-gray-400 dark:bg-slate-700 shadow-lg md:h-full w-full" loading="lazy" src="https://images.unsplash.com/photo-1546984575-757f4f7c13cf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" crossorigin="anonymous" decoding="async" height="225" referrerpolicy="no-referrer" sizes="(max-width: 900px) 400px, 900px" srcset="https://images.unsplash.com/photo-1546984575-757f4f7c13cf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80&h=225 400w, https://images.unsplash.com/photo-1546984575-757f4f7c13cf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=900&q=80&h=506 900w" style="object-fit:cover;object-position:center;max-width:100%;max-height:100%" width="400"></a></div>
                        <h3 class="mb-2 font-bold font-heading dark:text-slate-300 leading-tight sm:text-2xl text-xl"><a href="/how-to-customize-astrowind-to-your-brand" class="transition duration-200 ease-in hover:text-primary dark:hover:text-blue-700 inline-block">How to customize AstroWind template to suit your branding</a></h3>
                        <p class="text-muted dark:text-slate-400 text-lg">Personalize AstroWind template for your brand. Our guide unlocks seamless customization steps for a unique online presence.</p>
                    </article>
                    <article class="transition mb-6">
                        <div class="rounded bg-gray-400 dark:bg-slate-700 shadow-lg mb-6 md:h-64 relative"><a href="/astrowind-template-in-depth"><img alt="AstroWind template in depth" class="rounded bg-gray-400 dark:bg-slate-700 shadow-lg md:h-full w-full" loading="lazy" src="https://images.unsplash.com/photo-1534307671554-9a6d81f4d629?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1651&q=80" crossorigin="anonymous" decoding="async" height="225" referrerpolicy="no-referrer" sizes="(max-width: 900px) 400px, 900px" srcset="https://images.unsplash.com/photo-1534307671554-9a6d81f4d629?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80&h=225 400w, https://images.unsplash.com/photo-1534307671554-9a6d81f4d629?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=900&q=80&h=506 900w" style="object-fit:cover;object-position:center;max-width:100%;max-height:100%" width="400"></a></div>
                        <h3 class="mb-2 font-bold font-heading dark:text-slate-300 leading-tight sm:text-2xl text-xl"><a href="/astrowind-template-in-depth" class="transition duration-200 ease-in hover:text-primary dark:hover:text-blue-700 inline-block">AstroWind template in depth</a></h3>
                        <p class="text-muted dark:text-slate-400 text-lg">While easy to get started, Astrowind is quite complex internally. This page provides documentation on some of the more intricate parts.</p>
                    </article>
                    <article class="transition mb-6">
                        <div class="rounded bg-gray-400 dark:bg-slate-700 shadow-lg mb-6 md:h-64 relative"></div>
                        <h3 class="mb-2 font-bold font-heading dark:text-slate-300 leading-tight sm:text-2xl text-xl"><a href="/markdown-elements-demo-post" class="transition duration-200 ease-in hover:text-primary dark:hover:text-blue-700 inline-block">Markdown elements demo post</a></h3>
                        <p class="text-muted dark:text-slate-400 text-lg">Sint sit cillum pariatur eiusmod nulla pariatur ipsum. Sit laborum anim qui mollit tempor pariatur nisi minim dolor.</p>
                    </article>
                    <article class="transition mb-6">
                        <div class="rounded bg-gray-400 dark:bg-slate-700 shadow-lg mb-6 md:h-64 relative"><a href="/useful-resources-to-create-websites"><img alt="Useful tools and resources to create a professional website" class="rounded bg-gray-400 dark:bg-slate-700 shadow-lg md:h-full w-full" loading="lazy" src="https://images.unsplash.com/photo-1637144113536-9c6e917be447?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1674&q=80" crossorigin="anonymous" decoding="async" height="225" referrerpolicy="no-referrer" sizes="(max-width: 900px) 400px, 900px" srcset="https://images.unsplash.com/photo-1637144113536-9c6e917be447?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80&h=225 400w, https://images.unsplash.com/photo-1637144113536-9c6e917be447?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=900&q=80&h=506 900w" style="object-fit:cover;object-position:center;max-width:100%;max-height:100%" width="400"></a></div>
                        <h3 class="mb-2 font-bold font-heading dark:text-slate-300 leading-tight sm:text-2xl text-xl"><a href="/useful-resources-to-create-websites" class="transition duration-200 ease-in hover:text-primary dark:hover:text-blue-700 inline-block">Useful tools and resources to create a professional website</a></h3>
                        <p class="text-muted dark:text-slate-400 text-lg">Explore vital tools and resources for a sleek website. From design to functionality, our guide elevates your online presence.</p>
                    </article>
                </div>
            </div>
        </section>

        {{--Contact--}}
        <section class="relative not-prose md:-mt-[76px]">
            <div class="absolute inset-0 pointer-events-none" aria-hidden="true"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6">
                <div class="pointer-events-none md:pt-[76px] pt-0"></div>
                <div class="py-12 md:pb-8 md:py-20 pb-8">
                    <div class="text-center max-w-5xl mx-auto">
                        <p class="font-bold dark:text-blue-200 text-base text-secondary tracking-wide uppercase">Contact</p>
                        <h1 class="font-bold font-heading leading-tighter tracking-tighter dark:text-gray-200 mb-4 md:text-6xl text-5xl">Let's Connect!</h1>
                        <div class="max-w-3xl mx-auto">
                            <div class="flex flex-col flex-nowrap gap-4 m-auto max-w-xs sm:flex-row sm:justify-center sm:max-w-md"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]" id="form">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default">
                <div class="text-center max-w-3xl mb-8 md:mb-12 md:mx-auto">
                    <h2 class="font-bold font-heading leading-tighter tracking-tighter md:text-4xl text-3xl text-heading">Drop us a message today!</h2>
                    <p class="text-muted mt-4 text-xl">For quicker answers, explore our FAQs section. You may find the solution you're looking for right there! If not, our support team is delighted to help you.</p>
                </div>
                <div class="flex flex-col backdrop-blur bg-white border dark:bg-slate-900 rounded-lg border-gray-200 dark:border-gray-700 lg:p-8 max-w-xl mx-auto p-4 shadow sm:p-6 w-full">
                    <form>
                        <div class="mb-6"><label class="block font-medium text-sm" for="name">Name</label> <input class="block bg-white border border-gray-200 dark:bg-slate-900 dark:border-gray-700 px-4 py-3 rounded-lg text-md w-full" id="name" name="name" type="text" autocomplete="on" placeholder=""></div>
                        <div class="mb-6"><label class="block font-medium text-sm" for="email">Email</label> <input class="block bg-white border border-gray-200 dark:bg-slate-900 dark:border-gray-700 px-4 py-3 rounded-lg text-md w-full" id="email" name="email" type="email" autocomplete="on" placeholder=""></div>
                        <div><label class="block font-medium text-sm" for="textarea">Message</label> <textarea class="block bg-white border border-gray-200 dark:bg-slate-900 dark:border-gray-700 px-4 py-3 rounded-lg text-md w-full" id="textarea" name="message" rows="4"></textarea></div>
                        <div class="flex items-start mt-3">
                            <div class="flex mt-0.5"><input class="block bg-white border border-gray-200 dark:bg-slate-900 dark:border-gray-700 px-4 py-3 rounded-lg text-md w-full cursor-pointer mt-1" id="disclaimer" name="disclaimer" type="checkbox"></div>
                            <div class="ml-3"><label class="dark:text-gray-400 text-sm text-gray-600 cursor-pointer select-none" for="disclaimer">By submitting this contact form, you acknowledge and agree to the collection of your personal information.</label></div>
                        </div>
                        <div class="grid mt-10"><button class="btn-primary" type="submit">Contact us</button></div>
                        <div class="text-center mt-3">
                            <p class="dark:text-gray-400 text-sm text-gray-600">Our support team typically responds within 24 business hours.</p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="relative not-prose scroll-mt-[72px]">
            <div class="absolute inset-0 pointer-events-none -z-[1]" aria-hidden="true">
                <div class="absolute inset-0"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 lg:py-20 md:px-6 md:py-16 py-12 text-default">
                <div class="text-center max-w-3xl mb-8 md:mb-12 md:mx-auto">
                    <h2 class="font-bold font-heading leading-tighter tracking-tighter md:text-4xl text-3xl text-heading">We are here to help!</h2>
                </div>
                <div class="gap-4 grid lg:grid-cols-3 md:gap-6 sm:gap-y-8 sm:grid-cols-2">
                    <div class="flex flex-col backdrop-blur bg-white border dark:bg-slate-900 rounded-lg border-[#ffffff29] dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <div class="font-bold text-xl">General support</div>
                        <p class="text-muted mt-2">Chat with us for inquiries related to account management, website navigation, payment issues, accessing purchased templates or general questions about the website's functionality.</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border dark:bg-slate-900 rounded-lg border-[#ffffff29] dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <div class="font-bold text-xl">Contact sales</div>
                        <p class="text-muted mt-2">Chat with us for questions about purchases, customization options, licensing for commercial use, inquiries about specific template, etc.</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border dark:bg-slate-900 rounded-lg border-[#ffffff29] dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <div class="font-bold text-xl">Technical support</div>
                        <p class="text-muted mt-2">Chat with us when facing issues like template installation, problems editing difficulties, compatibility issues with software or download errors, or other technical challenges related to using the templates.</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border dark:bg-slate-900 rounded-lg border-[#ffffff29] dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <svg class="mb-6 h-12 text-primary w-12" data-icon="tabler:headset" height="1em" viewBox="0 0 24 24" width="1em">
                            <symbol id="ai:tabler:headset">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M4 14v-3a8 8 0 1 1 16 0v3m-2 5c0 1.657-2.686 3-6 3"/>
                                    <path d="M4 14a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm11 0a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2z"/>
                                </g>
                            </symbol>
                            <use xlink:href="#ai:tabler:headset"></use>
                        </svg>
                        <div class="font-bold text-xl">Phone</div>
                        <p class="text-muted mt-2">+1 (234) 567-890</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border dark:bg-slate-900 rounded-lg border-[#ffffff29] dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <svg class="mb-6 h-12 text-primary w-12" data-icon="tabler:mail" height="1em" viewBox="0 0 24 24" width="1em">
                            <symbol id="ai:tabler:mail">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                    <path d="m3 7l9 6l9-6"/>
                                </g>
                            </symbol>
                            <use xlink:href="#ai:tabler:mail"></use>
                        </svg>
                        <div class="font-bold text-xl">Email</div>
                        <p class="text-muted mt-2">contact@support.com</p>
                    </div>
                    <div class="flex flex-col backdrop-blur bg-white border dark:bg-slate-900 rounded-lg border-[#ffffff29] dark:shadow-[0_4px_30px_rgba(0,0,0,0.1)] p-6 relative shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
                        <svg class="mb-6 h-12 text-primary w-12" data-icon="tabler:map-pin" height="1em" viewBox="0 0 24 24" width="1em">
                            <symbol id="ai:tabler:map-pin">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0-6 0"/>
                                    <path d="M17.657 16.657L13.414 20.9a2 2 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0"/>
                                </g>
                            </symbol>
                            <use xlink:href="#ai:tabler:map-pin"></use>
                        </svg>
                        <div class="font-bold text-xl">Location</div>
                        <p class="text-muted mt-2">1234 Lorem Ipsum St, 12345, Miami, EEUU</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- --}}
        <div id="home" class="relative bg-white  pt-[120px] pb-[110px] lg:pt-[150px]">
            <div class="container mx-auto">
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 lg:w-5/12">
                        <div class="hero-content">
                            <h1
                                class="mb-5 text-4xl font-bold !leading-[1.208] text-dark  sm:text-[42px] lg:text-[40px] xl:text-5xl">
                                Effortless Solutions<br>
                                for Online Payments.
                            </h1>
                            <p class="mb-8 max-w-[480px] text-base text-body-color ">
                                Effortless simplifies your online payment processes. Seamlessly manage transactions and empower
                                your business with our intuitive platform.
                            </p>
                            <ul class="flex flex-wrap items-center">
                                <li>
                                    <a href="https://spacema-dev.com/effortless-free-tailwind-css-website-template/"
                                       class="inline-flex items-center border justify-center px-6 py-3 text-base font-medium text-center text-white hover:text-primary rounded-md bg-primary hover:bg-transparent hover:border-primary lg:px-7">
                                        Get Started Now
                                    </a>
                                </li>
                                <li>
                                    <a href="https://spacema-dev.com/effortless-free-tailwind-css-website-template/"
                                       class="inline-flex items-center justify-center py-3 px-5 text-center text-base font-medium text-[#464646]  hover:text-primary">
                           <span class="mr-2">
                              <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <circle cx="12" cy="12.6152" r="12" fill="#3758F9"></circle>
                                 <rect x="7.99893" y="14.979" width="8.18182" height="1.63636" fill="white"></rect>
                                 <rect x="11.2717" y="7.61523" width="1.63636" height="4.09091" fill="white"></rect>
                                 <path d="M12.0898 14.1606L14.9241 11.0925H9.25557L12.0898 14.1606Z" fill="white">
                                 </path>
                              </svg>
                           </span>
                                        Download App
                                    </a>
                                </li>
                            </ul>
                            <div class="clients pt-16">
                                <h6 class="flex items-center mb-6 text-md font-normal text-body-color ">
                                    Some Of Our Clients
                                    <span class="inline-block w-8 h-px ml-3 bg-body-color"></span>
                                </h6>
                                <div class="flex items-center">
                                    <div class="block py-3 mr-4">
                                        <img src="./assets/images/client1.webp" alt="oracle">
                                    </div>
                                    <div class="block py-3 mr-4">
                                        <img src="./assets/images/client2.webp" alt="intel">
                                    </div>
                                    <div class="block py-3">
                                        <img src="./assets/images/client3.webp" alt="logitech">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden px-4 lg:block lg:w-1/12"></div>
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="lg:ml-auto lg:text-right">
                            <div class="relative z-10 inline-block pt-11 lg:pt-0">
                                <img src="./assets/images/hero-image-01.png" alt="hero" class="max-w-full lg:ml-auto rounded-[10px] rounded-tl-[150px]">
                                <span class="absolute -left-8 -bottom-8 z-[-1]">
                        <svg width="93" height="93" viewBox="0 0 93 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <circle cx="2.5" cy="2.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="2.5" cy="24.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="2.5" cy="46.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="2.5" cy="68.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="2.5" cy="90.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="24.5" cy="2.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="24.5" cy="24.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="24.5" cy="46.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="24.5" cy="68.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="24.5" cy="90.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="46.5" cy="2.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="46.5" cy="24.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="46.5" cy="46.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="46.5" cy="68.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="46.5" cy="90.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="68.5" cy="2.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="68.5" cy="24.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="68.5" cy="46.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="68.5" cy="68.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="68.5" cy="90.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="90.5" cy="2.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="90.5" cy="24.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="90.5" cy="46.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="90.5" cy="68.5" r="2.5" fill="#3056D3"></circle>
                           <circle cx="90.5" cy="90.5" r="2.5" fill="#3056D3"></circle>
                        </svg>
                     </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== Hero Section End -->
        <!-- ====== Services Section Start -->
        <section id="features" class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px] ">
            <div class="container mx-auto">
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="mx-auto mb-12 max-w-[510px] text-center lg:mb-20">
                  <span class="text-primary mb-2 block text-lg font-semibold">
                     Explore Our Offerings
                  </span>
                            <h2 class="text-dark  mb-3 text-3xl leading-[1.2] font-bold sm:text-4xl md:text-[40px]">
                                Discover What Sets Us Apart
                            </h2>
                            <p class="text-body-color text-base ">
                                Uncover the unparalleled offerings of Effortless. Our innovative solutions redefine online
                                experiences, setting new standards in simplicity and efficiency.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="mb-9 rounded-[20px] bg-white -2 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10">
                            <div class="bg-primary mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.0375 1.2374C11.8125 -0.393851 2.92503 5.7374 1.29378 14.9624C0.450029 19.4061 1.46253 23.9624 4.05003 27.6749C6.63753 31.4436 10.5188 33.9186 14.9625 34.7624C15.975 34.9311 16.9875 35.0436 18 35.0436C26.0438 35.0436 33.2438 29.2499 34.7625 21.0374C36.3938 11.8124 30.2625 2.9249 21.0375 1.2374ZM32.2313 20.5874C32.175 21.0374 32.0625 21.4874 31.95 21.8811L19.2375 17.0999V3.5999C19.6875 3.65615 20.1375 3.7124 20.5313 3.76865C28.4063 5.1749 33.6375 12.7124 32.2313 20.5874ZM16.7063 3.5999V16.7624H3.60003C3.65628 16.3124 3.71253 15.8624 3.76878 15.4124C4.95003 8.83115 10.4063 4.10615 16.7063 3.5999ZM15.4125 32.2311C11.5875 31.5561 8.32503 29.4186 6.13128 26.2124C4.66878 24.1311 3.82503 21.7124 3.60003 19.2374H17.775L31.05 24.2436C28.2938 29.9811 21.9375 33.4686 15.4125 32.2311Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <h4 class="text-dark  mb-4 text-2xl font-semibold">
                                Innovative Design Solutions
                            </h4>
                            <p class="text-body-color ">
                                We delight in collaborating with discerning clients, individuals who value quality, service,
                                integrity, and aesthetics.
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="mb-9 rounded-[20px] bg-white -2 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10">
                            <div class="bg-primary mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M9.89195 14.625C10.9995 10.1252 13.769 7.875 18.1996 7.875C24.8458 7.875 25.6765 12.9375 28.9996 13.7812C31.2151 14.3439 33.1535 13.5002 34.815 11.25C33.7075 15.7498 30.9379 18 26.5073 18C19.8611 18 19.0304 12.9375 15.7073 12.0938C13.4918 11.5311 11.5535 12.3748 9.89195 14.625ZM1.58423 24.75C2.69174 20.2502 5.46132 18 9.89195 18C16.5381 18 17.3689 23.0625 20.692 23.9062C22.9075 24.4689 24.8458 23.6252 26.5073 21.375C25.3998 25.8748 22.6302 28.125 18.1996 28.125C11.5535 28.125 10.7227 23.0625 7.39963 22.2188C5.18405 21.6561 3.24576 22.4998 1.58423 24.75Z"
                                          fill="white"></path>
                                </svg>
                            </div>
                            <h4 class="text-dark  mb-4 text-2xl font-semibold">
                                Powered by Effortless CSS
                            </h4>
                            <p class="text-body-color ">
                                We are passionate about collaborating with discerning clients who value quality, service,
                                integrity, and aesthetics.
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="mb-9 rounded-[20px] bg-white -2 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10">
                            <div class="bg-primary mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.2063 1.9126H5.0625C3.15 1.9126 1.575 3.4876 1.575 5.4001V12.5438C1.575 14.4563 3.15 16.0313 5.0625 16.0313H12.2063C14.1188 16.0313 15.6938 14.4563 15.6938 12.5438V5.45635C15.75 3.4876 14.175 1.9126 12.2063 1.9126ZM13.2188 12.6001C13.2188 13.1626 12.7688 13.6126 12.2063 13.6126H5.0625C4.5 13.6126 4.05 13.1626 4.05 12.6001V5.45635C4.05 4.89385 4.5 4.44385 5.0625 4.44385H12.2063C12.7688 4.44385 13.2188 4.89385 13.2188 5.45635V12.6001Z"
                                        fill="white"></path>
                                    <path
                                        d="M30.9375 1.9126H23.7937C21.8812 1.9126 20.3062 3.4876 20.3062 5.4001V12.5438C20.3062 14.4563 21.8812 16.0313 23.7937 16.0313H30.9375C32.85 16.0313 34.425 14.4563 34.425 12.5438V5.45635C34.425 3.4876 32.85 1.9126 30.9375 1.9126ZM31.95 12.6001C31.95 13.1626 31.5 13.6126 30.9375 13.6126H23.7937C23.2312 13.6126 22.7812 13.1626 22.7812 12.6001V5.45635C22.7812 4.89385 23.2312 4.44385 23.7937 4.44385H30.9375C31.5 4.44385 31.95 4.89385 31.95 5.45635V12.6001Z"
                                        fill="white"></path>
                                    <path
                                        d="M12.2063 19.8564H5.0625C3.15 19.8564 1.575 21.4314 1.575 23.3439V30.4877C1.575 32.4002 3.15 33.9752 5.0625 33.9752H12.2063C14.1188 33.9752 15.6938 32.4002 15.6938 30.4877V23.4002C15.75 21.4314 14.175 19.8564 12.2063 19.8564ZM13.2188 30.5439C13.2188 31.1064 12.7688 31.5564 12.2063 31.5564H5.0625C4.5 31.5564 4.05 31.1064 4.05 30.5439V23.4002C4.05 22.8377 4.5 22.3877 5.0625 22.3877H12.2063C12.7688 22.3877 13.2188 22.8377 13.2188 23.4002V30.5439Z"
                                        fill="white"></path>
                                    <path
                                        d="M30.9375 19.8564H23.7937C21.8812 19.8564 20.3062 21.4314 20.3062 23.3439V30.4877C20.3062 32.4002 21.8812 33.9752 23.7937 33.9752H30.9375C32.85 33.9752 34.425 32.4002 34.425 30.4877V23.4002C34.425 21.4314 32.85 19.8564 30.9375 19.8564ZM31.95 30.5439C31.95 31.1064 31.5 31.5564 30.9375 31.5564H23.7937C23.2312 31.5564 22.7812 31.1064 22.7812 30.5439V23.4002C22.7812 22.8377 23.2312 22.3877 23.7937 22.3877H30.9375C31.5 22.3877 31.95 22.8377 31.95 23.4002V30.5439Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <h4 class="text-dark  mb-4 text-2xl font-semibold">
                                Versatile Component Library
                            </h4>
                            <p class="text-body-color ">
                                We take pride in collaborating with discerning clients who prioritize quality, service, integrity,
                                and aesthetics.
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="mb-9 rounded-[20px] bg-white -2 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10">
                            <div class="bg-primary mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M30.2625 10.6312C27.1688 7.36875 22.8375 5.34375 18 5.34375C8.60626 5.34375 1.01251 12.9937 1.01251 22.3875C1.01251 25.0312 1.63126 27.6187 2.75626 29.925C2.92501 30.2625 3.20626 30.4875 3.54376 30.6C3.65626 30.6 3.71251 30.6562 3.82501 30.6562C3.82501 30.6562 3.82501 30.6562 3.88126 30.6562C3.88126 30.6562 3.88126 30.6562 3.93751 30.6562C3.99376 30.6562 4.05001 30.6562 4.10626 30.6562C4.21876 30.6562 4.38751 30.6 4.50001 30.5437L6.80626 29.4187C7.42501 29.1375 7.70626 28.35 7.36876 27.7312C7.03126 27.1125 6.30001 26.8312 5.68126 27.1687L4.55626 27.7312C3.88126 26.1 3.60001 24.3562 3.54376 22.5562H5.90626C6.58126 22.5562 7.20001 21.9937 7.20001 21.2625C7.20001 20.5312 6.63751 19.9687 5.90626 19.9687H3.71251C4.10626 17.4937 5.17501 15.2437 6.69376 13.3875L8.71876 15.4125C8.94376 15.6375 9.28126 15.8062 9.61876 15.8062C9.95626 15.8062 10.2938 15.6937 10.5188 15.4125C11.025 14.9062 11.025 14.1187 10.5188 13.6125L8.43751 11.5312C10.6875 9.5625 13.5563 8.2125 16.7625 7.9875V11.4187C16.7625 12.0937 17.325 12.7125 18.0563 12.7125C18.7313 12.7125 19.35 12.15 19.35 11.4187V7.9875C22.5 8.26875 25.425 9.5625 27.675 11.5312L26.1 13.1062C25.5938 13.6125 25.5938 14.4 26.1 14.9062C26.325 15.1312 26.6625 15.3 27 15.3C27.3375 15.3 27.675 15.1875 27.9 14.9062L29.4188 13.3875C30.9375 15.2437 31.95 17.4937 32.4 19.9687H30.2063C29.5313 19.9687 28.9125 20.5312 28.9125 21.2625C28.9125 21.9937 29.475 22.5562 30.2063 22.5562H32.5688C32.5688 24.3562 32.2313 26.1 31.5563 27.7875L30.4313 27.225C29.8125 26.8875 29.025 27.1687 28.7438 27.7875C28.4625 28.4062 28.6875 29.1937 29.3063 29.475L31.6125 30.6C31.7813 30.7125 32.0063 30.7125 32.175 30.7125C32.175 30.7125 32.175 30.7125 32.2313 30.7125C32.2313 30.7125 32.2313 30.7125 32.2875 30.7125C32.7375 30.7125 33.1875 30.4312 33.4125 30.0375C34.5938 27.7312 35.1563 25.0875 35.1563 22.5C35.0438 17.8312 33.1875 13.6687 30.2625 10.6312Z"
                                        fill="white"></path>
                                    <path
                                        d="M21.4313 19.3499L17.6625 22.1624C16.9875 22.2749 16.3688 22.6687 15.975 23.2312C15.9188 23.3437 15.8625 23.3999 15.8063 23.5124L15.6938 23.6249H15.75C15.1313 24.8062 15.4688 26.2687 16.5938 27.1124C17.7188 27.8999 19.2375 27.7874 20.1375 26.8312H20.1938L20.25 26.7187C20.3063 26.6624 20.4188 26.5499 20.475 26.4374C20.925 25.8749 21.0375 25.1437 20.9813 24.4687L22.4438 19.9687C22.6125 19.4624 21.9375 19.0124 21.4313 19.3499Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <h4 class="text-dark  mb-4 text-2xl font-semibold">
                                Lightning-Fast Performance
                            </h4>
                            <p class="text-body-color ">
                                We take pleasure in collaborating with discerning clients who prioritize quality, service,
                                integrity, and aesthetics.
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="mb-9 rounded-[20px] bg-white -2 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10">
                            <div class="bg-primary mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M30.0937 21.8251L29.6437 21.6001L30.2062 21.2626C31.3312 20.5876 31.95 19.4063 31.95 18.0563C31.95 16.7626 31.2187 15.5813 30.0937 14.9063L28.9125 14.2313L30.2062 13.4438C31.3312 12.7688 31.95 11.5876 31.95 10.2376C31.95 8.94385 31.2187 7.7626 30.0937 7.14385L19.9125 1.4626C18.7875 0.843848 17.3812 0.843848 16.3125 1.4626L5.84999 7.5376C4.72499 8.2126 4.04999 9.39385 4.04999 10.6876C4.04999 11.9813 4.72499 13.2188 5.84999 13.8376L7.08749 14.5688L5.84999 15.3001C4.72499 15.9751 4.04999 17.1563 4.04999 18.4501C4.04999 19.7438 4.72499 20.9813 5.84999 21.6001L6.35624 21.8813L5.84999 22.1626C4.72499 22.8376 3.99374 24.0188 3.99374 25.3126C3.99374 26.6626 4.66874 27.8438 5.79374 28.4626L16.1437 34.4813C16.7062 34.8188 17.325 34.9876 18 34.9876C18.675 34.9876 19.35 34.8188 19.9125 34.4251L30.2625 28.1251C31.3875 27.4501 32.0062 26.2688 32.0062 24.9188C31.95 23.6251 31.275 22.4438 30.0937 21.8251ZM6.52499 10.6876C6.52499 10.5188 6.58124 10.0126 7.08749 9.73135L17.55 3.65635C17.8875 3.43135 18.3375 3.43135 18.675 3.65635L28.9125 9.3376C29.4187 9.61885 29.475 10.1251 29.475 10.2938C29.475 10.4626 29.4187 10.9688 28.9125 11.3063L18.6187 17.6626C18.2812 17.8876 17.8312 17.8876 17.4375 17.6626L7.08749 11.6438C6.58124 11.3626 6.52499 10.8563 6.52499 10.6876ZM7.08749 17.4938L9.56249 16.0313L16.1437 19.8563C16.7062 20.1938 17.325 20.3626 18 20.3626C18.675 20.3626 19.35 20.1938 19.9125 19.8001L26.4375 15.8063L28.8562 17.1563C29.3625 17.4376 29.4187 17.9438 29.4187 18.1126C29.4187 18.2813 29.3625 18.7876 28.8562 19.1251L18.6187 25.4251C18.2812 25.6501 17.8312 25.6501 17.4375 25.4251L7.08749 19.4063C6.58124 19.1251 6.52499 18.6188 6.52499 18.4501C6.52499 18.2813 6.58124 17.7751 7.08749 17.4938ZM28.9125 25.9876L18.6187 32.3438C18.2812 32.5688 17.8312 32.5688 17.4375 32.3438L7.08749 26.3251C6.58124 26.0438 6.52499 25.5376 6.52499 25.3688C6.52499 25.2001 6.58124 24.6938 7.08749 24.4126L8.83124 23.4001L16.2 27.6751C16.7625 28.0126 17.3812 28.1813 18.0562 28.1813C18.7312 28.1813 19.4062 28.0126 19.9687 27.6188L27.225 23.1751L28.9125 24.0751C29.4187 24.3563 29.475 24.8626 29.475 25.0313C29.475 25.2001 29.4187 25.7063 28.9125 25.9876Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <h4 class="text-dark  mb-4 text-2xl font-semibold">
                                Tailored to Your Needs
                            </h4>
                            <p class="text-body-color ">
                                We enjoy collaborating with discerning clients who value quality, service, integrity, and
                                aesthetics.
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="mb-9 rounded-[20px] bg-white -2 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10">
                            <div class="bg-primary mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.725 16.3124C4.89375 16.3124 5.11875 16.2562 5.2875 16.1999L11.5312 14.0062C12.2062 13.7812 12.5437 13.0499 12.3187 12.3749C12.0937 11.6999 11.3625 11.3624 10.6875 11.5874L6.80625 12.9374C8.6625 8.0999 13.3875 4.8374 18.7875 4.8374C24.6938 4.8374 29.8125 8.7749 31.275 14.3999C31.4437 15.0749 32.1187 15.4687 32.7937 15.2999C33.4687 15.1312 33.8625 14.4562 33.6938 13.7812C31.95 7.03115 25.8187 2.30615 18.7312 2.30615C12.4312 2.30615 6.8625 6.01865 4.55625 11.5874L3.375 8.2124C3.15 7.5374 2.41875 7.1999 1.74375 7.4249C1.06875 7.6499 0.73125 8.38115 0.95625 9.05615L3.09375 15.1874C3.43125 15.9187 4.05 16.3124 4.725 16.3124Z"
                                        fill="white"></path>
                                    <path
                                        d="M34.9312 27.9562L32.625 21.9375C32.4562 21.5437 32.175 21.2062 31.7812 21.0375C31.3875 20.8687 30.9375 20.8687 30.5437 21.0375L24.3562 23.3999C23.6812 23.6249 23.4 24.3562 23.625 25.0312C23.85 25.7062 24.5813 25.9875 25.2563 25.7625L29.1375 24.3C26.8875 28.4062 22.5 31.1062 17.6062 31.1062C12.0375 31.1062 7.14375 27.6187 5.4 22.4437C5.175 21.7687 4.44375 21.4312 3.825 21.6562C3.15 21.8812 2.8125 22.6124 3.0375 23.2312C5.11875 29.4187 10.9687 33.5812 17.6062 33.5812C23.4 33.5812 28.6312 30.375 31.275 25.425L32.5688 28.8562C32.7375 29.3625 33.2437 29.6437 33.75 29.6437C33.9187 29.6437 34.0312 29.6437 34.2 29.5312C34.875 29.3625 35.1562 28.6312 34.9312 27.9562Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <h4 class="text-dark  mb-4 text-2xl font-semibold">
                                Stay Ahead with Continuous Improvements
                            </h4>
                            <p class="text-body-color ">
                                We take pride in collaborating with discerning clients who prioritize quality, service, integrity,
                                and aesthetics.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== Services Section End -->
        <!-- ====== Testimonials Section Start -->
        <section id="testimonials" class="pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
            <div class="container mx-auto">

                <div class="relative flex justify-center">
                    <div class=" swiper mySwiper">
                        <div class="swiper-wrapper ">
                            <div class="swiper-slide">
                                <div class="w-full md:flex">
                                    <div class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] xl:max-w-[310px] 2xl:mr-16">
                                        <img src="./assets/images/image-01.jpg" alt="image" class="w-full rounded-xl">
                                        <span class="absolute -top-6 -right-6 z-[-1] hidden sm:block">
                                 <svg width="77" height="77" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.66343" cy="74.5221" r="1.66343" transform="rotate(-90 1.66343 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="30.9401" r="1.66343" transform="rotate(-90 1.66343 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="74.5221" r="1.66343" transform="rotate(-90 16.3016 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="30.9401" r="1.66343" transform="rotate(-90 16.3016 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="74.5221" r="1.66343" transform="rotate(-90 30.9398 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="30.9401" r="1.66343" transform="rotate(-90 30.9398 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="74.5221" r="1.66343" transform="rotate(-90 45.578 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="30.9401" r="1.66343" transform="rotate(-90 45.578 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="74.5216" r="1.66343" transform="rotate(-90 60.2162 74.5216)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="74.5216" r="1.66343" transform="rotate(-90 74.6634 74.5216)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="30.9398" r="1.66343" transform="rotate(-90 60.2162 30.9398)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="30.9398" r="1.66343" transform="rotate(-90 74.6634 30.9398)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="59.8839" r="1.66343" transform="rotate(-90 1.66343 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="16.3017" r="1.66343" transform="rotate(-90 1.66343 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="59.8839" r="1.66343" transform="rotate(-90 16.3016 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="16.3017" r="1.66343" transform="rotate(-90 16.3016 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="59.8839" r="1.66343" transform="rotate(-90 30.9398 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="16.3017" r="1.66343" transform="rotate(-90 30.9398 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="59.8839" r="1.66343" transform="rotate(-90 45.578 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="16.3017" r="1.66343" transform="rotate(-90 45.578 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="59.8839" r="1.66343" transform="rotate(-90 60.2162 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="59.8839" r="1.66343" transform="rotate(-90 74.6634 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="16.3017" r="1.66343" transform="rotate(-90 60.2162 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="16.3017" r="1.66343" transform="rotate(-90 74.6634 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="45.2455" r="1.66343" transform="rotate(-90 1.66343 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="1.66347" r="1.66343" transform="rotate(-90 1.66343 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="45.2455" r="1.66343" transform="rotate(-90 16.3016 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="1.66347" r="1.66343" transform="rotate(-90 16.3016 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="45.2455" r="1.66343" transform="rotate(-90 30.9398 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="1.66347" r="1.66343" transform="rotate(-90 30.9398 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="45.2455" r="1.66343" transform="rotate(-90 45.578 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="1.66347" r="1.66343" transform="rotate(-90 45.578 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="45.2457" r="1.66343" transform="rotate(-90 60.2162 45.2457)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="45.2457" r="1.66343" transform="rotate(-90 74.6634 45.2457)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="1.66371" r="1.66343" transform="rotate(-90 60.2162 1.66371)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="1.66371" r="1.66343" transform="rotate(-90 74.6634 1.66371)" fill="#3758F9"></circle>
                                 </svg>
                              </span>
                                        <span class="absolute -bottom-6 -right-6 z-[-1]">
                                 <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z" stroke="#13C296" stroke-width="6"></path>
                                 </svg>
                              </span>
                                    </div>
                                    <div class="w-full">
                                        <div>
                                            <div class="mb-8 mt-5">
                                                <img src="./assets/images/logo-blue.png" alt="image">
                                            </div>
                                            <p class="text-body-color mb-11 text-base leading-[1.81] font-normal italic sm:text-[22px]">
                                                Effortless made managing our files a breeze – with powerful features that set it apart from the rest. It's an indispensable tool for our team.
                                            </p>
                                            <h4 class="text-dark dark:text-white mb-2 leading-[27px] text-[22px] font-semibold">
                                                Emily Watson
                                            </h4>
                                            <p class="text-body-color text-base">
                                                Head of Operations
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="w-full md:flex">
                                    <div class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] xl:max-w-[310px] 2xl:mr-16">
                                        <img src="./assets/images/image-01.jpg" alt="image" class="w-full rounded-xl">
                                        <span class="absolute -top-6 -right-6 z-[-1] hidden sm:block">
                                 <svg width="77" height="77" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.66343" cy="74.5221" r="1.66343" transform="rotate(-90 1.66343 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="30.9401" r="1.66343" transform="rotate(-90 1.66343 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="74.5221" r="1.66343" transform="rotate(-90 16.3016 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="30.9401" r="1.66343" transform="rotate(-90 16.3016 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="74.5221" r="1.66343" transform="rotate(-90 30.9398 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="30.9401" r="1.66343" transform="rotate(-90 30.9398 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="74.5221" r="1.66343" transform="rotate(-90 45.578 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="30.9401" r="1.66343" transform="rotate(-90 45.578 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="74.5216" r="1.66343" transform="rotate(-90 60.2162 74.5216)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="74.5216" r="1.66343" transform="rotate(-90 74.6634 74.5216)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="30.9398" r="1.66343" transform="rotate(-90 60.2162 30.9398)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="30.9398" r="1.66343" transform="rotate(-90 74.6634 30.9398)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="59.8839" r="1.66343" transform="rotate(-90 1.66343 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="16.3017" r="1.66343" transform="rotate(-90 1.66343 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="59.8839" r="1.66343" transform="rotate(-90 16.3016 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="16.3017" r="1.66343" transform="rotate(-90 16.3016 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="59.8839" r="1.66343" transform="rotate(-90 30.9398 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="16.3017" r="1.66343" transform="rotate(-90 30.9398 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="59.8839" r="1.66343" transform="rotate(-90 45.578 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="16.3017" r="1.66343" transform="rotate(-90 45.578 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="59.8839" r="1.66343" transform="rotate(-90 60.2162 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="59.8839" r="1.66343" transform="rotate(-90 74.6634 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="16.3017" r="1.66343" transform="rotate(-90 60.2162 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="16.3017" r="1.66343" transform="rotate(-90 74.6634 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="45.2455" r="1.66343" transform="rotate(-90 1.66343 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="1.66347" r="1.66343" transform="rotate(-90 1.66343 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="45.2455" r="1.66343" transform="rotate(-90 16.3016 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="1.66347" r="1.66343" transform="rotate(-90 16.3016 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="45.2455" r="1.66343" transform="rotate(-90 30.9398 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="1.66347" r="1.66343" transform="rotate(-90 30.9398 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="45.2455" r="1.66343" transform="rotate(-90 45.578 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="1.66347" r="1.66343" transform="rotate(-90 45.578 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="45.2457" r="1.66343" transform="rotate(-90 60.2162 45.2457)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="45.2457" r="1.66343" transform="rotate(-90 74.6634 45.2457)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="1.66371" r="1.66343" transform="rotate(-90 60.2162 1.66371)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="1.66371" r="1.66343" transform="rotate(-90 74.6634 1.66371)" fill="#3758F9"></circle>
                                 </svg>
                              </span>
                                        <span class="absolute -bottom-6 -right-6 z-[-1]">
                                 <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z" stroke="#13C296" stroke-width="6"></path>
                                 </svg>
                              </span>
                                    </div>
                                    <div class="w-full">
                                        <div>
                                            <div class="mb-8 mt-5">
                                                <img src="./assets/images/logo-blue.png" alt="image">
                                            </div>
                                            <p class="text-body-color mb-11 text-base leading-[1.81] font-normal italic sm:text-[22px]">
                                                Effortless has revolutionized our file storage experience. Its intuitive interface and powerful features make managing files a breeze. Whether you're a small startup or a large corporation, Effortless is the solution you've been looking for.
                                            </p>
                                            <h4 class="text-dark mb-2 leading-[27px] text-[22px] font-semibold">
                                                Sarah Johnson
                                            </h4>
                                            <p class="text-body-color text-base">
                                                Founder &amp; CEO
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="w-full md:flex">
                                    <div class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] xl:max-w-[310px] 2xl:mr-16">
                                        <img src="./assets/images/image-01.jpg" alt="image" class="w-full rounded-xl">
                                        <span class="absolute -top-6 -right-6 z-[-1] hidden sm:block">
                                 <svg width="77" height="77" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.66343" cy="74.5221" r="1.66343" transform="rotate(-90 1.66343 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="30.9401" r="1.66343" transform="rotate(-90 1.66343 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="74.5221" r="1.66343" transform="rotate(-90 16.3016 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="30.9401" r="1.66343" transform="rotate(-90 16.3016 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="74.5221" r="1.66343" transform="rotate(-90 30.9398 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="30.9401" r="1.66343" transform="rotate(-90 30.9398 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="74.5221" r="1.66343" transform="rotate(-90 45.578 74.5221)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="30.9401" r="1.66343" transform="rotate(-90 45.578 30.9401)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="74.5216" r="1.66343" transform="rotate(-90 60.2162 74.5216)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="74.5216" r="1.66343" transform="rotate(-90 74.6634 74.5216)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="30.9398" r="1.66343" transform="rotate(-90 60.2162 30.9398)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="30.9398" r="1.66343" transform="rotate(-90 74.6634 30.9398)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="59.8839" r="1.66343" transform="rotate(-90 1.66343 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="16.3017" r="1.66343" transform="rotate(-90 1.66343 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="59.8839" r="1.66343" transform="rotate(-90 16.3016 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="16.3017" r="1.66343" transform="rotate(-90 16.3016 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="59.8839" r="1.66343" transform="rotate(-90 30.9398 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="16.3017" r="1.66343" transform="rotate(-90 30.9398 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="59.8839" r="1.66343" transform="rotate(-90 45.578 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="16.3017" r="1.66343" transform="rotate(-90 45.578 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="59.8839" r="1.66343" transform="rotate(-90 60.2162 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="59.8839" r="1.66343" transform="rotate(-90 74.6634 59.8839)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="16.3017" r="1.66343" transform="rotate(-90 60.2162 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="16.3017" r="1.66343" transform="rotate(-90 74.6634 16.3017)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="45.2455" r="1.66343" transform="rotate(-90 1.66343 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="1.66343" cy="1.66347" r="1.66343" transform="rotate(-90 1.66343 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="45.2455" r="1.66343" transform="rotate(-90 16.3016 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="16.3016" cy="1.66347" r="1.66343" transform="rotate(-90 16.3016 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="45.2455" r="1.66343" transform="rotate(-90 30.9398 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="30.9398" cy="1.66347" r="1.66343" transform="rotate(-90 30.9398 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="45.2455" r="1.66343" transform="rotate(-90 45.578 45.2455)" fill="#3758F9"></circle>
                                    <circle cx="45.578" cy="1.66347" r="1.66343" transform="rotate(-90 45.578 1.66347)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="45.2457" r="1.66343" transform="rotate(-90 60.2162 45.2457)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="45.2457" r="1.66343" transform="rotate(-90 74.6634 45.2457)" fill="#3758F9"></circle>
                                    <circle cx="60.2162" cy="1.66371" r="1.66343" transform="rotate(-90 60.2162 1.66371)" fill="#3758F9"></circle>
                                    <circle cx="74.6634" cy="1.66371" r="1.66343" transform="rotate(-90 74.6634 1.66371)" fill="#3758F9"></circle>
                                 </svg>
                              </span>
                                        <span class="absolute -bottom-6 -right-6 z-[-1]">
                                 <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z" stroke="#13C296" stroke-width="6"></path>
                                 </svg>
                              </span>
                                    </div>
                                    <div class="w-full">
                                        <div>
                                            <div class="mb-8 mt-5">
                                                <img src="./assets/images/logo-blue.png" alt="image">
                                            </div>
                                            <p class="text-body-color mb-11 text-base leading-[1.81] font-normal italic sm:text-[22px]">
                                                Effortless has truly simplified our file storage process, offering unparalleled features that are unmatched elsewhere. It's the go-to solution for anyone looking to streamline their file management tasks effortlessly.
                                            </p>
                                            <h4 class="text-dark mb-2 leading-[27px] text-[22px] font-semibold">
                                                Larry Diamond
                                            </h4>
                                            <p class="text-body-color text-base">
                                                Chief Executive Officer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-5 justify-center">
                            <button class="swiper-btn-prev text-dark border border-stroke flex h-[60px] w-[60px] mr-4 items-center justify-center rounded-full bg-white transition-all hover:bg-primary hover:border-primary">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                    <path d="M17.5 9.5H4.15625L9.46875 4.09375C9.75 3.8125 9.75 3.375 9.46875 3.09375C9.1875 2.8125 8.75 2.8125 8.46875 3.09375L2 9.65625C1.71875 9.9375 1.71875 10.375 2 10.6562L8.46875 17.2188C8.59375 17.3438 8.78125 17.4375 8.96875 17.4375C9.15625 17.4375 9.3125 17.375 9.46875 17.25C9.75 16.9687 9.75 16.5313 9.46875 16.25L4.1875 10.9062H17.5C17.875 10.9062 18.1875 10.5937 18.1875 10.2187C18.1875 9.8125 17.875 9.5 17.5 9.5Z" fill="" class=""></path>
                                </svg>
                            </button>
                            <button class="swiper-btn-next text-dark border border-stroke flex h-[60px] w-[60px] items-center justify-center rounded-full bg-white transition-all hover:bg-primary hover:border-primary">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                    <path d="M18 9.6875L11.5312 3.125C11.25 2.84375 10.8125 2.84375 10.5312 3.125C10.25 3.40625 10.25 3.84375 10.5312 4.125L15.7812 9.46875H2.5C2.125 9.46875 1.8125 9.78125 1.8125 10.1562C1.8125 10.5312 2.125 10.875 2.5 10.875H15.8437L10.5312 16.2813C10.25 16.5625 10.25 17 10.5312 17.2813C10.6562 17.4063 10.8437 17.4688 11.0312 17.4688C11.2187 17.4688 11.4062 17.4062 11.5312 17.25L18 10.6875C18.2812 10.4062 18.2812 9.96875 18 9.6875Z" fill=""></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== Testimonials Section End -->
        <!-- ====== Call To Action Section Start -->
        <section id="getstarted" class="bg-white ">
            <div class="">
                <div class="relative z-10 overflow-hidden rounded bg-primary py-12 px-8 md:p-[70px]">
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 lg:w-1/2">
                  <span class="block mb-4 text-base font-medium text-white">
                     Discover Your Next Dream App
                  </span>
                            <h2 class="mb-6 text-3xl font-bold leading-tight text-white sm:mb-8 sm:text-[40px]/[48px] lg:mb-0">
                                <span class="xs:block">Get started with</span>
                                <span>our free trial</span>
                            </h2>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <div class="flex flex-wrap lg:justify-end">
                                <a href="javascript:void(0)"
                                   class="inline-flex py-3 my-1 mr-4 text-base font-medium transition bg-white rounded-md text-primary border border-white hover:bg-transparent hover:text-white hover:border-white  px-7">
                                    Upgrade to Pro Version
                                </a>
                                <a href="javascript:void(0)" class="inline-flex py-3 my-1 text-base font-medium text-white border border-white transition rounded-md bg-primary hover:bg-white hover:text-primary px-7 hover:bg-opacity-90">
                                    Start Your Free Trial
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
               <span class="absolute top-0 left-0 z-[-1]">
                  <svg width="189" height="162" viewBox="0 0 189 162" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <ellipse cx="16" cy="-16.5" rx="173" ry="178.5" transform="rotate(180 16 -16.5)"
                              fill="url(#paint0_linear)"></ellipse>
                     <defs>
                        <linearGradient id="paint0_linear" x1="-157" y1="-107.754" x2="98.5011" y2="-106.425"
                                        gradientUnits="userSpaceOnUse">
                           <stop stop-color="white" stop-opacity="0.07"></stop>
                           <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                        </linearGradient>
                     </defs>
                  </svg>
               </span>
                        <span class="absolute bottom-0 right-0 z-[-1]">
                  <svg width="191" height="208" viewBox="0 0 191 208" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <ellipse cx="173" cy="178.5" rx="173" ry="178.5" fill="url(#paint0_linear)"></ellipse>
                     <defs>
                        <linearGradient id="paint0_linear" x1="-3.27832e-05" y1="87.2457" x2="255.501" y2="88.5747"
                                        gradientUnits="userSpaceOnUse">
                           <stop stop-color="white" stop-opacity="0.07"></stop>
                           <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                        </linearGradient>
                     </defs>
                  </svg>
               </span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white dark:bg-gray-800">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-5">
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Careers</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Brand Center</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Discord Server</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Twitter</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Facebook</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Licensing</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Terms</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Careers</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Brand Center</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Download</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">iOS</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Android</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Windows</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">MacOS</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
            <div class="text-center">
                <a href="#" class="flex items-center justify-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img src="./images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" />
                    Landwind
                </a>
                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2021-2022 Landwind™. All Rights Reserved. Built with <a href="https://flowbite.com" class="text-purple-600 hover:underline dark:text-purple-500">Flowbite</a> and <a href="https://tailwindcss.com" class="text-purple-600 hover:underline dark:text-purple-500">Tailwind CSS</a>.
                </span>
                <ul class="flex justify-center mt-5 space-x-5">
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    {{--Footer--}}
    <footer class="relative dark:border-slate-800 border-gray-200 border-t not-prose">
        <div class="absolute inset-0 pointer-events-none dark:bg-dark" aria-hidden="true"></div>
        <div class="mx-auto sm:px-6 px-4 dark:text-slate-300 max-w-7xl relative">
            <div class="grid gap-4 gap-y-8 grid-cols-12 md:py-12 py-8 sm:gap-8">
                <div class="col-span-12 lg:col-span-4">
                    <div class="mb-2"><a href="/" class="inline-block font-bold text-xl">AstroWind</a></div>
                    <div class="text-muted text-sm gap-1 flex"><a href="/terms" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Terms</a> · <a href="/privacy" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Privacy Policy</a></div>
                </div>
                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                    <div class="mb-2 font-medium dark:text-gray-300">Product</div>
                    <ul class="text-sm">
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Features</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Security</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Team</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Enterprise</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Customer stories</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Resources</a></li>
                    </ul>
                </div>
                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                    <div class="mb-2 font-medium dark:text-gray-300">Platform</div>
                    <ul class="text-sm">
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Developer API</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Partners</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Atom</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Electron</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">AstroWind Desktop</a></li>
                    </ul>
                </div>
                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                    <div class="mb-2 font-medium dark:text-gray-300">Support</div>
                    <ul class="text-sm">
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Docs</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Community Forum</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Professional Services</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Skills</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Status</a></li>
                    </ul>
                </div>
                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                    <div class="mb-2 font-medium dark:text-gray-300">Company</div>
                    <ul class="text-sm">
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">About</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Careers</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Press</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Inclusion</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Social Impact</a></li>
                        <li class="mb-2"><a href="#" class="text-muted dark:text-gray-400 duration-150 ease-in-out hover:text-gray-700 hover:underline transition">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="md:justify-between md:flex md:items-center md:py-8 py-6">
                <ul class="flex -ml-2 mb-4 md:mb-0 md:ml-4 md:order-1 rtl:-mr-2 rtl:md:ml-0 rtl:md:mr-4 rtl:ml-0">
                    <li>
                        <a href="#" class="text-muted dark:text-gray-400 dark:focus:ring-gray-700 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 inline-flex items-center p-2.5 rounded-lg text-sm" aria-label="X">
                            <svg class="h-5 w-5" data-icon="tabler:brand-x" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:brand-x">
                                    <path d="m4 4l11.733 16H20L8.267 4zm0 16l6.768-6.768m2.46-2.46L20 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </symbol>
                                <use xlink:href="#ai:tabler:brand-x"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted dark:text-gray-400 dark:focus:ring-gray-700 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 inline-flex items-center p-2.5 rounded-lg text-sm" aria-label="Instagram">
                            <svg class="h-5 w-5" data-icon="tabler:brand-instagram" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:brand-instagram">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M4 8a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4z"/>
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 1 0-6 0m7.5-4.5v.01"/>
                                    </g>
                                </symbol>
                                <use xlink:href="#ai:tabler:brand-instagram"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted dark:text-gray-400 dark:focus:ring-gray-700 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 inline-flex items-center p-2.5 rounded-lg text-sm" aria-label="Facebook">
                            <svg class="h-5 w-5" data-icon="tabler:brand-facebook" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:brand-facebook">
                                    <path d="M7 10v4h3v7h4v-7h3l1-4h-4V8a1 1 0 0 1 1-1h3V3h-3a5 5 0 0 0-5 5v2z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </symbol>
                                <use xlink:href="#ai:tabler:brand-facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="/rss.xml" class="text-muted dark:text-gray-400 dark:focus:ring-gray-700 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 inline-flex items-center p-2.5 rounded-lg text-sm" aria-label="RSS">
                            <svg class="h-5 w-5" data-icon="tabler:rss" height="1em" viewBox="0 0 24 24" width="1em">
                                <use xlink:href="#ai:tabler:rss"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/onwidget/astrowind" class="text-muted dark:text-gray-400 dark:focus:ring-gray-700 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 inline-flex items-center p-2.5 rounded-lg text-sm" aria-label="Github">
                            <svg class="h-5 w-5" data-icon="tabler:brand-github" height="1em" viewBox="0 0 24 24" width="1em">
                                <symbol id="ai:tabler:brand-github">
                                    <path d="M9 19c-4.3 1.4-4.3-2.5-6-3m12 5v-3.5c0-1 .1-1.4-.5-2c2.8-.3 5.5-1.4 5.5-6a4.6 4.6 0 0 0-1.3-3.2a4.2 4.2 0 0 0-.1-3.2s-1.1-.3-3.5 1.3a12.3 12.3 0 0 0-6.2 0C6.5 2.8 5.4 3.1 5.4 3.1a4.2 4.2 0 0 0-.1 3.2A4.6 4.6 0 0 0 4 9.5c0 4.6 2.7 5.7 5.5 6c-.6.6-.6 1.2-.5 2V21" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </symbol>
                                <use xlink:href="#ai:tabler:brand-github"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="dark:text-muted mr-4 text-sm"><img alt="onWidget logo" class="h-5 w-5 bg-cover float-left md:-mt-0.5 md:h-6 md:w-6 mr-1.5 rounded-sm rtl:float-right rtl:ml-1.5 rtl:mr-0" loading="lazy" src="https://onwidget.com/favicon/favicon-32x32.png">Made by <a href="https://onwidget.com/" class="dark:text-muted text-blue-600 underline">onWidget</a> · All rights reserved.</div>
            </div>
        </div>
    </footer>
    <script>!function(){const e="system";if(window.basic_script)return;function t(e){"dark"===e?document.documentElement.classList.add("dark"):document.documentElement.classList.remove("dark")}window.basic_script=!0;const d=function(){e&&e.endsWith(":only")||(localStorage.theme,0)?t(e.replace(":only","")):"dark"===localStorage.theme||!("theme"in localStorage)&&window.matchMedia("(prefers-color-scheme: dark)").matches?t("dark"):t("light")};function a(e,t,d){const a="string"==typeof e?document.querySelectorAll(e):e;a&&a.length&&a.forEach((e=>{e.addEventListener(t,(t=>d(t,e)),!1)}))}d();const o=function(){let t=window.scrollY,d=!0;a("#header nav","click",(function(){document.querySelector("[data-aw-toggle-menu]")?.classList.remove("expanded"),document.body.classList.remove("overflow-hidden"),document.getElementById("header")?.classList.remove("h-screen"),document.getElementById("header")?.classList.remove("expanded"),document.getElementById("header")?.classList.remove("bg-page"),document.querySelector("#header nav")?.classList.add("hidden"),document.querySelector("#header > div > div:last-child")?.classList.add("hidden")})),a("[data-aw-toggle-menu]","click",(function(e,t){t.classList.toggle("expanded"),document.body.classList.toggle("overflow-hidden"),document.getElementById("header")?.classList.toggle("h-screen"),document.getElementById("header")?.classList.toggle("expanded"),document.getElementById("header")?.classList.toggle("bg-page"),document.querySelector("#header nav")?.classList.toggle("hidden"),document.querySelector("#header > div > div:last-child")?.classList.toggle("hidden")})),a("[data-aw-toggle-color-scheme]","click",(function(){e.endsWith(":only")||(document.documentElement.classList.toggle("dark"),localStorage.theme=document.documentElement.classList.contains("dark")?"dark":"light")})),a("[data-aw-social-share]","click",(function(e,t){const d=t.getAttribute("data-aw-social-share"),a=encodeURIComponent(t.getAttribute("data-aw-url")),o=encodeURIComponent(t.getAttribute("data-aw-text"));let n;switch(d){case"facebook":n=`https://www.facebook.com/sharer.php?u=${a}`;break;case"twitter":n=`https://twitter.com/intent/tweet?url=${a}&text=${o}`;break;case"linkedin":n=`https://www.linkedin.com/shareArticle?mini=true&url=${a}&title=${o}`;break;case"whatsapp":n=`https://wa.me/?text=${o}%20${a}`;break;case"mail":n=`mailto:?subject=%22${o}%22&body=${o}%20${a}`;break;default:return}const c=document.createElement("a");c.target="_blank",c.href=n,c.click()}));function o(){const e=document.querySelector("#header[data-aw-sticky-header]");e&&(t>60&&!e.classList.contains("scroll")?e.classList.add("scroll"):t<=60&&e.classList.contains("scroll")&&e.classList.remove("scroll"),d=!1)}window.matchMedia("(max-width: 767px)").addEventListener("change",(function(){document.querySelector("[data-aw-toggle-menu]")?.classList.remove("expanded"),document.body.classList.remove("overflow-hidden"),document.getElementById("header")?.classList.remove("h-screen"),document.getElementById("header")?.classList.remove("expanded"),document.getElementById("header")?.classList.remove("bg-page"),document.querySelector("#header nav")?.classList.add("hidden"),document.querySelector("#header > div > div:last-child")?.classList.add("hidden")})),o(),a([document],"scroll",(function(){t=window.scrollY,d||(window.requestAnimationFrame((()=>{o()})),d=!0)}))},n=function(){document.documentElement.classList.add("motion-safe:scroll-smooth");const e=document.querySelector("[data-aw-toggle-menu]");e&&e.classList.remove("expanded"),document.body.classList.remove("overflow-hidden"),document.getElementById("header")?.classList.remove("h-screen"),document.getElementById("header")?.classList.remove("expanded"),document.querySelector("#header nav")?.classList.add("hidden")};window.onload=o,window.onpageshow=n,document.addEventListener("astro:after-swap",(()=>{d(),o(),n()}))}()</script>

</x-layout>


