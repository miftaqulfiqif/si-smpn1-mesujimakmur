<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Pages;

use App\Filament\Resources\PeriodeDaftarResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListPeriodeDaftars extends ListRecords
{
    protected static string $resource = PeriodeDaftarResource::class;

    protected static ?string $title = 'Periode Pendaftaran';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->color('info')->icon('heroicon-o-plus')->label('Tambah Periode Baru'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make('Semua'),
            'Aktif' => Tab::make('Aktif'),
            'Tidak Aktif' => Tab::make('Tidak Aktif'),
        ];
    }
}
