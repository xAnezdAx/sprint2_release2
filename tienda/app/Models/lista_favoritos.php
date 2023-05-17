<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista_Favoritos extends Model
{
    use HasFactory;

    protected $table = 'lista_favoritos'; // Nombre de la tabla

    public function album()
    {
        return $this->belongsTo(Albumes::class, 'id_album');
    }

    public function favoritos()
    {
        return $this->belongsTo(favoritos::class, 'id_favoritos');
    }
}

