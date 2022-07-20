<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i<10; $i++) { 
            $book = new Book; 
            
            $book->isbn = $faker->randomNumber(8);
            $book->title = $faker->name;
            $book->year = rand(2010,2022);

            $book->publisher_id = rand(1,10);
            $book->author_id = rand(1,10);
            $book->catalog_id = rand(1,10);

            $book->qty = rand(1,20);
            $book->price = rand(10000,20000);

            $book->save();
        }
    }
}
