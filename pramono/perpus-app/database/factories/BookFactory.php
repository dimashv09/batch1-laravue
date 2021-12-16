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
        return [
            'isbn' => $this->faker->ean8(),
            'title' => $this->faker->sentence(2),
            'year' => $this->faker->year(),
            'stock' => $this->faker->numberBetween(1, 30),
            'price' => $this->faker->numberBetween(3000, 5000),
            'publisher_id' => $this->faker->numberBetween(
                \App\Models\Publisher::orderBy('id', 'asc')->first()->id,
                \App\Models\Publisher::orderBy('id', 'desc')->first()->id
            ),
            'writer_id' => $this->faker->numberBetween(
                \App\Models\Writer::orderBy('id', 'asc')->first()->id,
                \App\Models\Writer::orderBy('id', 'desc')->first()->id
            ),
            'catalog_id' => $this->faker->numberBetween(
                \App\Models\Catalog::orderBy('id', 'asc')->first()->id,
                \App\Models\Catalog::orderBy('id', 'desc')->first()->id
            )
        ];
    }
}
