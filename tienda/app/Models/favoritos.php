<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favoritos extends Model
{
    use HasFactory;

    protected $table = 'favoritos';

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
