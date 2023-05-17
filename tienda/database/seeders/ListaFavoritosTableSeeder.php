<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListaFavoritosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('lista_favoritos')->insert([
            'id_album' => 6,
            'id_favoritos' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lista_favoritos')->insert([
            'id_album' => 7,
            'id_favoritos' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('lista_favoritos')->insert([
            'id_album' => 8,
            'id_favoritos' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
