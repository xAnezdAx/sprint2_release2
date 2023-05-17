<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'julian',
            'email' => 'jullopezm@unal.edu.co',
            'password' => bcrypt('admin123'),
        ])->assignRole('admin');
        User::create([
            'name' => 'juana',
            'email' => 'juana@unal.edu.co',
            'password' => bcrypt('admin123'),
        ])->assignRole('user');
        
    }
}
