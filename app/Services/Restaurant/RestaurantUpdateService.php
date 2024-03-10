<?php

namespace App\Services\Restaurant;

use App\DTO\Restaurant\RestaurantDTO;
use App\Exceptions\ExistsObjectException;
use App\Interfaces\IRestaurantRepository;
use App\Models\Restaurant;

class RestaurantUpdateService
{
    private IRestaurantRepository $restaurantRepository;

    public function __construct(IRestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    /**
     * @throws ExistsObjectException
     */

    public function updateRestaurant(int $restaurantId, RestaurantDTO $restaurantDTO)
    {
        /**
         * @var Restaurant|null $existingEmail
         */
        $existingEmail = $this->restaurantRepository->getByEmail($restaurantDTO->getEmail());

        if ($existingEmail !== null && $existingEmail->id !== $restaurantId) {
            throw new ExistsObjectException('Object with this email exists', 409);
        }

        return $this->restaurantRepository->update($restaurantId, $restaurantDTO);
    }


}
