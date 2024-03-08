<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BankCard;
use App\Models\Courier;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(30)->create();
        BankCard::factory(30)->create();
        Restaurant::factory(10)->create();
        MenuItem::factory(90)->create();
        Courier::factory(30)->create();
        Order::factory(30)->create();
        Review::factory(30)->create();
        OrderItem::factory(30)->create();
    }
}
