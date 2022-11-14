<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role0 = Role::create(['name' => 'SuperAdministrador']);
        $role1 = Role::create(['name' => 'Profesor']);
        $role2 = Role::create(['name' => 'Estudiante']);
        $role3 = Role::create(['name' => 'Usuario']);

        $permission = Permission::create(['name' => 'asignar.roles'])->syncRoles([$role0]);
        $permission = Permission::create(['name' => 'lista.roles.show'])->syncRoles([$role0, $role1]);

        $permission = Permission::create(['name' => 'lista.users.show'])->syncRoles([$role0, $role1]);
        $permission = Permission::create(['name' => 'admin.users.mod'])->syncRoles([$role0, $role1]);

        $permission = Permission::create(['name' => 'lista.cursos.show'])->syncRoles([$role0, $role1]);
        $permission = Permission::create(['name' => 'admin.cursos.mod'])->syncRoles([$role0, $role1]);

        $permission = Permission::create(['name' => 'lista.actividades.show'])->syncRoles([$role0, $role1]);
        $permission = Permission::create(['name' => 'admin.actividades.mod'])->syncRoles([$role0, $role1]);

        $permission = Permission::create(['name' => 'lista.exemenes.show'])->syncRoles([$role0, $role1]);
        $permission = Permission::create(['name' => 'admin.exemenes.mod'])->syncRoles([$role0, $role1]);

        $permission = Permission::create(['name' => 'lista.notas.show'])->syncRoles([$role0, $role1]);
        $permission = Permission::create(['name' => 'admin.notas.mod'])->syncRoles([$role0, $role1]);
    }
}
