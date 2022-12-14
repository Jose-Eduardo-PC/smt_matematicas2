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
            'name' => 'José Eduardo Patiño',
            'email' => 'jose777@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ])->assignRole('SuperAdministrador');

        //crea 50 usuarios
        User::factory()->count(25)->create()->each(function (User $user) {
            $user->assignRole('Usuario');
        });
    }
}
