<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Artistas;
use Faker\Factory as Faker;

//se debe instalar en el proyecto: composer require fakerphp/faker
// composer require --dev fakerphp/faker:dev-main es_ES

class ArtistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $artistas = [
            'The Beatles',
            'Queen',
            'Led Zeppelin',
            'Pink Floyd',
            'AC/DC',
            'Rolling Stones',
            'Guns N Roses',
            'Metallica',
            'Nirvana',
            'Red Hot Chili Peppers'
        ];

        foreach ($artistas as $artista) {
            Artistas::create([
                'nombre' => $artista,
                'descripcion' => $faker->paragraph(3, true)
            ]);
        }
        
    }
}
