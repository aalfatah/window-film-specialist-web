<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Filament\Resources\PortfolioResource\RelationManagers;
use App\Models\Portfolio;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Forms\Components\RichEditor;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'Portofolio';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxlength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->label('Judul Project'),

                TextInput::make('slug')
                    ->required()
                    ->readonly()
                    ->unique(ignoreRecord: true)
                    ->helperText('Terisi otomatis berdasarkan judul project.'),

                Select::make('service_id')
                    ->relationship('service', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Kategori Layanan'),

                DatePicker::make('completion_date')
                    ->label('Tanggal Selesai Project')
                    ->default(now()),

                FileUpload::make('image_path')
                    ->image()
                    ->directory('portfolios')
                    ->imageEditor()
                    ->required()
                    ->columnSpanFull()
                    ->label('Gambar Hasil Pengerjaan'),

                RichEditor::make('description')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'numberList',
                        'link',
                        'redo',
                        'undo',
                    ])
                    ->label('Catatan Pengerjaan'),

                Toggle::make('is_active')
                    ->default(true)
                    ->label('Publikasikan?'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->square()
                    ->size(40)
                    ->disk('public')
                    ->visibility('public')
                    ->extraImgAttributes(['loading' => 'lazy', 'class'  => 'object-cover shadow-sm'])
                    ->label('Foto'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->weight('bold'),

                // Menampilkan nama layanan, bukan ID
                Tables\Columns\TextColumn::make('service.name')
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->label('Kategori'),

                Tables\Columns\TextColumn::make('completion_date')
                    ->date()
                    ->sortable()
                    ->label('Tanggal'),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
