<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
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
            $author = new Member();
            $author->name = $faker->name;
            $author->gender = $faker->randomElement(['L', 'P']);

            $author->phone_number = "0821" . $faker->randomNumber(8);
            $author->address = $faker->address;
            $author->email = $faker->email;
            $author->save();
        }
    }
}
