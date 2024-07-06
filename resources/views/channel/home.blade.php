<x-layout>


    <x-partials.navbar-section/>

    <!-- component -->
    <section>
        <div class="bg-black text-white py-20">
            <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
                <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                    <h1 class="text-3xl md:text-5xl p-2 text-yellow-300 tracking-loose">TechFest</h1>
                    <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">Space : The Timeless Infinity
                    </h2>
                    <p class="text-sm md:text-base text-gray-50 mb-4">Explore your favourite events and
                        register now to showcase your talent and win exciting prizes.</p>
                    <a href="#"
                       class="bg-transparent hover:bg-yellow-300 text-yellow-300 hover:text-black rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent">
                        Explore Now</a>
                </div>
                <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center">
                    <div class="h-48 flex flex-wrap content-center">
                        <div>
                            <img class="inline-block mt-28 hidden xl:block" src="https://user-images.githubusercontent.com/54521023/116969935-c13d5b00-acd4-11eb-82b1-5ad2ff10fb76.png"></div>
                        <div>
                            <img class="inline-block mt-24 md:mt-0 p-8 md:p-0"  src="https://user-images.githubusercontent.com/54521023/116969931-bedb0100-acd4-11eb-99a9-ff5e0ee9f31f.png"></div>
                        <div>
                            <img class="inline-block mt-28 hidden lg:block" src="https://user-images.githubusercontent.com/54521023/116969939-c1d5f180-acd4-11eb-8ad4-9ab9143bdb50.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  HEADER HOME  --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ $channel->name }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
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
{{--                    vertical-loop-animation--}}
                </div>
            </div>
        </div>

    </section>

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
                @foreach($posts as $post)
                    <a href="{{route('posts.post', ['post'=>$post])}}" class="relative w-full h-60 bg-cover bg-center bg-no-repeat" style="background-image: url('{{Storage::url($post->featured_image_url)}}');">
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

    <section class="bg-gray-50 dark:bg-gray-800">

        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">


            <div class="flex flex-row items-center justify-center mb-10">
                <x-partials.title-section title="Tocados recentemente" description=""/>
            </div>

            <div class="mt-4 -ml-3 grid grid-cols-5 gap-2 items-center">
                @foreach($posts as $post)
                    <div class="flex flex-col p-3 cursor-pointer gap-2 rounded-md hover:bg-white/5 text-gray-900 dark:text-white">
                        <img class="mx-auto h-full w-full rounded-md"
                             src="{{Storage::url($post->featured_image_url)}}"
                             alt="{{$post->title}}" />
                        <div class="line-clamp-3 flex flex justify-between">
                            <span class="font-semibold">{{$post->title}}</span>
                            <span class="text-sm text-zinc-400">{{$post->views}}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{--  SECTION CHANNELS  --}}
{{--    <section class="bg-gray-50 dark:bg-gray-800">--}}
{{--        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">--}}
{{--            <div class="flex flex-col items-center">--}}

{{--                <x-partials.title-section title="Canais parceiros" description="Comunidade retrô games fortalecidos"/>--}}

{{--                <ul class="mx-auto grid lg:gap-3 sm:grid-cols-2 md:grid-cols-4 max-w-lg md:max-w-max px-5">--}}
{{--                    @foreach($channels as $channel)--}}
{{--                        <li class="mx-auto flex max-w-xs flex-col items-center gap-2 py-4 md:py-2 text-center up mx-10">--}}
{{--                            <img src="{{Storage::url($channel->brand)}}" alt="" class="w-20 h-20 p-1 rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                            <a href="{{route('my.channel', ['channel'=> $channel])}}" class="text-purple-600 dark:text-purple-500 hover:underline">--}}
{{--                                {{$channel->name}}--}}
{{--                            </a>--}}
{{--                            <a href="{{'https://www.youtube.com/@' . $channel->link}}" target="_blank" class="font-light text-white dark:text-white hover:underline">--}}
{{--                                {{$channel->title}}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="bg-white dark:bg-gray-900">--}}
{{--        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">--}}

{{--            <div class="flex flex-wrap -mx-4">--}}
{{--                <!-- Category 1 -->--}}
{{--                <div class="w-full sm:w-1/3 px-4 mb-8 up">--}}
{{--                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">--}}
{{--                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>--}}
{{--                        <div--}}
{{--                            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4">--}}
{{--                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Men</h2>--}}
{{--                            <a href="/"--}}
{{--                               class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop--}}
{{--                                now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Category 2 -->--}}
{{--                <div class="w-full sm:w-1/3 px-4 mb-8 down">--}}
{{--                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">--}}
{{--                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>--}}
{{--                        <div--}}
{{--                            class="category-text absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4 transition duration-300">--}}
{{--                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Women </h2>--}}
{{--                            <a href="/"--}}
{{--                               class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop--}}
{{--                                now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Category 3 -->--}}
{{--                <div class="w-full sm:w-1/3 px-4 mb-8 up">--}}
{{--                    <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                        <img src="{{ asset('images/feature-2.png') }}" alt="Category 2" class="w-full h-auto opacity-10">>--}}
{{--                        <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>--}}
{{--                        <div--}}
{{--                            class="category-text absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4 transition duration-300">--}}
{{--                            <h2 class="text-2xl md:text-3xl font-bold mb-4">Accessories</h2>--}}
{{--                            <a href="/"--}}
{{--                               class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop--}}
{{--                                now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    {{--  SECTION POSTS  --}}
{{--    <section class="bg-white dark:bg-gray-900">--}}
{{--        <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">--}}
{{--            <div class="flex flex-col items-center">--}}
{{--                <x-partials.title-section--}}
{{--                    title="{{($posts->count() != null ? 'Últimas postagens':'Trabalhando em novos conteúdos')}}"--}}
{{--                    description="{{($posts->count() != null ? 'Veja algumas das últimas novidades criadas':'')}}"/>--}}

{{--                @if($posts->count() != 0)--}}

{{--                        @if($posts->count() == 1)--}}
{{--                            <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6 up">--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">--}}
{{--                                        <div class="text-gray-500 sm:text-lg dark:text-gray-400">--}}
{{--                                            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h2>--}}
{{--                                            <p class="mb-8 font-light lg:text-xl text-gray-900 dark:text-white"> {!!$post->content!!} </p>--}}

{{--                                            <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">--}}
{{--                                                <li class="flex space-x-3">--}}
{{--                                                    <!-- Icon -->--}}
{{--                                                    <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>--}}
{{--                                                    <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">{{$post->category->name}}</span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}

{{--                                            <div class="flex">--}}
{{--                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>--}}
{{--                                                    <div class="flex flex-col lg:flex-row">--}}
{{--                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="{{Storage::url($post->featured_image_url)}}" alt="dashboard feature image">--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @elseif($posts->count() == 2)--}}
{{--                            <div class="mb-6 grid gap-2 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-2 lg:mb-12 lg:gap-6 up">--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">--}}
{{--                                        <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-60 object-cover rounded-tl-md rounded-tr-md" />--}}
{{--                                        <div class="px-6 py-4 dark:text-white   ">--}}
{{--                                            <p class="mb-4 text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400"> {{$post->category->name}} </p>--}}
{{--                                            <p class="mb-4 text-xl font-semibold text-gray-900 dark:text-white"> {{$post->title}} </p>--}}
{{--                                            <p class="mb-6 text-sm text-gray-900 dark:text-white sm:text-base lg:mb-8"> {!!$post->content!!} </p>--}}
{{--                                            <div class="flex">--}}
{{--                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>--}}
{{--                                                    <div class="flex flex-col lg:flex-row">--}}
{{--                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="mb-6 grid gap-4 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-3 lg:mb-12 lg:gap-6 up">--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">--}}
{{--                                        <img src="{{Storage::url($post->featured_image_url)}}" alt="" class="h-60 object-cover rounded-tl-md rounded-tr-md" />--}}
{{--                                        <div class="px-6 py-4 dark:text-white   ">--}}
{{--                                            <p class="mb-4 text-sm font-semibold uppercase text-fuchsia-700 dark:text-amber-400"> {{$post->category->name}} </p>--}}
{{--                                            <p class="mb-4 text-xl font-semibold"> {{Str::limit($post->title, 30)}}</p>--}}

{{--                                            <p class="line-clamp-3 lg:line-clamp-none h-auto mb-4">--}}
{{--                                                {!! $post->summary !!}--}}
{{--                                            </p>--}}


{{--                                            <div class="flex">--}}
{{--                                                <img src="{{Storage::url($post->author->channel->brand)}}" alt="" class="mr-4 h-10 w-10 p-[0.1875rem] rounded-full ring-1 ring-slate-900/10 shadow overflow-hidden flex-none dark:bg-indigo-500 dark:highlight-white/20" />--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <h6 class="text-base font-bold">Canal {{$post->author->channel->name}}</h6>--}}
{{--                                                    <div class="flex flex-col lg:flex-row">--}}
{{--                                                        <p class="text-sm text-gray-500">{{$post->author->channel->title}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                            @if($posts->count() <= 3)--}}
{{--                                <x-partials.btn-actions href="{{route('posts.index')}}" btn>--}}
{{--                                    Ver mais--}}
{{--                                </x-partials.btn-actions>--}}
{{--                           @endif--}}
{{--                    @endif--}}

{{--                @else--}}

{{--                    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">--}}
{{--                        <figure class="max-w-screen-md mx-auto">--}}
{{--                            <blockquote>--}}
{{--                                <p class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">--}}
{{--                                    "Desculpe o transtorno, mas estamos trabalhando novas notícias e conteúdos para melhor informar a todos."</p>--}}
{{--                            </blockquote>--}}
{{--                            <figcaption class="flex items-center justify-center mt-6 space-x-3">--}}
{{--                                <img class="w-6 h-6" src="/images/brandname/favicon-retrocommunity.png" alt="profile picture">--}}
{{--                                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">--}}
{{--                                    <div class="pr-3 font-medium text-gray-900 dark:text-white">{{config('app.name')}}</div>--}}
{{--                                </div>--}}
{{--                            </figcaption>--}}
{{--                        </figure>--}}
{{--                    </div>--}}

{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <x-partials.footer />

    <script>

    </script>


</x-layout>
