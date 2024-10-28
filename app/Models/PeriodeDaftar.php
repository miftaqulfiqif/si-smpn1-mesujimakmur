<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodeDaftar extends Model
{
    protected $table = 'periode_daftars';

    protected $fillable = [
        'editor',
        'name',
        'start_date',
        'end_date',
        'status',
        'jml_pendaftar',
        'kuota',
    ];

    public function editor()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'id_periode');
    }
}
