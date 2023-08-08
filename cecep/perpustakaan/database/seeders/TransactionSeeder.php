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
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++){
            $transaction = new Transaction;

            $transaction->member_id = rand(1,20);
            $transaction->date_start = $faker->date();
            $transaction->date_end = $faker->date();
        
            $transaction->save();
            
        }
    }
}
