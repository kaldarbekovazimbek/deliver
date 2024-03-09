<?php

namespace App\Interfaces;

use App\DTO\User\UserDTO;
use App\Models\User;

interface IUserRepository
{
    public function getAllUsers();

    public function getUserById(int $userID): ?User;

    public function getUserByEmail(string $email): ?User;

    public function create(UserDTO $userDTO);

    public function update(int $userID, UserDTO $userDTO);



}
