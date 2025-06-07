<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class CreateRoles extends Migration
{

    public function up()
    {
 
        $role1 = Role::create(['name' => 'superadmin']);
        $role2 = Role::create(['name' => 'usuario']);
        $role3 = Role::create(['name' => 'adminusuario']);
        $role4 = Role::create(['name' => 'tecnico']);
        $role5 = Role::create(['name' => 'admintecnico']);

        DB::table('users')->insert([
            'name' => 'Super Administrador',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('SuperAdmin$'), // Asegúrate de usar un password seguro
            'remember_token' => Str::random(60), // Cambiado a Str::random()
        ]);

        $user = User::find(1);
        $user->assignRole($role1);
    }

    public function down()
    {
        //Schema::dropIfExists('roles');
    }
}
