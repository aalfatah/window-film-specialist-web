<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Filament\Resources\AboutPageResource\RelationManagers;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profil Perusahaan')
                    ->schema([
                        TextInput::make('heading')
                            ->label('Judul Utama')
                            ->default('Profil Perusahaan')
                            ->required(),
                        TextInput::make('subheading')
                            ->label('Sub Judul')
                            ->placeholder('Contoh: CV Fatih Jaya Film adalah spesialis...')
                            ->columnSpanFull(),
                        RichEditor::make('description')
                            ->label('Deskripsi Perusahaan')
                            ->toolbarButtons([
                                'bold', 'italic', 'link', 'bulletList', 'orderedList', 'redo', 'undo'
                            ])
                            ->columnSpanFull(),
                        FileUpload::make('main_image')
                            ->label('Gambar Utama (Mobil)')
                            ->image()
                            ->directory('about-images')
                            ->columnSpanFull(),
                    ]),

                // Tab 2: Visi & Misi
                Section::make('Visi & Misi')
                    ->schema([
                        RichEditor::make('vision')
                            ->label('Visi')
                            ->toolbarButtons(['bold', 'italic'])
                            ->columnSpanFull(),
                        RichEditor::make('mission')
                            ->label('Misi')
                            ->helperText('Gunakan fitur bullet list untuk poin-poin misi.')
                            ->columnSpanFull(),
                    ]),

                // Tab 3: Mengapa Kami (Values)
                Section::make('Mengapa Memilih Kami?')
                    ->schema([
                        Repeater::make('values')
                            ->label('Daftar Keunggulan')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Keunggulan')
                                    ->required(),
                                Textarea::make('description')
                                    ->label('Deskripsi Singkat')
                                    ->rows(2)
                                    ->required(),
                                FileUpload::make('icon')
                                    ->label('Icon (Format SVG/PNG Transparan)')
                                    ->image()
                                    ->directory('values-icons'), 
                            ])
                            ->columns(1)
                            ->grid(2)
                            ->defaultItems(4)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
