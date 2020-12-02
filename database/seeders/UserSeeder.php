<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Viv Bir';
        $admin->email = 'admin@vivbookstore.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Ted Bo';
        $user->email = 'user@vivbookstore.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_user);


        //use user factory to geerate users for us
        // $users = User::factory()->times(10)->
        // hasRoles(1, [
        //   'name' => 'admin'
        // ])
        // ->create();

        //admin
        for($i = 1; $i <= 2; $i++) {
          $user = User::factory()->create();
          $user->roles()->attach($role_admin);
        }

        //users
        for($i = 1; $i <= 20; $i++) {
          $user = User::factory()->create();
          $user->roles()->attach($role_user);
        }

        //customers (doctors/patients)
        // for($i = 1; $i <= 20; $i++) {
        //   $user = User::factory()->create();
        //   $user->roles()->attach($role_user);
        //   $customer = Customer::factory()->create([
        //     'user_id' => $user->id,
        //
        //   ]);
        // }


    }
}
