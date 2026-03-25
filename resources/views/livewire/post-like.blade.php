<div class="flex items-center gap-4">
    <button wire:click="toggleLike"
        class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-full transition-all duration-300
        {{ $isLiked
            ? 'bg-red-500/10 text-red-500 border border-red-500/30'
            : 'bg-gray-100 dark:bg-slate-800 text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-slate-700 hover:bg-red-50 dark:hover:bg-red-500/10 hover:text-red-500 hover:border-red-300 dark:hover:border-red-500/30' }}">

        <span class="relative flex items-center justify-center">
            <svg wire:loading.remove wire:target="toggleLike"
                class="w-6 h-6 transition-all duration-300 {{ $isLiked ? 'scale-110' : 'group-hover:scale-110' }}"
                fill="{{ $isLiked ? 'currentColor' : 'none' }}"
                stroke="currentColor"
                viewBox="0 0 24 24"
                stroke-width="{{ $isLiked ? '0' : '2' }}">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>

            @if($isLiked)
                <span class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <span class="like-burst-1 absolute w-1.5 h-1.5 bg-red-400 rounded-full opacity-0"></span>
                    <span class="like-burst-2 absolute w-1 h-1 bg-red-300 rounded-full opacity-0"></span>
                    <span class="like-burst-3 absolute w-1.5 h-1.5 bg-pink-400 rounded-full opacity-0"></span>
                    <span class="like-burst-4 absolute w-1 h-1 bg-red-500 rounded-full opacity-0"></span>
                </span>
            @endif
        </span>

        <span class="font-semibold text-sm select-none">
            {{ $isLiked ? 'Curtido' : 'Curtir' }}
        </span>
    </button>

    <span class="text-sm text-gray-500 dark:text-gray-400 font-medium">
        {{ $likesCount }} {{ $likesCount === 1 ? 'curtida' : 'curtidas' }}
    </span>

    <style>
        .like-burst-1 { animation: burst1 0.6s ease-out forwards; }
        .like-burst-2 { animation: burst2 0.6s ease-out 0.05s forwards; }
        .like-burst-3 { animation: burst3 0.6s ease-out 0.1s forwards; }
        .like-burst-4 { animation: burst4 0.6s ease-out 0.15s forwards; }
        @keyframes burst1 { 0% { transform: translate(0,0) scale(0); opacity: 1; } 100% { transform: translate(-16px,-14px) scale(1); opacity: 0; } }
        @keyframes burst2 { 0% { transform: translate(0,0) scale(0); opacity: 1; } 100% { transform: translate(14px,-12px) scale(1); opacity: 0; } }
        @keyframes burst3 { 0% { transform: translate(0,0) scale(0); opacity: 1; } 100% { transform: translate(-10px,14px) scale(1); opacity: 0; } }
        @keyframes burst4 { 0% { transform: translate(0,0) scale(0); opacity: 1; } 100% { transform: translate(12px,10px) scale(1); opacity: 0; } }
    </style>
</div>
