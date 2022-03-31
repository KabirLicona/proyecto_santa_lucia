<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name'  => 'Supervisor',
            'email' => 'supervisor@admin.com',
            'password'  => bcrypt('password'),
            'status'  => true,
        ]);
        $user = $user->assignRole('admin');

        $user = \App\User::create([
            'name'  => 'Auxcxc1',
            'email' => 'auxcxc1@example.com',
            'password'  => bcrypt('password'),
            'status'  => true,
        ]);
        $user = $user->assignRole('aux');

        $user = \App\User::create([
            'name'  => 'Auxcxc2',
            'email' => 'auxcxc22@example.com',
            'password'  => bcrypt('password'),
            'status'  => true,
        ]);
        $user = $user->assignRole('aux');
    }
}
