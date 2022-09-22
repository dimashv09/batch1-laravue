<?php

namespace Database\Seeders;

use App\Models\catalog;
use Faker\Factory as Faker;
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
        $faker = Faker::create();

        for ($i=0; $i < 3; $i++) {
            $catalog = new catalog;

            $catalog->name = $faker->name;

            $catalog->save();
        }
    }
}
