<?php

namespace App\Filament\Resources\DataCalonSiswaResource\Pages;

use App\Filament\Resources\DataCalonSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataCalonSiswa extends CreateRecord
{
    protected static string $resource = DataCalonSiswaResource::class;
    protected static ?string $title = "Buat Data Calon Siswa";

    public function getBreadcrumb(): string
    {
        return 'Buat';
    }

    public function getCreateFormAction(): Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Buat')
            ->icon('heroicon-o-plus');
    }

    public function getCancelFormAction(): Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }
}
