<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Pages;

use App\Filament\Resources\PeriodeDaftarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodeDaftar extends EditRecord
{
    protected static string $resource = PeriodeDaftarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
