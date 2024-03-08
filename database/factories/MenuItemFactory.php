<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id'=>$this->faker->numberBetween(1,10),
            'name_of_food'=>$this->faker->text(5),
            'description'=>$this->faker->text(15),
            'price'=>$this->faker->numberBetween(2.0,8.0),
        ];
    }
}
