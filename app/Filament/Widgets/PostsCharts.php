<?php

namespace App\Filament\Widgets;

use App\Traits\ChannelsPerMonth;
use App\Traits\PostsPerMonthSeries;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class PostsCharts extends ApexChartWidget
{

    use PostsPerMonthSeries;
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'postsCharts';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Grafico de postagens';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $chartData = $this->getChartData();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'BasicBarChart',
                    'data' => $chartData['data'],
                ],
            ],
            'xaxis' => [
                'categories' => $chartData['labels'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }
}
