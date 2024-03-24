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
        $admin = Role::create(['name' => 'Admin']);

        $editor = Role::create(['name' => 'Editor']);

        $admin->givePermissionTo([
            'create-role',
            'update-role',
            'delete-role',
            'create-user',
            'update-user',
            'delete-user',
        ]);

        $editor->givePermissionTo([
            'create-user',
            'update-user',
            'delete-user',
        ]);

    }
}
