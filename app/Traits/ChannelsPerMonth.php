<?php

namespace App\Traits;

use App\Models\Channel;
use App\Models\Post;

trait ChannelsPerMonth
{
    protected function getChartData(): array
    {

        $postsMonth = Channel::selectRaw('
        DATE_FORMAT(created_at, "%Y-%m") as month,
        COUNT(*) as channel_count
    ')
            ->whereNotNull('created_at') // Exclui posts com data NULL
            ->groupByRaw('DATE_FORMAT(created_at, "%Y-%m")')
            ->orderByRaw('DATE_FORMAT(created_at, "%Y-%m")')
            ->get();

        return [
            'data' => $postsMonth->pluck('channel_count'),
            'labels' => $postsMonth->pluck('month'),
        ];
    }
}
