<?php

namespace App\Services\User;

use App\DTO\User\UserDTO;
use App\Exceptions\ExistsObjectException;
use App\Interfaces\IUserRepository;

class UserCreateService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws ExistsObjectException
     */
    public function createUser(UserDTO $userDTO)
    {
        $existingUserEmail = $this->userRepository->getUserByEmail($userDTO->getEmail());

        if ($existingUserEmail !== null){
            throw new ExistsObjectException('Object with this email exist', 409);
        }

        return $this->userRepository->create($userDTO);
    }

}
