<?php

namespace Database\Factories;

use App\Models\BankCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankCard>
 * */

class BankCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,30),
            'card_number'=>$this->faker->creditCardNumber,
            'balance'=>$this->faker->randomFloat(5.2, 1000)
        ];
    }
}
