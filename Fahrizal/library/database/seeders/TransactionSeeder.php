<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        for ($i = 0; $i < 15; $i++) {
            $transaction = new Transaction();

            $transaction->date_start = $faker->date;
            $transaction->date_end = $faker->date;
            $transaction->member_id = rand(1, 15);
            $transaction->qty = rand(1, 15);

            $transaction->save();
        }
    }
}