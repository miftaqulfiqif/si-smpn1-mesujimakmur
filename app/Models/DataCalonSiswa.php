<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCalonSiswa extends Model
{
    protected $table = 'data_calon_siswas';
    protected $fillable = [
        'id_user',
        'id_periode',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'nik',
        'asal_sekolah',
        'alamat',
        'tinggi_badan',
        'berat_badan',
        'kegemaran',
        'penerima_kip',
        'no_kip',
        'zonasi',
        'foto',
        'notelp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function dataOrangtua()
    {
        return $this->belongsTo(DataOrangtua::class, 'id_data_calon_siswa');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeDaftar::class, 'id_periode');
    }

    public function dokumenCalonSiswa()
    {
        return $this->hasMany(DokumenCalonSiswa::class, 'id_data_calon_siswa');
    }

    public function statusPendaftaran()
    {
        return $this->hasOne(StatusPendaftaran::class, 'id_data_calon_siswa');
    }
}