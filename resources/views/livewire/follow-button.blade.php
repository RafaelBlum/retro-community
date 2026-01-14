<div>
    <button
        wire:click="toggleFollow"
        @class([
            'px-4 py-2 rounded-lg font-bold transition-colors',
            'bg-white text-dark hover:bg-gray-200' => !$isFollowing,
            'bg-gray-700 text-white hover:bg-red-600' => $isFollowing,
        ])
    >
        @if($isFollowing)
            Seguindo
        @else
            Seguir
        @endif
    </button>
</div>
