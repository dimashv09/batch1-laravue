<?php

namespace Database\Seeders;

use App\Models\Catalog;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalog::factory(4)->create();
    }
}
