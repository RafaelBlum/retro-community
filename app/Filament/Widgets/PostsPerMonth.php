<?php
//
//namespace App\Filament\Widgets;
//
//use App\Traits\PostsPerMonthSeries;
//use Filament\Forms\Components\Select;
//use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
//
//class PostsPerMonth extends ApexChartWidget
//{
//
//    /**
//     * Plugin APEX
//     * [Apex Charts](https://filamentphp.com/plugins/leandrocfe-apex-charts)
//    */
//
//    use PostsPerMonthSeries;
//
//
//    protected static ?int $sort = 1;
//
//    protected static ?string $chartId = 'postsPerMonth';
//
//    protected static ?string $heading = 'Postagens criadas por mês';
//
//    protected static ?int $contentHeight = 293;
//
//
//    protected function getFormSchema(): array
//    {
//        return [
//            Select::make('chartType')->options([
//                'bar'=>'Barra',
//                'line'=>'Linha',
//                'area'=>'Área'
//            ])->default('bar')
//        ];
//    }
//
//    /**
//     * Chart options (series, labels, types, size, animations...)
//     * https://apexcharts.com/docs/options
//     *
//     * @return array
//     */
//    protected function getOptions(): array
//    {
//        $chartType = $this->filterFormData['chartType'];
//        $chartData = $this->getChartData();
//
//        return [
//            'chart' => [
//                'type' => $chartType,
//                'height' => 250,
//                'toolbar' => [
//                    'show' => false,
//                ],
//            ],
//            'series' => [
//                [
//                    'name' => 'Posts per month',
//                    'data' => $chartData['data'],
//                ],
//            ],
//            'xaxis' => [
//                'categories' => $chartData['labels'],
//                'axisBorder' => [
//                    'show' => false,
//                ],
//                'axisTicks' => [
//                    'show' => false,
//                ],
//                'labels' => [
//                    'style' => [
//                        'fontWeight' => 400,
//                        'fontFamily' => 'inherit',
//                    ],
//                ],
//            ],
//            'yaxis' => [
//                'labels' => [
//                    'style' => [
//                        'fontWeight' => 400,
//                        'fontFamily' => 'inherit',
//                    ],
//                ],
//            ],
//            'colors' => ['#f59e0b'],
//            'fill' => [
//                'type' => 'gradient',
//                'gradient' => [
//                    'shade' => 'dark',
//                    'type' => 'vertical',
//                    'shadeIntensity' => 0.5,
//                    'gradientToColors' => ['#fbbf24'],
//                    'inverseColors' => true,
//                    'opacityFrom' => 1,
//                    'opacityTo' => 1,
//                    'stops' => [0, 100],
//                ],
//            ],
//            'plotOptions' => [
//                'bar' => [
//                    'borderRadius' => 5,
//                    'borderRadiusApplication' => 'end',
//                ],
//            ],
//            'dataLabels' => [
//                'enabled' => true,
//            ],
//            'grid' => [
//                'show' => true,
//                'strokeDashArray' => 4,
//                'borderColor' => '#374151',
//                'xaxis' => [
//                    'lines' => [
//                        'show' => true,
//                    ],
//                ],
//                'yaxis' => [
//                    'lines' => [
//                        'show' => true,
//                    ],
//                ],
//            ],
//            'markers' => [
//                'size' => 0,
//            ],
//
//            'stroke' => [
//                'curve' => 'smooth',
//                'width' => 3,
//            ],
//
//            'tooltip' => [
//                'enabled' => true,
//            ],
//        ];
//    }
//}
