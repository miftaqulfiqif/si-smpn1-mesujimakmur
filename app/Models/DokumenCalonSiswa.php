<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenCalonSiswa extends Model
{
    protected $table = 'dokumen_calon_siswas';

    protected $fillable = [
        'id_data_calon_siswa',
        'id_dokumen',
        'path_url',
    ];

    public function dataCalonSiswa()
    {
        return $this->belongsTo(DataCalonSiswa::class, 'id');
    }

    public function dokumen(){
        return $this->belongsTo(Dokumen::class, 'id_dokumen');
    }
}
