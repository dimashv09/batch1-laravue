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
            'name' => $this->faker->firstName(),
            'gender' => $this->faker->randomElement($array = array ('P','L')),
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->city()
        ];
    }
}
