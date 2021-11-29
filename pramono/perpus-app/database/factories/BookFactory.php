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
            'publisher_id' => $this->faker->numberBetween(1,5),
            'writer_id' => $this->faker->numberBetween(1,5),
            'catalog_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
