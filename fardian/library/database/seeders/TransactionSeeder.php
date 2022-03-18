<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

        for($i=0; $i < 10; $i++){
            $transaction = new Transaction;

            $transaction->member_id = rand(1,20);
            $transaction->date_start = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
            $transaction->date_end = Carbon::createFromFormat('Y-m-d H:i:s', $transaction->date_start)->addHour(48);

            $transaction->save();
        }
    }
}
