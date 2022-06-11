<?php

namespace Database\Seeders;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        for ($i=0; $i < 100; $i++) { 
            $product = new Product();

            $product->name = $faker->sentence(2);
            $product->description = $faker->sentence(2);
            $product->price = $faker->numberBetween(100, 5000);
            $product->save();
        }
    }
}
