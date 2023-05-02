<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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


        for ($i=0; $i < 20; $i++) { 
            $Author = new Author;

            $Author->name = $faker->name;
            $Author->email = $faker->email;
            $Author->phone_number = '0821'.$faker->randomNumber(8);
            $Author->address = $faker->address;


            $Author->save();
        }
    }
}
