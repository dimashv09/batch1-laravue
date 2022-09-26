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

        for ($i=0; $i < 25; $i++) {
            $Member = new Member;

            $Member->Name = $faker->Name;
            $Member->Gender = $faker->randomElement(['M', 'F']);
            $Member->Email = $faker->Email;
            $Member->Phone_Number = '0821' .$faker->randomNumber(8);
            $Member->Address = $faker->Address;

            $Member->save();
        }
    }
}
