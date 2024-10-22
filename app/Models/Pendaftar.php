<?php

namespace App\Models;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftars';

    protected $fillable = [
        'id_user',
        'id_periode',
        'nama',
        'email',
        'no_hp',
        'nik',
        'nisn',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'jml_saudara',
        'anak_ke',
        'kebutuhan_khusus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeDaftar::class, 'id_periode');
    }

    public function statuss()
    {
        return $this->hasOne(StatusPendaftaran::class, 'id_pendaftar');
    }
}
