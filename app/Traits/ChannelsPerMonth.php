<?php

namespace App\Traits;

trait ChannelsPerMonth
{
    protected function getChartData(): array
    {
        return [
            'data' => [50, 30, 18, 5, 13],
            'labels' => ['⭐⭐⭐⭐⭐', '⭐⭐⭐⭐', '⭐⭐⭐', '⭐⭐', '⭐'],
        ];
    }
}
