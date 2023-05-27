<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('datos')->insert([
            'nombre' => 'John',
            'apellido' => 'Doe',
            'email' => 'johndoe@example.com',
            'telefono' => '123456789',
            'direccion' => '123 Calle Principal',
            'ciudad' => 'Ciudad Ejemplo',
            'pais' => 'País Ejemplo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('datos')->insert([
            'nombre' => 'Jane',
            'apellido' => 'Smith',
            'email' => 'janesmith@example.com',
            'telefono' => '987654321',
            'direccion' => '456 Calle Secundaria',
            'ciudad' => 'Otra Ciudad',
            'pais' => 'Otro País',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('datos')->insert([
            'nombre' => 'Alice',
            'apellido' => 'Johnson',
            'email' => 'alicejohnson@example.com',
            'telefono' => '555555555',
            'direccion' => '789 Calle Terciaria',
            'ciudad' => 'Tercera Ciudad',
            'pais' => 'Tercer País',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
