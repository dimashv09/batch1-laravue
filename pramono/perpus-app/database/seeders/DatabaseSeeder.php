<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MemberSeeder::class,
            CatalogSeeder::class,
            PublisherSeeder::class,
            WriterSeeder::class,
            BookSeeder::class,
            TransactionSeeder::class,
        ]);

    }
}
