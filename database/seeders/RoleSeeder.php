<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctor = Role::create(['name' => 'Doctor']);

        $reception = Role::create(['name' => 'Reception']);

        $doctor->givePermissionTo([
            'create-role',
            'update-role',
            'delete-role',
            'create-reception',
            'update-reception',
            'delete-reception',
        ]);

        $reception->givePermissionTo([
            'create-reception',
            'update-reception',
            'delete-reception',
        ]);

    }
}
