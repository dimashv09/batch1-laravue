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
            $author = new Book;

            $author->isbn = $faker->randomNumber(9);
            $author->tittle = $faker->name;
            $author->year = rand(2010, 2021);
            $author->publisher_id = rand(1, 20);
            $author->author_id = rand(1, 20);
            $author->catalog_id = rand(1, 4);
            $author->qty = rand(10, 20);
            $author->price = rand(10000, 20000);

            $author->save();
        }
    }
}
