<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;;

class PublisherSeeder extends Seeder
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
            $publisher = new Publisher;

            $publisher->Name = $faker->Name;
            $publisher->Email = $faker->Email;
            $publisher->Phone_Number = '0821' .$faker->randomNumber(8);
            $publisher->Address = $faker->Address;

            $publisher->save();
        }
    }
}
