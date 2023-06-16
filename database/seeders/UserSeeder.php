<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crea un super Usuario
        User::create([
            'name' => 'José Eduardo',
            'surname' => 'Patiño Cuellar',
            'email' => 'jose777@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'avatar' => ('public/imagenes/imgavatars//ejem.jpg'),
        ])->assignRole('SuperAdministrador');

        //crea 50 usuarios
        /*User::factory()->count(25)->create()->each(function (User $user) {
            $user->assignRole('Usuario');
        });*/
    }
}
