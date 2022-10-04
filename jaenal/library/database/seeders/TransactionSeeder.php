<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) {
            $Transaction = new Transaction;

            $Transaction->date_start = $faker->dateTime();
            $Transaction->date_end = $faker->dateTime();
            $Transaction->Member_id = rand(1,10);

            $Transaction->save();
        }
    }
}
