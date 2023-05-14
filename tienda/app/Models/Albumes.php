<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albumes extends Model
{
    use HasFactory;
    public function artista()
    {
        return $this->belongsTo(Artistas::class, 'id_artista');
    }
}
