<?php

namespace Database\Seeders;

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
        \App\Models\Transaction::factory()->count(5)->hasTransactionDetail(1)->create();
    }
}
