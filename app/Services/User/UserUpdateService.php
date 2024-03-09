<?php

namespace App\Services\User;

use App\DTO\User\UserDTO;
use App\Exceptions\ExistsObjectException;
use App\Interfaces\IUserRepository;
use App\Models\User;

class UserUpdateService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws ExistsObjectException
     */
    public function updateUser(int $userId, UserDTO $userDTO)
    {
        /**
         * @var User $existingUserEmail
         */
        $existingUserEmail = $this->userRepository->getUserByEmail($userDTO->getEmail());

        if ($existingUserEmail !== null && $existingUserEmail->id !== $userId) {
            throw new ExistsObjectException('Object with this email exist', 409);
        }

        return $this->userRepository->update($userId, $userDTO);
    }

}
