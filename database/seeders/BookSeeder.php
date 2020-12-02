<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Publisher;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rolfson = Publisher::where('name', "Rolfson, Stehr and Jenkins")->first();
      $nienow = Publisher::where('name', "Nienow-Bogisich")->first();
      $mckenzie = Publisher::where('name', "McKenzie-Blanda")->first();
      $fadel = Publisher::where('name', "Fadel Group")->first();

      $book = new Book();
      $book->title = "Learning PHP: A Gentle Introduction to the Web's Most Popular Language";
      $book->author = "David Skylar";
      $book->isbn = "9781491933572";
      $book->price = 41.99;
      $book->year = 2018;
      $book->publisher_id = $rolfson->id;
      $book->save();

      $book = new Book();
      $book->title = "Beginning PHP";
      $book->author = "Matt Doyle";
      $book->isbn = "9788470413968";
      $book->price = 36.40;
      $book->year = 2019;
      $book->publisher_id = $nienow->id;
      $book->save();

      $book = new Book();
      $book->title = "Beginning JavaScript, 5th Edition";
      $book->author = "Jeremy McPeak";
      $book->isbn = "8118903339";
      $book->price = 40.90;
      $book->year = 2020;
      $book->publisher_id = $mckenzie->id;
      $book->save();

      $book = new Book();
      $book->title = "Beginning JavaScript, 3rd Edition";
      $book->author = "Ethan Brown";
      $book->isbn = "9780321767530";
      $book->price = 26.31;
      $book->year = 2017;
      $book->publisher_id = $mckenzie->id;
      $book->save();

    }
}
