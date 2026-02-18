<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    
    protected static ?string $navigationIcon = 'heroicon-m-check-badge';
    protected static ?string $navigationGroup = 'Brand & Product';
    // protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Produk')
                ->schema([
                    Select::make('partner_id')
                        ->relationship('partner', 'name')
                        ->label('Brand / Partner')
                        ->required(),
                    TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->required()
                        ->unique(Product::class, 'slug', ignoreRecord: true)
                        ->dehydrated()
                        ->helperText('URL otomatis mengikuti nama produk'),
                    FileUpload::make('image_path')
                        ->image()
                        ->directory('products')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->previewable(true)
                        ->maxSize(2048)
                        ->openable()
                        ->label('Foto Produk'),
                    RichEditor::make('description')
                        ->columnSpanFull(),
                ])->columns(2),

                Section::make('Spesifikasi Teknis (Otomatis Jadi Tabel)')
                ->schema([
                    // Fitur Unggulan (List)
                    Repeater::make('features')
                        ->label('Keunggulan Utama (Bullet Points)')
                        ->simple(TextInput::make('point'))
                        ->defaultItems(3),

                    // Tabel Spesifikasi (Baris per kegelapan)
                    Repeater::make('specifications')
                        ->label('Data Tabel Spesifikasi (VLT, IRR, dll)')
                        ->schema([
                            TextInput::make('type')
                                ->label('Tipe (ex: 40%)')
                                ->required(),
                            TextInput::make('vlt')
                                ->label('VLT % (Terang)')
                                ->numeric(),
                            TextInput::make('irr')
                                ->label('IRR % (Panas)')
                                ->numeric(),
                            TextInput::make('uvr')
                                ->label('UVR % (Anti UV)')
                                ->numeric(),
                            TextInput::make('tser')
                                ->label('TSER % (Energi)')
                                ->numeric(),
                            TextInput::make('glare_reduction')
                                ->label('Glare Red %')
                                ->placeholder('Contoh: 90%')
                                ->numeric(),
                        ])
                        ->columns(6)
                        ->defaultItems(3)
                        ->reorderableWithButtons(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Foto')
                    ->rounded(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('partner.name')
                    ->label('Brand')
                    ->badge()
                    ->color('info')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('partner')
                    ->relationship('partner', 'name')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
