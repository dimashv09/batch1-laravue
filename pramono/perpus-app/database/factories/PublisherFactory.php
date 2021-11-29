<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->city(),
        ];
    }
}
