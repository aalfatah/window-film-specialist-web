<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Testimonial;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use Dom\Text;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Testimonial';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->description('Masukan data client yang memberikan review.')
                    ->schema([
                        Grid::make(2)
                            ->schema([    
                                TextInput::make('name')
                                    ->label('Nama Klien')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('profession')
                                    ->label('Jabatan / Instansi')
                                    ->placeholder('Contoh: Manager Marketing')
                                    ->maxLength(255),   
                            ]),

                        FileUpload::make('avatar')
                        ->label('Foto Profil')
                        ->image()
                        ->avatar()
                        ->directory('testimonials')
                        ->imageEditor(),
                    ]),

                Section::make('Isi Testimonial')
                    ->description('Masukan testimonial atau review dari klien.')
                    ->schema([
                        Select::make('rating')
                            ->label('Rating')
                            ->options([
                                1 => '⭐ (Sangat Buruk)',
                                2 => '⭐⭐ (Buruk)',
                                3 => '⭐⭐⭐ (Cukup)',
                                4 => '⭐⭐⭐⭐ (Sangat Baik)',
                                5 => '⭐⭐⭐⭐⭐ (Sempurna)',
                            ])
                            ->default(5)
                            ->required(),
                        RichEditor::make('content')
                            ->label('Testimonial')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'bulletList',
                                'orderedList',
                                'link',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull(),
                        Toggle::make('is_visible')
                            ->label('Tampilkan di Halaman Utama?')
                            ->helperText('Jika diaktifkan, testimonial ini akan ditampilkan di halaman utama website.')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->label('Foto')
                    ->circular()
                    ->size(50),
                TextColumn::make('name')
                    ->label('Nama Klien')
                    ->searchable()
                    ->description(fn (Testimonial $record): string => $record->profession ?? '-')
                    ->sortable(),
                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn (int $state): string => str_repeat('⭐', $state))
                    ->sortable(),
                ToggleColumn::make('is_visible')
                    ->label('Tampilkan')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
