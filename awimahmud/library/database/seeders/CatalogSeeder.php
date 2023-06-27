<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Catalog;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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

        for($i = 0;$i < 25;$i++){
            $catalog = new Catalog;

            $catalog->name = $faker->name;

            $catalog->save();
        }
    }
}
