<?php

namespace Database\Seeders;

use App\Models\book;
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

        for ($i=0; $i < 10; $i++) {
            $catalog = new book;

            $catalog->isbn = $faker->randomNumber(9);
            $catalog->title = $faker->name;
            $catalog->year = rand(2010,2022);

            $catalog->Publisher_id = rand(1,10);
            $catalog->author_id = rand(1,10);
            $catalog->catalog_id = rand(1,3);

            $catalog->qty = rand(10,20);
            $catalog->price = rand(10000,20000);

            $catalog->save();

        }
    }
}
