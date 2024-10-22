<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Pages;

use App\Filament\Resources\PeriodeDaftarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeriodeDaftar extends CreateRecord
{
    protected static string $resource = PeriodeDaftarResource::class;
    protected static ?string $title = "Buat PPDB Baru";
    protected static bool $canCreateAnother = false;
}