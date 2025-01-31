<?php

namespace App\Filament\Widgets;

use App\Traits\ChannelsPerMonthSeries;
use App\Traits\PostsPerMonthSeries;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class ChartJsPostsRating extends ChartWidget
{
    protected static ?string $heading = 'Canais criados por mês (ChartJS)';
    protected static ?int $sort = 2;

    use ChannelsPerMonthSeries;


    protected function getData(): array
    {

        $chartData = $this->getChartData();
        return [
            'datasets' => [
                [
                    'label' => 'Canais criados por mês',
                    'data' => $chartData['data'],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
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
          'indexAxis' => 'y',
        ];
    }

}
