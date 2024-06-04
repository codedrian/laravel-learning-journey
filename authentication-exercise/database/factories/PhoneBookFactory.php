<?php

namespace Database\Factories;

use App\Models\PhoneBook;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneBookFactory extends Factory
{
    protected $model = PhoneBook::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id' => fake()->numberBetween(1, 5),
            'contact_number' => fake()->numerify('09#######'),
        ];
    }
}
