<?php

namespace App\Filament\Resources\AppLogoResource\Pages;

use App\Filament\Resources\AppLogoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppLogo extends EditRecord
{
    protected static string $resource = AppLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
