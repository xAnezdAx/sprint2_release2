<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Albumes;

class AlbumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los IDs de artistas existentes en la tabla 'artistas'
        $artistasIds = DB::table('artistas')->pluck('id')->toArray();
        
        $titulos = [
            'The Dark Side of the Moon',
            'Nevermind',
            'The Beatles (White Album)',
            'Thriller',
            'Appetite for Destruction',
            'Led Zeppelin IV',
            'Blood Sugar Sex Magik',
            'Rumours',
            'Back in Black',
            'Ten'
        ];
        $descripciones = [
            'El octavo álbum de estudio de Pink Floyd.',
            'El segundo álbum de estudio de Nirvana.',
            'El noveno álbum de estudio de The Beatles.',
            'El sexto álbum de estudio de Michael Jackson.',
            'El primer álbum de estudio de Guns N\' Roses.',
            'El cuarto álbum de estudio de Led Zeppelin.',
            'El quinto álbum de estudio de Red Hot Chili Peppers.',
            'El undécimo álbum de estudio de Fleetwood Mac.',
            'El séptimo álbum de estudio de AC/DC.',
            'El primer álbum de estudio de Pearl Jam.'
        ];
        
        // Crear 10 álbumes aleatorios
        for ($i = 1; $i <= 10; $i++) {
            $id_artista = $artistasIds[array_rand($artistasIds)];
            $titulo = $titulos[array_rand($titulos)];
            $descripcion = $descripciones[array_rand($descripciones)];
            $precio = rand(10, 50) . '.' . rand(0, 99);
            $foto = 'nombre-de-la-imagen.jpg';
            
            DB::table('albumes')->insert([
                'id_artista' => $id_artista,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'foto' => $foto,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

