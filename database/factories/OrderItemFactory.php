<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $menuItem = MenuItem::query()->inRandomOrder()->first();
        return [
            'order_id'=>$this->faker->numberBetween(1,30),
            'menu_item_id'=>$this->faker->numberBetween(1, 90),
            'quantity'=>$this->faker->numberBetween(1, 5),
            'price'=>$menuItem->price,
        ];
    }
}
