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
            'title' => $this->faker->sentence(3),
            'year' => $this->faker->year(),
            'stock' => $this->faker->numberBetween(1, 30),
            'price' => $this->faker->numberBetween(3000, 5000),
            'publisher_id' => $this->faker->numberBetween(1,4),
            'writer_id' => $this->faker->numberBetween(1,4),
            'catalog_id' => $this->faker->numberBetween(1,4)
        ];
    }
}
