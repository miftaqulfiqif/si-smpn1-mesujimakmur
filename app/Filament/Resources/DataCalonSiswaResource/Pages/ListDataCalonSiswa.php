<?php

namespace App\Filament\Resources\DataCalonSiswaResource\Pages;

use App\Filament\Resources\DataCalonSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataCalonSiswas extends ListRecords
{
    protected static string $resource = DataCalonSiswaResource::class;
    protected static ?string $title = 'Daftar calon siswa';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Data Calon Siswa')
                ->icon('heroicon-o-plus')
                ->color('info'),
        ];
    }
}