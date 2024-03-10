<?php

namespace App\Interfaces;

use App\DTO\Restaurant\RestaurantDTO;

interface IRestaurantRepository
{
    public function getAll();

    public function getById(int $restaurantId);

    public function getByEmail(string $restaurantEmail);


    public function create(RestaurantDTO $restaurantDTO);

    public function update(int $restaurantId, RestaurantDTO $restaurantDTO);

}
