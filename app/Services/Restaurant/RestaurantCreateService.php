<?php

namespace App\Services\Restaurant;

use App\DTO\Restaurant\RestaurantDTO;
use App\Exceptions\ExistsObjectException;
use App\Interfaces\IRestaurantRepository;

class RestaurantCreateService
{
    private IRestaurantRepository $restaurantRepository;

    public function __construct(IRestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    /**
     * @throws ExistsObjectException
     */
    public function createRestaurant(RestaurantDTO $restaurantDTO)
    {
        $existingEmail = $this->restaurantRepository->getByEmail($restaurantDTO->getEmail());

        if ($existingEmail !== null) {
            throw new ExistsObjectException('Object with this phone exist', 409);
        }

        return $this->restaurantRepository->create($restaurantDTO);
    }

}
