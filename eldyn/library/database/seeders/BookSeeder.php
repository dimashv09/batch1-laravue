<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
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

		for ($i = 0; $i < 20; $i++) {
			$book = new Book;

			$book->isbn = $faker->randomNumber(9);
			$book->title = $faker->name;
			$book->year = rand(2010, 2021);

			$book->author_id = rand(1,20);
			$book->publisher_id = rand(1,20);
			$book->catalog_id = rand(1,5);

			$book->quantity = rand(5,15);
			$book->price = rand(15000,50000);

			$book->save();
		}
    }
}
