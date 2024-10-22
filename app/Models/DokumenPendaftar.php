<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPendaftar extends Model
{
    protected $fillable = [
        'id_periode',
        'nama',
        'isRequired',
    ];
}