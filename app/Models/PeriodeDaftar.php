<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeriodeDaftar extends Model
{
    protected $fillable = [
        'nama',
        'start_date',
        'end_date',
        'jml_pendaftar',
        'kuota',
        'status',
    ];

    public function dokumen(): HasMany
    {
        return $this->hasMany(DokumenPendaftar::class, 'id_periode');
    }

    public function pendaftars(): HasMany
    {
        return $this->hasMany(Pendaftar::class, 'id_periode');
    }
}
