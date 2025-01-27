<?php

namespace App\Traits;

use App\Models\Post;
use Flowframe\Trend\Trend;

trait PostsPerMonthSeries
{
    protected function getChartData(): array
    {
        $test =  Trend::model(Post::class)->between(now()->subYear(), now())->perMonth()->count();

        return [
              'data' => $test->pluck('aggregate'),
              'labels' => $test->pluck('date')
        ];
    }
}
