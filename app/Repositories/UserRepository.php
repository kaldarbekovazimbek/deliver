<?php

namespace App\Repositories;

use App\DTO\User\UserDTO;
use App\Interfaces\IUserRepository;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{

    public function getAllUsers(): Collection
    {
        return User::all();

    }

    public function getUserById(int $userID): ?User
    {
        /**
         * @var User
         */
        return User::query()->find($userID);
    }

    public function getUserByEmail(string $email): ?User
    {
        /**
         * @var User $user
         */
        $user = User::query()->where('email','=', $email)->first();

        return $user;
    }

    public function create(UserDTO $userDTO): User
    {
        $user = new User();

        $user->name = $userDTO->getName();
        $user->email = $userDTO->getEmail();
        $user->password = bcrypt($userDTO->getPassword());
        $user->save();

        return $user;
    }

    public function update(int $userID, UserDTO $userDTO): User
    {
        /**
         * @var User $user
         */
        $user = $this->getUserById($userID);

        $user->name = $userDTO->getName();
        $user->email = $userDTO->getEmail();
        $user->password = bcrypt($userDTO->getPassword());
        $user->save();

        return $user;
    }

}
