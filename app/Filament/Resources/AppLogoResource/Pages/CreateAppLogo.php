<?php

namespace App\Filament\Resources\AppLogoResource\Pages;

use App\Filament\Resources\AppLogoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateAppLogo extends CreateRecord
{
    protected static string $resource = AppLogoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['editor'] = Auth::id();
        return $data;
    }
}
