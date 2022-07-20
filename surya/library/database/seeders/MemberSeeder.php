<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);

        for ($i=0; $i<10; $i++) { 
            $member=new Member; 
            
            $member->name = $faker->name($gender);
            $member->gender = $gender;
            $member->phone = '0881'.$faker->randomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();
        }
    }
}
