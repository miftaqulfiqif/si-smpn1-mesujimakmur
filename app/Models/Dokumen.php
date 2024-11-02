<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $fillable = [
        'id_periode',
        'nama',
        'is_required',
    ];

    public function periode()
    {
        return $this->belongsTo(PeriodeDaftar::class, 'id_periode');
    }
}
