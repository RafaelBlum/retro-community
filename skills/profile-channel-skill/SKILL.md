---
name: profile-channel
description: >
  Página de perfil público do canal no Retro Community.
  Gerencia o frontend do perfil do canal com layout moderno dark/light mode,
  hero section com gradiente, botão de seguir canal (Livewire),
  seção de roleta de sorteios (placeholder), card do dono do canal,
  listagem de posts com views, e dashboard com integração de APIs
  (YouTube e RetroAchievements).
  Use esta skill sempre que o usuário precisar modificar, melhorar ou
  criar funcionalidades relacionadas ao perfil do canal.
---

# Profile Channel Skill

## Contexto do Projeto

O **Retro Community** é uma plataforma para canais do YouTube de conteúdo retrô.
Cada canal cadastrado tem um perfil público acessível via `/{slug}`.

O perfil do canal é a página principal onde:
- Visitantes conhecem o canal
- Seguidores podem seguir o canal
- O dono do canal gerencia seu conteúdo
- Exibe posts, conquistas e dados de APIs externas

## Estrutura de Arquivos

```
resources/views/channel/
├── home.blade.php           # Perfil público do canal (/{slug})
├── dashboard.blade.php      # Dashboard do dono (/canal/{slug}/dashboard)
└── channels.blade.php       # Listagem de todos os canais

resources/views/components/partials/
├── navbar.blade.php         # Navbar com links do canal logado
└── footer.blade.php         # Footer

app/Http/Controllers/
└── ChannelController.php    # Controllers das rotas do canal

app/Livewire/
└── FollowButton.php         # Componente Livewire para seguir canal

resources/css/
└── app.css                  # Animações e estilos globais
```

## Rotas

| Método | URI | Nome | Controller |
|--------|-----|------|------------|
| GET | `/{slug}` | `my.channel` | `ChannelController@index` |
| GET | `/canal/{slug}/dashboard` | `my.channel.dashboard` | `ChannelController@dashboard` |
| GET | `/canais` | `app.channels` | `ChannelController@channels` |

## 1. Página de Perfil Público (`home.blade.php`)

### Estrutura da Página

```blade
<x-layout>
    <x-partials.navbar/>

    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden text-white bg-gradient-to-br from-slate-700 via-violet-600 to-slate-700 dark:from-slate-900 dark:via-purple-900 dark:to-slate-900">
        {{-- Blur effects decorativos --}}
        <div class="absolute inset-0 opacity-15 dark:opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-violet-400 dark:bg-purple-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-20 w-[500px] h-[500px] bg-sky-400 dark:bg-blue-500 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-screen-xl px-4 pt-32 pb-56 mx-auto lg:pt-44">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Conteúdo à esquerda --}}
                <div>
                    {{-- Badge --}}
                    <span class="inline-block px-4 py-1 mb-6 text-sm font-medium rounded-full bg-white/10 text-white/90 border border-white/20">
                        Perfil do Canal
                    </span>
                    {{-- Nome do canal --}}
                    <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-6 bg-gradient-to-r from-white via-violet-200 to-violet-300 dark:from-white dark:via-purple-200 dark:to-purple-400 bg-clip-text text-transparent">
                        {{ $channel->name }}
                    </h1>
                    {{-- Descrição --}}
                    <p class="text-lg text-white/80 dark:text-gray-300 mb-8 leading-relaxed max-w-lg">
                        {{ $channel->description }}
                    </p>
                    {{-- Botões de ação --}}
                    <div class="flex flex-wrap gap-4">
                        {{-- Botão Gerenciar (se for dono) --}}
                        @auth
                            @if(auth()->user()->channel && auth()->user()->channel->id === $channel->id)
                                <a href="{{ route('filament.admin.pages.dashboard') }}" class="...">
                                    Gerenciar Canal
                                </a>
                            @else
                                {{-- Botão Seguir (Livewire) --}}
                                <livewire:follow-button :channel="$channel" />
                            @endif
                        @endauth
                        @guest
                            <livewire:follow-button :channel="$channel" />
                        @endguest
                        {{-- Botão YouTube --}}
                        <a href="https://www.youtube.com/@{{ $channel->link }}" target="_blank" class="...">
                            YouTube
                        </a>
                    </div>
                </div>
                {{-- Imagem do canal à direita --}}
                <div class="relative flex justify-center">
                    <div class="absolute w-[450px] h-[450px] bg-violet-400/30 dark:bg-purple-500/30 rounded-full blur-3xl"></div>
                    <img src="{{ Storage::url($channel->brand) }}" alt="{{ $channel->name }}" class="...">
                </div>
            </div>
        </div>
        {{-- Transição suave para próxima seção --}}
        <div class="absolute bottom-0 left-0 right-0 h-56 bg-gradient-to-b from-transparent via-slate-700/40 to-white dark:via-slate-900/40 dark:to-slate-900"></div>
    </section>

    {{-- CARD DO DONO DO CANAL --}}
    <section class="bg-white dark:bg-slate-900 py-16">
        {{-- Avatar, nome, descrição, link YouTube, contagem de seguidores --}}
    </section>

    {{-- ROLETA DE SORTEIOS (PLACEHOLDER) --}}
    @auth
        <section class="bg-gray-100 dark:bg-slate-950 py-20">
            {{-- Roleta visual animada + Lista de participantes --}}
            {{-- Design placeholder para desenvolvimento futuro --}}
        </section>
    @endauth

    {{-- CAMPANHA (se existir) --}}
    @if($channel->camping)
        <section class="bg-white dark:bg-slate-900 py-20">
            {{-- Título, conteúdo, QR Code, iframe --}}
        </section>
    @endif

    {{-- POSTS --}}
    <section class="bg-gray-100 dark:bg-slate-950 py-20">
        {{-- Cards de posts com imagem, views, título, resumo --}}
    </section>

    <x-partials.footer />
</x-layout>
```

