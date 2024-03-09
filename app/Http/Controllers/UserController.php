<?php

namespace App\Http\Controllers;

use App\DTO\User\UserDTO;
use App\Exceptions\ExistsObjectException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Services\User\UserCreateService;
use App\Services\User\UserService;
use App\Services\User\UserUpdateService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private UserCreateService $userCreateService,
        private UserUpdateService $userUpdateService,
        private UserService       $userService,

    )
    {
    }

    /**
     * @throws NotFoundException
     */
    public function index(): UserCollection
    {
        $users = $this->userService->getAll();

        return new UserCollection($users);
    }

    /**
     * @throws ExistsObjectException
     */
    public function store(UserRequest $request): UserResource
    {
        $validData = $request->validated();

        $user = $this->userCreateService->createUser(UserDTO::fromArray($validData));

        return new UserResource($user);
    }

    /**
     * @throws NotFoundException
     */
    public function show(int $userId): UserResource
    {
        $user = $this->userService->getUserById($userId);

        return new UserResource($user);
    }

    /**
     * @throws ExistsObjectException
     */
    public function update(UserRequest $request, int $userId): UserResource
    {
        $validData = $request->validated();

        $user = $this->userUpdateService->updateUser($userId, UserDTO::fromArray($validData));

        return new UserResource($user);
    }

    /**
     * @throws NotFoundException
     */
    public function destroy(int $userId): JsonResponse
    {
        $user = $this->userService->getUserById($userId);

        $user->delete();

        return response()->json([
            'message' => 'object was deleted',
        ]);
    }

}
