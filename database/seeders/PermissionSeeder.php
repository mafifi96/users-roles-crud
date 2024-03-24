<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role',
            'update-role',
            'delete-role',
            'create-user',
            'update-user',
            'delete-user',
         ];

         collect($permissions)->each(function($permission)
         {
            Permission::create(['name' => $permission]);
         });

    }
}
