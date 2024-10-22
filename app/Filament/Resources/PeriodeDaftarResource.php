<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftarReviewedResource\RelationManagers\PeriodeDaftarRelationManager;
use App\Filament\Resources\PeriodeDaftarResource\Pages;
use App\Filament\Resources\PeriodeDaftarResource\RelationManagers;
use App\Filament\Resources\PeriodeDaftarResource\RelationManagers\PendaftarsRelationManager;
use App\Models\PeriodeDaftar;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Components\Tab;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodeDaftarResource extends Resource
{
    protected static ?string $model = PeriodeDaftar::class;

    protected static ?string $navigationGroup = 'PPDB';
    protected static ?string $navigationLabel = 'Periode Daftar';
    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Periode Pendaftaran')
                    ->columns([
                        'sm' => 2,
                        'lg' => 3,
                    ])
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required(),
                        Forms\Components\DatePicker::make('start_date')
                            ->default(now())
                            ->label('Tanggal mulai')
                            ->required(),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal selesai')
                            ->required(),
                        Forms\Components\TextInput::make('kuota')
                            ->required()
                            ->numeric(),
                        Forms\Components\ToggleButtons::make('status')
                            ->options([
                                'aktif' => 'Aktif',
                                'tidak aktif' => 'Tidak aktif',
                            ])
                            ->icons([
                                'aktif' => 'heroicon-o-check-circle',
                                'tidak aktif' => 'heroicon-o-x-circle',
                            ])
                            ->colors([
                                'aktif' => 'success',
                                'tidak aktif' => 'danger',
                            ])
                            ->inline(true)
                            ->required(),
                        Hidden::make('jml_pendaftar')
                            ->default(0),
                    ]),
                Section::make('Dokumen Syarat Pendaftaran')
                    ->description('Dokumen pendaftaran yang diperlukan')
                    ->schema([
                        Repeater::make('Dokumen Pendaftaran')
                            ->columns(2)
                            ->relationship('dokumen')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->placeholder('Contoh: Scan PDF Ijazah Asli')
                                    ->required(),
                                Forms\Components\ToggleButtons::make('isRequired')
                                    ->options([
                                        1 => 'Ya',
                                        0 => 'Tidak',
                                    ])
                                    ->default('tidak')
                                    ->colors([
                                        'ya' => 'success',
                                        'tidak' => 'danger',
                                    ])
                                    ->inline(true)
                                    ->required(),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jml_pendaftar')
                    ->label('Jumlah Pendaftar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kuota')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 1,
                        'danger' => 0,
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            PendaftarsRelationManager::class,
            PeriodeDaftarRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeriodeDaftars::route('/'),
            'create' => Pages\CreatePeriodeDaftar::route('/create'),
            'view' => Pages\ViewPeriodeDaftar::route('/{record}'),
            'edit' => Pages\EditPeriodeDaftar::route('/{record}/edit'),
        ];
    }
}
