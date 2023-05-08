<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call(AuthorSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(CatalogSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(TransactionDetailSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
      
    }
}