<?php

namespace App\Filament\Resources\PeriodeDaftarResource\RelationManagers;

use App\Models\Pendaftar;
use App\Models\PeriodeDaftar;
use App\Models\StatusPendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ContentTabPosition;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class PendaftarsRelationManager extends RelationManager
{
    protected static string $relationship = 'pendaftars';
    protected static ?string $title = 'Baru';
    protected static ?string $recordTitleAttribute = 'id_periode';

    public static function getBadge(Model $record, string $pageClass): ?string
    {
        $count = $record->pendaftars()->whereHas('statuss', fn(Builder $query) => $query->where('status', 'pending'))->count();
        return $count > 0 ? (string) $count : 0;
    }

    public static function getBadgeColor(Model $ownerRecord, string $pageClass): ?string
    {
        return $ownerRecord->pendaftars()->whereHas('statuss', fn(Builder $query) => $query->where('status', 'pending'))->count() > 5 ? 'danger' : 'warning';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ToggleButtons::make('statuss.status')
                    ->required()
                    ->label('Status Pendaftaran')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Pendaftar')
            ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('statuss', fn(Builder $query) => $query->where('status', 'pending')))
            ->recordTitleAttribute('id_periode')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('nisn'),
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('tempat_lahir'),
                Tables\Columns\TextColumn::make('tgl_lahir'),
                Tables\Columns\TextColumn::make('no_hp'),
                Tables\Columns\TextColumn::make('statuss.status')
                    ->badge()
                    ->colors([
                        'success' => 'diterima',
                        'danger' => 'ditolak',
                        'warning' => 'pending',
                    ]),
            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                    ->label("Detail"),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function getContentTabPosition(): ?ContentTabPosition
    {
        return ContentTabPosition::After;
    }
}