### Dados Disponíveis

```php
// No ChannelController@index
$channel = Channel::where('slug', $slug)->firstOrFail();
$posts = Post::where('user_id', $channel->user_id)->get();
```

**Variáveis na view:**
- `$channel` — Modelo Channel
- `$channel->name` — Nome do canal
- `$channel->slug` — Slug para URL
- `$channel->description` — Descrição
- `$channel->link` — Username do YouTube (sem @)
- `$channel->brand` — Caminho da imagem (storage)
- `$channel->color` — Cor personalizada do canal
- `$channel->user` — Dono do canal (User model)
- `$channel->user->name` — Nome do usuário
- `$channel->user->avatar` — Avatar do usuário
- `$channel->followers_count` — Contagem de seguidores
- `$channel->camping` — Campanha ativa (se existir)
- `$posts` — Coleção de posts do canal

## 2. Dashboard do Canal (`dashboard.blade.php`)

### Acesso

Apenas o dono do canal pode acessar. Redireciona para o perfil público se não for o dono.

```php
// ChannelController@dashboard
public function dashboard($slug)
{
    $channel = Channel::where('slug', $slug)->firstOrFail();
    
    if (!auth()->check() || auth()->user()->channel->id !== $channel->id) {
        return redirect()->route('my.channel', $slug);
    }

    $posts = Post::where('user_id', $channel->user_id)->get();
    return view('channel.dashboard', compact('channel', 'posts'));
}
```

### Seções do Dashboard

1. **Hero Section** — Nome do canal, botões de ação
2. **Stats Cards** — Seguidores, Posts, YT Inscritos, RA Pontos
3. **Live Status** — Placeholder para status de live
4. **YouTube Data** — Placeholder para dados da API do YouTube
5. **RetroAchievements** — Placeholder para conquistas RA
6. **Posts** — Listagem de posts do canal

### Preparação para APIs

O dashboard está preparado para receber:

**YouTube Data API v3:**
- Contagem de inscritos
- Total de views
- Quantidade de vídeos
- Status de live (se estiver ao vivo)

**RetroAchievements API:**
- Username RA vinculado
- Total de pontos
- Conquistas recentes
- Platinas/masteries

## 3. Botão de Seguir (Livewire)

```php
// app/Livewire/FollowButton.php
class FollowButton extends Component
{
    public Channel $channel;

    public function toggleFollow()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if ($user->channel && $user->channel->id === $this->channel->id) {
            return; // Dono não pode seguir próprio canal
        }

        auth()->user()->following()->toggle($this->channel->id);
    }

    public function render()
    {
        $isFollowing = auth()->check()
            ? auth()->user()->following()->where('channel_id', $this->channel->id)->exists()
            : false;

        return view('livewire.follow-button', ['isFollowing' => $isFollowing]);
    }
}
```

