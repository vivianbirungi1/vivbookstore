<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
      for($i = 1; $i <= 10; $i++) {
        Publisher::factory()->hasBooks(mt_rand(1, 3))->create();
      }
    }
}
