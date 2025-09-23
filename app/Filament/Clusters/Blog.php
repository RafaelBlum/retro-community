<?php

namespace App\Filament\Clusters;

use App\Models\Post;
use Filament\Clusters\Cluster;

class Blog extends Cluster
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $title = "Blog";

    public static function getNavigationBadge(): ?string
    {
        $posts = Post::all();
        return $posts->count();
    }

    protected static ?string $navigationBadgeTooltip = "Total de postagens";
}
