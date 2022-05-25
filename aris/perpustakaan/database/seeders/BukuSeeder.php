<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
class BukuSeeder extends Seeder
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

        for ($i=0; $i < 100 ; $i++) { 
            $buku = new Buku;

            $buku->isbn = $faker->randomNumber(9);
            $buku->title = $faker->name;
            $buku->year = rand(2010,2021);
            $buku->qty = rand(10,20);
            $buku->price = rand(10000,20000);

            $buku->save();

        }
    }
}
