<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_manager = Role::where('name', 'manager')->first();


        $admin = new User();
        $admin->name = 'Sybe';
        $admin->email = 's.plattje@gmail.com';
        $admin->password = bcrypt('lolbroek');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $manager = new User();
        $manager->name = 'Kitch';
        $manager->email = 'k@youtube.com';
        $manager->password = bcrypt('Lol132');
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
