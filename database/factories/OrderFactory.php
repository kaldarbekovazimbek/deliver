<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 30),
            'restaurant_id' => $this->faker->numberBetween(1, 10),
//            'courier_id'=>
            'address'=>$this->faker->address,

//            'status'=>
            'total_price'=>$this->faker->numberBetween(2.0, 8.0),
        ];
    }
}
