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
        $fisrtMember = \App\Models\Member::orderBy('id', 'asc')->first();
        $lastMember = \App\Models\Member::orderBy('id', 'desc')->first();

        return [
            'member_id' => $this->faker->numberBetween($fisrtMember->id, $lastMember->id),
            'start' => $this->faker->date(),
            'end' => $this->faker->date()
        ];
    }
}
