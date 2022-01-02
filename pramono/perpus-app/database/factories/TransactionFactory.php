<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_member = \App\Models\Member::all()->first()->id;
        $last_member = \App\Models\Member::all()->last()->id;

        return [
            'member_id' => $this->faker->numberBetween($first_member, $last_member),
            'start' => $this->faker->dateTimeBetween('-4 days', 'now'),
            'end' => $this->faker->dateTimeBetween('now', '+3 days'),
            'status' => $this->faker->boolean(),
        ];
    }
}
