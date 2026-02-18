<?php

namespace App\Filament\Widgets;

use App\Models\Portfolio;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPortfolios extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Portofolio Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(Portfolio::query()->latest()->limit(5))
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Foto')
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Proyek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Layanan')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('completion_date')
                    ->label('Tanggal Selesai')
                    ->date('d M Y'),
            ]);
    }
}
