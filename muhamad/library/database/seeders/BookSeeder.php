<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $book = new Book;

            $book->isbn = $faker->randomNumber(9, true);
            $book->title = $faker->sentence(2);
            $book->year = rand(2010, 2021);

            $book->publisher_id = rand(1, 20);
            $book->author_id = rand(1, 20);
            $book->catalog_id = rand(1, 4);

            $book->qty = rand(10, 20);
            $book->price = rand(15000, 200000);

            $book->save();
        }
    }
}
