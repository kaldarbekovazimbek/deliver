<?php

namespace App\Repositories;

use App\DTO\Restaurant\RestaurantDTO;
use App\Interfaces\IRestaurantRepository;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RestaurantRepository implements IRestaurantRepository
{

    public function getAll(): Collection
    {
        return Restaurant::all();
    }

    public function getById(int $restaurantId): Restaurant
    {
        /**
         * @var Restaurant
         */
        return Restaurant::query()->find($restaurantId);
    }

    public function create(RestaurantDTO $restaurantDTO): Restaurant
    {
        $restaurant = new Restaurant();

        $restaurant->name = $restaurantDTO->getName();
        $restaurant->email = $restaurantDTO->getEmail();
        $restaurant->password = $restaurantDTO->getPassword();
        $restaurant->save();

        return $restaurant;
    }

    public function update(int $restaurantId, RestaurantDTO $restaurantDTO): ?Restaurant
    {
        /**
         * @var Restaurant $restaurant
         */
        $restaurant = Restaurant::query()->find($restaurantId);

        $restaurant->name = $restaurantDTO->getName();
        $restaurant->email = $restaurantDTO->getEmail();
        $restaurant->password = $restaurantDTO->getPassword();
        $restaurant->save();

        return $restaurant;
    }

    public function getByEmail(string $restaurantEmail): ?Restaurant
    {
        /**
         * @var Restaurant $restaurant
         */
        $restaurant =  Restaurant::query()->where('email', '=', $restaurantEmail)->first();

        return $restaurant;
    }


}
