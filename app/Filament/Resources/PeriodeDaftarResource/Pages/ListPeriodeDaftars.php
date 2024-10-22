<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Pages;

use App\Filament\Resources\PeriodeDaftarResource;
use App\Models\PeriodeDaftar;
use Filament\Actions;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListPeriodeDaftars extends ListRecords
{
    use ExposesTableToWidgets;
    protected static string $resource = PeriodeDaftarResource::class;
    protected static ?string $title = "Periode Daftar";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Periode Pendaftaran')
                ->icon('heroicon-s-plus'),
        ];
    }
}
