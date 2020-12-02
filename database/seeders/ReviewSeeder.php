<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $review = new Review();
        $review->title = "Good book";
        $review->body = "Great read, I thoroughly enjoyed it.";
        $review->user_id = 2;
        $review->book_id = 1;
        $review->save();

        $review = new Review();
        $review->title = "Great book";
        $review->body = "Easy to read.";
        $review->user_id = 1;
        $review->book_id = 1;
        $review->save();

        $review = new Review();
        $review->title = "Loved it";
        $review->body = "Great writing.";
        $review->user_id = 2;
        $review->book_id = 2;
        $review->save();

    }
}
