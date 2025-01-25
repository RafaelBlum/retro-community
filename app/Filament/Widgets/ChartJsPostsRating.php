<?php

namespace App\Filament\Widgets;

use App\Traits\ChannelsPerMonth;
use App\Traits\PostsPerMonthSeries;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class ChartJsPostsRating extends ChartWidget
{
    protected static ?string $heading = 'Grafico ChartJS';
    protected static ?int $sort = 2;

    use ChannelsPerMonth;


    protected function getData(): array
    {

        $chartData = $this->getChartData();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $chartData['data'],
                ],
            ],
            'labels' => $chartData['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array|RawJs|null
    {
        return [
          'indexAxis' => 'y'
        ];
    }

}
