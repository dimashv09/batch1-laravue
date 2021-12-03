<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

        for ($i = 0; $i < 20; $i++) {
            $member = new Member;

            $member->name = $faker->name;
            $member->gender = $faker->randomElement(['M', 'F']);;
            $member->phone_number = "0851{$faker->randomNumber(8, true)}";
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();
        }
    }
}
