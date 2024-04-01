<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DoctorReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $doctor = User::create([
            'name' => 'Mohamed Afifi',
            'email' => 'mafifi@gmail.com',
            'password' => Hash::make('mafifi')
        ]);


        $doctor->assignRole('Doctor');


        for($i=0; $i < 5; $i++)
        {
           $editor =  User::create([
                'name' => 'Reception Name'. ($i+1),
                'email' => $i."reception@gmail.com",
                'password' => Hash::make('password')
            ]);

            $editor->assignRole("Reception");
        }

    }
}
