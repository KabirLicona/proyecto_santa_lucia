<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // crear permisos
        Permission::create(['name' => 'gestion usuarios', 'guard_name' => 'web']);
        Permission::create(['name' => 'gestion roles', 'guard_name' => 'web']);
        Permission::create(['name' => 'gestion producto', 'guard_name' => 'web']);
        Permission::create(['name' => 'gestion categoria', 'guard_name' => 'web']);
        Permission::create(['name' => 'gestion cliente', 'guard_name' => 'web']);
        Permission::create(['name' => 'gestion empresa', 'guard_name' => 'web']);
        Permission::create(['name' => 'gestion tipocliente', 'guard_name' => 'web']);

        
        $role = Role::create(['name' => 'admin', 'guard_name' => 'web'])
            ->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'aux', 'guard_name' => 'web'])
            ->givePermissionTo(['gestion producto', 'gestion categoria']);
    }
}
