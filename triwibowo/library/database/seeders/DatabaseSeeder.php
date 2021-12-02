<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
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
        // \App\Models\User::factory(10)->create();
        Author::factory(20)->create();
        Member::factory(10)->create();
        Publisher::factory(5)->create();
        Catalog::factory(4)->create();
        Book::factory(30)->create();
    }
}
