<?php

namespace App\Services\Restaurant;

use App\Exceptions\NotFoundException;
use App\Interfaces\IRestaurantRepository;
use App\Models\Restaurant;
use function PHPUnit\Framework\isEmpty;

class RestaurantService
{
    private IRestaurantRepository $restaurantRepository;

    public function __construct(IRestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    /**
     * @throws NotFoundException
     */
    public function getAll()
    {
        $restaurants = $this->restaurantRepository->getAll();

        if (!isEmpty($restaurants)) {
            throw new NotFoundException('Objects not found', 404);
        }
        return $restaurants;

    }

    /**
     * @throws NotFoundException
     */
    public function getById(int $restaurantId): Restaurant
    {
        $restaurant = $this->restaurantRepository->getById($restaurantId);

        if (!isEmpty($restaurant)) {
            throw new NotFoundException('Objects not found', 404);
        }
        return $restaurant;
    }
}
