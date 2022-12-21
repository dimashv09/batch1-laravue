<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        for ($i = 0; $i < 15; $i++) {
            $book = new Book;

            $book->isbn = $faker->randomNumber(9);
            $book->tittle = $faker->name;
            $book->year = rand(2010, 2021);
            $book->publisher_id = rand(1, 15);
            $book->author_id = rand(1, 15);
            $book->catalog_id = rand(1, 4);
            $book->qty = rand(10, 15);
            $book->price = rand(10000, 20000);

            $book->save();
        }
    }
}