<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use model\Favoritos;

class FavoritosTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        // Insertar primer registro
        DB::table('favoritos')->insert([
            'id_usuario' => 2,
            'nombre_lista' => 'Lista de Favoritos 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insertar segundo registro
        DB::table('favoritos')->insert([
            'id_usuario' => 2,
            'nombre_lista' => 'Lista de Favoritos 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
