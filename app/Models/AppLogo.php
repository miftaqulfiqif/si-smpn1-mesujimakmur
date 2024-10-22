<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppLogo extends Model
{
    protected $fillable = [
        'editor',
        'image_url',
        'alt_text',
        'type',
    ];
    public function editor()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
