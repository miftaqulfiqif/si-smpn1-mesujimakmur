<?php

namespace App\Filament\Resources\AppLogoResource\Pages;

use App\Filament\Resources\AppLogoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppLogos extends ListRecords
{
    protected static string $resource = AppLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
