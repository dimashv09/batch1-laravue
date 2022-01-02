<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_publisher = \App\Models\Publisher::all()->first()->id;
        $last_publisher = \App\Models\Publisher::all()->last()->id;

        $first_writer = \App\Models\Writer::all()->first()->id;
        $last_writer = \App\Models\Writer::all()->last()->id;

        $first_catalog = \App\Models\Catalog::all()->first()->id;
        $last_catalog = \App\Models\Catalog::all()->last()->id;

        return [
            'isbn' => $this->faker->ean8(),
            'title' => $this->faker->sentence(1),
            'year' => $this->faker->year(),
            'stock' => $this->faker->numberBetween(1, 30),
            'price' => $this->faker->numberBetween(3000, 5000),
            'publisher_id' => $this->faker->numberBetween($first_publisher, $last_publisher),
            'writer_id' => $this->faker->numberBetween($first_writer, $last_writer),
            'catalog_id' => $this->faker->numberBetween($first_catalog, $last_catalog)
        ];
    }
}
