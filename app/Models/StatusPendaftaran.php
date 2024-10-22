<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StatusPendaftaran extends Model
{
    protected $table = 'status_pendaftarans';

    protected $fillable = [
        'id_pendaftar',
        'status',
        'catatan',
    ];

    public function pendaftaran(): HasOne
    {
        return $this->hasOne(Pendaftar::class, 'id', 'id_pendaftar');
    }
}