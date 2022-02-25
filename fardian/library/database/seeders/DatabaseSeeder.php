<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;

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
            AuthorSeeder::class,
            CatalogSeeder::class,
            PublisherSeeder::class,
            MemberSeeder::class,
            BookSeeder::class
        ]);
    }
}
