<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Role;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'user')->first();

      foreach($role_user->users as $user){
        $customer = new Customer ();
        $customer->address = rand(1, 100) . "Main Street";
        $customer->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
        $customer->user_id = $user->id;
        $customer->save();
      }
    }

//not efficient
    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
      $pieces = [];
      $max = mb_strlen($keyspace, '8bit') - 1;
      for ($i = 0; $i < $length; ++$i){
        $pieces []= $keyspace[random_int(0, $max)];
      }
      return implode('', $pieces);
    }
}
