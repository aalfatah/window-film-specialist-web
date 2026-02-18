<?php

namespace App\Filament\Widgets;

use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Brand', Partner::count())
                ->description('Brand Partner Aktif')
                ->descriptionIcon('heroicon-m-building-office')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            
            Stat::make('Koleksi Produk', Product::count())
                ->description('Varian Kaca Film')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->chart([15, 4, 10, 2, 12, 4, 11])
                ->color('info'),

            Stat::make('Portofolio', Portfolio::count())
                ->description('Proyek Selesai')
                ->descriptionIcon('heroicon-m-check-badge')
                ->chart([3, 10, 5, 12, 7, 15, 20])
                ->color('warning'),

            Stat::make('Testimonial', Testimonial::where('is_visible', true)->count())
                ->description('Ulasan Pelanggan')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->chart([6, 4, 10, 2, 8, 4, 20])
                ->color('primary'),
        ];
    }
}
