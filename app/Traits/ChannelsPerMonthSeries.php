<?php

namespace App\Traits;

use App\Models\Channel;
use App\Models\Post;

trait ChannelsPerMonthSeries
{
    protected function getChartData(): array
    {

        $postsMonth = Channel::selectRaw('
        DATE_FORMAT(created_at, "%Y-%m") as month,
        COUNT(*) as channel_count
    ')
            ->whereNotNull('created_at') // Exclui posts com data NULL
            //->whereBetween('created_at', [now()->subMonths(6)->startOfMonth(), now()->endOfMonth()])
            ->groupByRaw('DATE_FORMAT(created_at, "%Y-%m")')
            ->orderByRaw('DATE_FORMAT(created_at, "%Y-%m")')
            ->get();

        return [
            'data' => $postsMonth->pluck('channel_count'),
            'labels' => $postsMonth->pluck('month'),
        ];
    }
}
