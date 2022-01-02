<?php

namespace Database\Seeders;

use App\Models\Book;
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
        \App\Models\Transaction::factory()
                        ->hasAttached(
                            Book::factory()->count(2),
                            ['qty' => 1]
                        )
                        ->count(6)
                        ->create();
    }
}
