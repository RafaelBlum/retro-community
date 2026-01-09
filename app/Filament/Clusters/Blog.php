<?php

namespace App\Filament\Clusters;

use App\Models\Post;
use Filament\Clusters\Cluster;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Cache;

class Blog extends Cluster
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $title = "Blog";

    public static function getNavigationBadge(): ?string
    {
        return Cache::remember('blog_posts_count', 60, function (){
            return (string) Post::count();
        });
    }

    protected static string | Htmlable | null $navigationBadgeTooltip = "Total de postagens";}
