<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 25; $i++) {
            $Author = new Author;

            $Author->Name = $faker->Name;
            $Author->Email = $faker->Email;
            $Author->Phone_Number = '0821' .$faker->randomNumber(8);
            $Author->Address = $faker->Address;

            $Author->save();
        }
    }
}
