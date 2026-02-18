<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ServiceChart extends ChartWidget
{
    protected static ?string $heading = 'Kategori Layanan';
    protected static ?int $sort = 5;
    protected static string $color = 'primary';

    protected function getData(): array
    {
        $data = Category::withCount('services')->get();

        return [            
            'datasets' => [
                [
                    'label' => 'Total Layanan',
                    'data' => $data->pluck('services_count')->toArray(),
                    'backgroundColor' => ['#4ade80', '#fbbf24', '#f87171', '#60a5fa'],
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'radius' => '80%',
            'cutout' => '60%',
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                    'labels' => [
                        'usePointStyle' => true,
                    ],
                ],
            ],
        ];
    }

    protected function getExtraAttributes(): array
    {
        return [
            'style' => 'max-height: 200px;',
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
