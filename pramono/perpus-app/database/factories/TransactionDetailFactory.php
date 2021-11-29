<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fisrtBook = \App\Models\Book::orderBy('id', 'asc')->first();
        $lastBook = \App\Models\Book::orderBy('id', 'desc')->first();

        return [
            'book_id' => $this->faker->numberBetween($fisrtBook->id, $lastBook->id),
            'qty' => $this->faker->numberBetween(1, 30)
        ];
    }
}
