<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected static ?string $title = "Buat Admin";

    protected static bool $canCreateAnother = false;

    // Remove create another

    protected function afterCreate(): void
    {
        $this->record->assignRole('admin');
    }
}
