<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $status = [0, 1];
        for($i = 0; $i < 15;$i++) {
            
            $transaction = new Transaction;

            $transaction->status = $status[array_rand($status)];
            $transaction->member_id = rand(1,10);
            $transaction->date_start = $faker->date();
            $transaction->data_end= $faker->date();
            
           
            $transaction->save();
        }
    }
        
                
    
}