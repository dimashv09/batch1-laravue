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
            'isbn' => $this->faker->randomNumber(9),
            'title' => $this->faker->sentence(2),
            'year' => mt_rand(2000, 2021),
            'publisher_id' => mt_rand(1, 5),
            'author_id' => mt_rand(1, 20),
            'catalog_id' => mt_rand(1, 4),
            'qty' => mt_rand(10, 20),
            'price' => mt_rand(10000, 50000)
        ];
    }
}
