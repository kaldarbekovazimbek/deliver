<?php

namespace App\Http\Controllers;

use App\DTO\Restaurant\RestaurantDTO;
use App\Exceptions\ExistsObjectException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\Restaurant\RestaurantCollection;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Services\Restaurant\RestaurantCreateService;
use App\Services\Restaurant\RestaurantService;
use App\Services\Restaurant\RestaurantUpdateService;
use Illuminate\Http\JsonResponse;

class RestaurantController extends Controller
{

    public function __construct(
        private RestaurantCreateService $restaurantCreateService,
        private RestaurantUpdateService $restaurantUpdateService,
        private RestaurantService       $restaurantService,
    )
    {
    }

    /**
     * @throws NotFoundException
     */
    public function index(): RestaurantCollection
    {
        $restaurants = $this->restaurantService->getAll();

        return new RestaurantCollection($restaurants);
    }

    /**
     * @throws ExistsObjectException
     */
    public function store(RestaurantRequest $request): RestaurantResource
    {
        $validData = $request->validated();

        $restaurant = $this->restaurantCreateService->createRestaurant(RestaurantDTO::fromArray($validData));

        return new RestaurantResource($restaurant);
    }

    /**
     * @throws NotFoundException
     */
    public function show(int $restaurantId): RestaurantResource
    {
        $restaurant = $this->restaurantService->getById($restaurantId);

        return new RestaurantResource($restaurant);
    }

    /**
     * @throws ExistsObjectException
     */
    public function update(int $restaurantId, RestaurantRequest $request): RestaurantResource
    {
        $validData = $request->validated();

        $restaurant = $this->restaurantUpdateService->updateRestaurant($restaurantId, RestaurantDTO::fromArray($validData));

        return new RestaurantResource($restaurant);
    }

    /**
     * @throws NotFoundException
     */
    public function destroy(int $userId): JsonResponse
    {
        $user = $this->restaurantService->getById($userId);
        $user->delete();

        return response()->json([
            'message'=>__('messages.object_deleted'),
        ]);
    }
}
