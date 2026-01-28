<?php

namespace App\Filament\Widgets;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Layanan', Service::count())
                ->description('Jenis jasa yang ditawarkan')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('primary'),
            Stat::make('Total Portofolio', Portfolio::count())
                ->description('Proyek yang telah diselesaikan')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
            Stat::make('Total Pengaturan', Setting::count())
                ->description('Pengaturan web yang tersedia')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('warning'),
        ];
    }
}
