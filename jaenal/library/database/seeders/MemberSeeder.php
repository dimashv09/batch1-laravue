<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
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
        $gender = $faker->randomElement(['male', 'female']);

        for ($i=0; $i < 10; $i++) {
            $Member = new Member;

            $Member->name = $faker->name;
            $Member->gender = $gender;

            $Member->email = $faker->email;
            $Member->phone_number = '0821' .$faker->randomNumber(8);
            $Member->address = $faker->address;

            $Member->save();
        }
    }
}
