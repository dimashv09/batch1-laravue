<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Book;

use Illuminate\Database\Seeder;

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

        for ($i=0; $i < 40; $i++){
            $book = new Book;

            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->name;
            $book->year = rand(2010, 2020);

            $book->publisher_id = rand(1,15);
            $book->author_id = rand(1,20);
            $book->catalog_id = rand(1,8);

            $book->qty = rand(1, 20);
            $book->price = rand(5000, 20000);

            $book->save();
        
        }

    }
}