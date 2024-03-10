<?php

namespace App\Services\User;

use App\Exceptions\NotFoundException;
use App\Interfaces\IUserRepository;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;

class UserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws NotFoundException
     */
    public function getAll()
    {
        $users = $this->userRepository->getAllUsers();

        if (!isEmpty($users)) {
            throw new NotFoundException('Objects not found', 404);
        }

        return $users;
    }

    /**
     * @throws NotFoundException
     */
    public function getUserById(int $userID): User
    {
        $user = $this->userRepository->getUserById($userID);

        if (!isset($user)){
            throw new NotFoundException("object not found", 404);
        }

        return $user;
    }
}
