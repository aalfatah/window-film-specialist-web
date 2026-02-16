<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Layanan';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Service Detail')
                    ->tabs([
                        // TAB 1: INFORMASI UTAMA
                        Tab::make('Informasi Utama')
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                                    
                                TextInput::make('name')
                                    ->label('Nama Layanan')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                    
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                    
                                TextInput::make('subtitle')
                                    ->label('Sub Judul')
                                    ->placeholder('Contoh: Solusi tolak panas terbaik...'),
                                    
                                FileUpload::make('image')
                                    ->label('Foto Utama')
                                    ->image()
                                    ->directory('services'),
                                    
                                RichEditor::make('description')
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                        'redo',
                                        'undo',
                                    ])
                                    ->label('Deskripsi'),
                            ]),

                        // TAB 2: SPESIFIKASI & HARGA
                       Tab::make('Spesifikasi & Harga')
                            ->schema([
                                TextInput::make('price')
                                    ->label('Harga Mulai')
                                    ->numeric()
                                    ->prefix('Rp'),
                                    
                                TextInput::make('service_type')
                                    ->label('Tipe Layanan')
                                    ->default('Workshop & Home Service'),
                                    
                               Toggle::make('is_featured')
                                    ->label('Tampilkan di Beranda')
                                    ->default(false),
                            ]),

                        // TAB 3: PAKET PRODUK (REPEATER)
                        Tab::make('Paket Produk')
                            ->schema([
                                Repeater::make('packages')
                                    ->relationship('packages')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Nama Paket')
                                            ->required()
                                            ->placeholder('e.g. Carbon Series')
                                            ->validationMessages([
                                                'required' => 'Nama tidak boleh kosong'
                                            ]),
                                            
                                        TextInput::make('price_label')
                                            ->label('Label Harga')
                                            ->required()
                                            ->placeholder('e.g. Mulai dari Rp 600k')
                                            ->validationMessages([
                                                'required' => 'Harga harus diisi'
                                            ]),
                                            
                                        Textarea::make('description')
                                            ->label('Keterangan Singkat')
                                            ->rows(2)
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Berikan deskripsi singkat untuk paket ini'
                                            ]),
                                            
                                        TagsInput::make('features')
                                            ->label('Fitur / Keunggulan')
                                            ->placeholder('Ketik dan tekan Enter...')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Min. masukan satu fitur unggulan'
                                            ]),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->grid(2)
                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Paket Baru'),
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Layanan'),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),

                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable()
                    ->label('Harga'),
                    
                Tables\Columns\ToggleColumn::make('is_featured')
                    ->label('Featured'),
            ])
            ->filters([])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}