```blade
{{-- resources/views/livewire/follow-button.blade.php --}}
<div>
    <button
        wire:click="toggleFollow"
        @class([
            'px-4 py-2 rounded-lg font-bold transition-colors',
            'bg-white text-dark hover:bg-gray-200' => !$isFollowing,
            'bg-gray-700 text-white hover:bg-red-600' => $isFollowing,
        ])
    >
        {{ $isFollowing ? 'Seguindo' : 'Seguir' }}
    </button>
</div>
```

## 4. Estilos CSS

### Animações Customizadas

```css
/* resources/css/app.css */

/* Animação de spin lento para roleta */
@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.animate-spin-slow {
    animation: spin-slow 20s linear infinite;
}

/* Animação de flutuação vertical */
@keyframes verticalLoop {
    0% { transform: translateY(0); }
    50% { transform: translateY(-50px); }
    100% { transform: translateY(0); }
}

.vertical-loop-animation {
    animation: verticalLoop 5s infinite;
}
```

## 5. Navbar — Links do Canal Logado

```blade
{{-- Dropdown do usuário logado --}}
@if(auth()->user()->channel)
    <a href="{{ route('my.channel', ['slug' => auth()->user()->channel->slug]) }}">
        Meu canal
    </a>
    <a href="{{ route('my.channel.dashboard', ['slug' => auth()->user()->channel->slug]) }}">
        Dashboard
    </a>
@endif
```

## 6. Padrões de Design

### Cores e Gradientes

```blade
{{-- Hero gradient --}}
bg-gradient-to-br from-slate-700 via-violet-600 to-slate-700
dark:from-slate-900 dark:via-purple-900 dark:to-slate-900

{{-- Text gradient --}}
bg-gradient-to-r from-white via-violet-200 to-violet-300
dark:from-white dark:via-purple-200 dark:to-purple-400

{{-- Cards --}}
bg-gray-50 dark:bg-slate-800/50
border border-gray-100 dark:border-slate-700/50
```

### Classes Comuns

```blade
{{-- Seções --}}
<section class="bg-white dark:bg-slate-900 py-16">
<section class="bg-gray-100 dark:bg-slate-950 py-20">

{{-- Container --}}
<div class="max-w-screen-xl px-4 mx-auto">

{{-- Badges --}}
<span class="inline-block px-4 py-1 mb-4 text-sm font-medium rounded-full bg-purple-500/10 text-purple-600">

{{-- Botões --}}
class="px-8 py-3 bg-white/15 hover:bg-white/25 backdrop-blur rounded-lg font-semibold transition-all border border-white/20"

{{-- Cards arredondados --}}
class="p-8 rounded-3xl bg-gray-50 dark:bg-slate-800/50 border border-gray-100 dark:border-slate-700/50"
```

## 7. Checklist de Modificações

Quando modificar o perfil do canal:

- [ ] Manter consistência com o estilo da `home.blade.php`
- [ ] Suportar dark mode e light mode
- [ ] Verificar se o botão de seguir funciona corretamente
- [ ] Testar acesso como dono, seguidor e visitante
- [ ] Verificar responsividade em mobile
- [ ] Atualizar a rota no `ChannelController` se necessário
- [ ] Testar se as variáveis `$channel` e `$posts` estão disponíveis

## 8. Integrações Futuras

### YouTube Data API v3

```php
// Variáveis que estarão disponíveis
$youtubeData = [
    'subscriber_count' => '1.2M',
    'view_count' => '50M',
    'video_count' => '350',
    'is_live' => false,
    'live_stream_url' => null,
];
```

### RetroAchievements API

```php
// Variáveis que estarão disponíveis
$raData = [
    'username' => 'player123',
    'total_points' => 15000,
    'rank' => 500,
    'mastery_count' => 25,
    'recent_achievements' => [...],
];
```

## Referências

- Skill API-RA: `skills/API-RA-skill/SKILL.md`
- Skill API-YouTube: `skills/API-Youtube-skill/`
- Layout principal: `resources/views/components/layout.blade.php`
- Navbar: `resources/views/components/partials/navbar.blade.php`
- CSS global: `resources/css/app.css`
