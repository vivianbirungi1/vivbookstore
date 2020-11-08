<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating 2 roles, want to seed db with roles and users
        $role_admin = new Role(); //Role now stored in role admin , need to set name and description
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        $role_admin->save(); //stores admin role


        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An oridnary user';
        $role_user->save();


    }
}
