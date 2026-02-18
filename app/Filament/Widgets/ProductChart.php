<?php

namespace App\Filament\Widgets;

use App\Models\Partner;
use Filament\Widgets\ChartWidget;

class ProductChart extends ChartWidget
{

    protected static ?string $heading = 'Produk per Brand';
    protected static ?int $sort = 4;
    protected static string $color = 'info';

    protected function getData(): array
    {
        $data = Partner::withCount('products')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => $data->pluck('products_count')->toArray(),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
