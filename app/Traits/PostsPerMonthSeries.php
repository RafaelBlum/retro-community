<?php

namespace App\Traits;

use App\Models\Post;
use Flowframe\Trend\Trend;

trait PostsPerMonthSeries
{
    protected function getChartData(): array
    {
        $test =  Trend::model(Post::class)->between(now()->subYear(), now())->perMonth()->count();
        //dd($test);

        $postsMonth = Post::selectRaw('
        DATE_FORMAT(published_at, "%Y-%m") as month,
        COUNT(*) as post_count
    ')
            ->whereNotNull('published_at') // Exclui posts com data NULL
            ->groupByRaw('DATE_FORMAT(published_at, "%Y-%m")')
            ->orderByRaw('DATE_FORMAT(published_at, "%Y-%m")')
            ->get();


        //$postMonth = Post::selectRaw('');

        //dd($postsMonth, $postsMonth->pluck('total'));

        return [
//            'data' => $postsMonth->pluck('post_count'),
//            'labels' => $postsMonth->pluck('month'),
              'data' => $test->pluck('aggregate'),
              'labels' => $test->pluck('date')
        ];
    }
}
