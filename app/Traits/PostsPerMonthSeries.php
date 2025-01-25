<?php

namespace App\Traits;

trait PostsPerMonthSeries
{
    protected function getChartData(): array
    {
        return [
            'data' => [
                10, 12, 20, 28,
                35, 42, 50, 45,
                37, 23, 15, 8,
            ],
            'labels' => [
                '2024-01', '2024-02', '2024-03', '2024-04',
                '2024-05', '2024-06', '2024-07', '2024-08',
                '2024-09', '2024-10', '2024-11', '2024-12',
            ],
        ];
    }
}
