<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

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

        $catalog = ["Bahasa", "Programming", "Pertanian", "Komik", "Keislaman", "Politik", "Ekonomi", "Perbankan"];

        foreach ($catalog as $key => $value) {
            DB::table('catalogs')->insert([
                 'name' => $value,
            ]);
        }
    }
}
