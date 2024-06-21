@props([
    'btn' => null,
    'login' => null
])

<a {{$attributes->class([
    'inline-block flex-none cursor-pointer rounded-[5px] border-0 mt-6 px-[1.688rem] py-[0.813rem] bg-[#f7d046] hover:bg-[#FAC819] transition-colors font-[Manrope,_sans-serif] text-base font-semibold capitalize leading-[1.313rem] text-black antialiased [transition:color_0.25s_ease_0s] hover:[box-shadow:rgb(0,_0,_0)_0px_0px]' => $btn,
    'text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-[5px] text-sm px-4 lg:px-5 py-2 lg:py-1.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800' => $login
])}}>
    {{$slot}}
</a>
