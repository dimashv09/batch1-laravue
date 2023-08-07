<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++){
            $transaction_detail = new TransactionDetail;

            $transaction_detail->transaction_id = rand(1,20);
            $transaction_detail->book_id = rand(1,20);
            $transaction_detail->qty = rand(10,20);

            $transaction_detail->save();
            
        }
    }
}
