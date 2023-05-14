<?php

namespace Database\Seeders;

use App\Models\Albumes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {        
        $this->call(ArtistasTableSeeder::class);
        $this->call(AlbumesTableSeeder::class);
        
        $this->call(RolTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
