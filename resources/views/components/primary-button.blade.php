<button {{ $attributes->merge(['type' => 'submit', 'class' => '
    inline-flex items-center px-6 py-3
    bg-primary text-white font-pixel text-xs uppercase tracking-widest
    border-b-4 border-r-4 border-purple-900
    hover:bg-primary/90 hover:border-purple-800
    active:border-0 active:mt-1 active:ml-1
    transition-all duration-75 focus:outline-none
']) }}>
    {{ $slot }}
</button>
