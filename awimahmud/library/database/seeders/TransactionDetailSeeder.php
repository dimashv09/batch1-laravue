<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for($i = 0;$i < 15;$i++){
            $detail = new TransactionDetail;
            
            $detail->transaction_id = rand(1,15);
            $detail->book_id = rand(1,25);
            $detail->qty = rand(10,20);
            
            $detail->save();
        }
    }
}