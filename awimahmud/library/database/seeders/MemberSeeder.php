<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $gender = ['L', 'P'];
        for ($i = 0; $i < 20;$i++){
            $member = new Member;

            $member->name = $faker->name;
            $member->gender = $gender[array_rand($gender)];
            $member->phone_number = '0821'.$faker->RandomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();
        }
    }
}

