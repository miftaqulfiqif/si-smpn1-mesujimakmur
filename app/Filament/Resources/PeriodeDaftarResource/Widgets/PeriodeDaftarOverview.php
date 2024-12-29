<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PeriodeDaftarOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Periode Daftar Sekarang', \App\Models\PeriodeDaftar::where('status', 1)->count()),
            Stat::make('Periode Daftar Tidak Aktif', \App\Models\PeriodeDaftar::where('status', 0)->count()),
        ];
    }
}
