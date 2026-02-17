<?php

namespace App\Filament\Resources\AboutPageResource\Pages;

use App\Filament\Resources\AboutPageResource;
use Filament\Actions;
use App\Models\AboutPage;
use Filament\Resources\Pages\ListRecords;

class ListAboutPages extends ListRecords
{
    protected static string $resource = AboutPageResource::class;

    public function mount(): void
    {
        // Cek apakah sudah ada data di tabel about_pages
        $existingPage = AboutPage::first();

        if ($existingPage) {
            redirect()->to(AboutPageResource::getUrl('edit', ['record' => $existingPage]));
        } else {
            redirect()->to(AboutPageResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
