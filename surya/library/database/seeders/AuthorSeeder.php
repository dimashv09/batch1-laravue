<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i<10; $i++) { 
            $author = new Author;

            $author->name = $faker->name;
            $author->email = $faker->email;
            $author->phone = '0881'.$faker->randomNumber(8);
            $author->address = $faker->address;

            $author->save();
        }
    }
}
