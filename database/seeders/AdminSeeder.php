<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::create([
            'name' => 'Mohamed Afifi',
            'email' => 'mafifi@gmail.com',
            'password' => Hash::make('mafifi')
        ]);


        $admin->assignRole('Admin');


        for($i=0; $i < 5; $i++)
        {
           $editor =  User::create([
                'name' => 'Editor Name'. ($i+1),
                'email' => $i."editor@gmail.com",
                'password' => Hash::make('password')
            ]);

            $editor->assignRole("Editor");
        }

    }
}
