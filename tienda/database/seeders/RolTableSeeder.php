<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolTableSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);

        Permission::create(['name' => 'artistasAdmin'])->syncRoles([$role1]);
        Permission::create(['name' => 'albumesAdmin'])->syncRoles([$role1]);
        Permission::create(['name' => 'artistas'])->syncRoles([$role2]);
        Permission::create(['name' => 'albumes'])->syncRoles([$role2]);

        Permission::create(['name' => 'roles'])->syncRoles([$role1]);


    }
}
