<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Pages;

use App\Filament\Resources\PeriodeDaftarResource;
use App\Filament\Resources\PeriodeDaftarResource\Widgets\PendaftarWidget;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewPeriodeDaftar extends ViewRecord
{
    protected static string $resource = PeriodeDaftarResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }


    public function getTitle(): string|Htmlable
    {
        return $this->record->nama;
    }
}
