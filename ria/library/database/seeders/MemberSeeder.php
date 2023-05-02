<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Member;
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

        for ($i=0; $i < 20; $i++){
            $member = new Member;
            $gender = $faker->randomElement($array = array('M','F'));


            $member->name = $faker->name;
            $member->gender = $gender;
            $member->phone_number = '0821'.$faker->randomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();

        }
    }
}