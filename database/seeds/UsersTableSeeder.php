<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;  // Asegúrate de importar la clase Str

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('users')->insert([
            'name' => 'Super Administrador',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('SuperAdmin$'), // Asegúrate de usar un password seguro
            'remember_token' => Str::random(60), // Cambiado a Str::random()
        ]);
    }
}
