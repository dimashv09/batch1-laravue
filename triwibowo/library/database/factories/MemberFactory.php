<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'phone_number' => '082' . $this->faker->randomNumber(9),
            'address' => $this->faker->streetAddress(),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}
