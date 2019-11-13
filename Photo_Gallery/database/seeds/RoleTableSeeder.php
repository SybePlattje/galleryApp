<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'a admin user';
        $role_admin->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'a manager role';
        $role_manager->save();
    }
}
