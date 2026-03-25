<div class="mt-16">
    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 flex items-center gap-3">
        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        Comentários
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">({{ $comments->total() }})</span>
    </h3>

    {{-- New Comment Form --}}
    @auth
        <div class="flex gap-4 mb-10">
            <img src="{{ auth()->user()->channel ? Storage::url(auth()->user()->channel->brand) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=7c3aed&color=fff' }}"
                 class="w-10 h-10 rounded-full object-cover ring-2 ring-gray-200 dark:ring-slate-700 flex-shrink-0">
            <div class="flex-1">
                <textarea wire:model="newComment" rows="3"
                    placeholder="Escreva um comentário..."
                    class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none resize-none transition-all"></textarea>
                @error('newComment') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                <div class="flex justify-end mt-3">
                    <button wire:click="addComment"
                        class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-xl transition-colors">
                        Comentar
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="mb-10 p-6 rounded-2xl bg-gray-50 dark:bg-slate-800 text-center">
            <p class="text-gray-600 dark:text-gray-400 mb-3">Faça login para comentar</p>
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-xl transition-colors">
                Entrar
            </a>
        </div>
    @endauth

    {{-- Comments List --}}
    <div class="space-y-6">
        @forelse($comments as $comment)
            <div class="flex gap-4">
                <img src="{{ $comment->user->channel ? Storage::url($comment->user->channel->brand) : 'https://ui-avatars.com/api/?name=' . urlencode($comment->user->name) . '&background=7c3aed&color=fff' }}"
                     class="w-10 h-10 rounded-full object-cover ring-2 ring-gray-200 dark:ring-slate-700 flex-shrink-0">
                <div class="flex-1">
                    <div class="p-4 rounded-2xl bg-gray-50 dark:bg-slate-800">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900 dark:text-white text-sm">{{ $comment->user->name }}</span>
                                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            @auth
                                @if(auth()->id() === $comment->user_id || $post->user_id === auth()->id())
                                    <button wire:click="deleteComment({{ $comment->id }})"
                                        class="text-gray-400 hover:text-red-500 transition-colors"
                                        onclick="confirm('Remover comentário?') || event.stopImmediatePropagation()">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                @endif
                            @endauth
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">{{ $comment->body }}</p>
                    </div>

                    {{-- Reply Button --}}
                    @auth
                        <button wire:click="setReplyTo({{ $comment->id }})"
                            class="mt-2 ml-4 text-xs text-purple-600 hover:text-purple-700 font-medium transition-colors">
                            Responder
                        </button>
                    @endauth

                    {{-- Reply Form --}}
                    @if($replyTo === $comment->id)
                        <div class="mt-3 ml-4 flex gap-3">
                            <img src="{{ auth()->user()->channel ? Storage::url(auth()->user()->channel->brand) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=7c3aed&color=fff' }}"
                                 class="w-8 h-8 rounded-full object-cover ring-2 ring-gray-200 dark:ring-slate-700 flex-shrink-0">
                            <div class="flex-1">
                                <textarea wire:model="replyBody" rows="2"
                                    placeholder="Escreva uma resposta..."
                                    class="w-full px-3 py-2 rounded-xl bg-gray-100 dark:bg-slate-700 border border-gray-200 dark:border-slate-600 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none resize-none text-sm transition-all"></textarea>
                                @error('replyBody') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                <div class="flex justify-end gap-2 mt-2">
                                    <button wire:click="cancelReply"
                                        class="px-4 py-1.5 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-xs font-medium transition-colors">
                                        Cancelar
                                    </button>
                                    <button wire:click="addReply"
                                        class="px-4 py-1.5 bg-purple-600 hover:bg-purple-700 text-white text-xs font-semibold rounded-lg transition-colors">
                                        Responder
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Replies --}}
                    @if($comment->replies->isNotEmpty())
                        <div class="mt-4 ml-4 space-y-4 border-l-2 border-purple-500/30 pl-4">
                            @foreach($comment->replies as $reply)
                                <div class="flex gap-3">
                                    <img src="{{ $reply->user->channel ? Storage::url($reply->user->channel->brand) : 'https://ui-avatars.com/api/?name=' . urlencode($reply->user->name) . '&background=7c3aed&color=fff' }}"
                                         class="w-8 h-8 rounded-full object-cover ring-2 ring-gray-200 dark:ring-slate-700 flex-shrink-0">
                                    <div class="flex-1">
                                        <div class="p-3 rounded-xl bg-gray-100 dark:bg-slate-700/50">
                                            <div class="flex items-center justify-between mb-1">
                                                <div class="flex items-center gap-2">
                                                    <span class="font-semibold text-gray-900 dark:text-white text-xs">{{ $reply->user->name }}</span>
                                                    <span class="text-xs text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                @auth
                                                    @if(auth()->id() === $reply->user_id || $post->user_id === auth()->id())
                                                        <button wire:click="deleteComment({{ $reply->id }})"
                                                            class="text-gray-400 hover:text-red-500 transition-colors"
                                                            onclick="confirm('Remover resposta?') || event.stopImmediatePropagation()">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                        </button>
                                                    @endif
                                                @endauth
                                            </div>
                                            <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $reply->body }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <p class="text-gray-500 dark:text-gray-400">Nenhum comentário ainda. Seja o primeiro!</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($comments->hasPages())
        <div class="mt-8">
            {{ $comments->links() }}
        </div>
    @endif
</div>
