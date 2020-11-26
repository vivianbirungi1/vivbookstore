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
        $publisher = new Publisher();
        $publisher->name = "O'Reilly Media";
        $publisher->address = "Sebastopol, CA, USA";
        $publisher->save();

        $publisher = new Publisher();
        $publisher->name = "Wrox Press";
        $publisher->address = "Birmingham, UK";
        $publisher->save();

        $publisher = new Publisher();
        $publisher->name = "New Riders";
        $publisher->address = "Berkley, CA, USA";
        $publisher->save();

        $publisher = new Publisher();
        $publisher->name = "John Wiley";
        $publisher->address = "Chichester, UK";
        $publisher->save();
    }
}
