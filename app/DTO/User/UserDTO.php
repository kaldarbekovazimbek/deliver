<?php

namespace App\DTO\User;

class UserDTO
{

    public function __construct(
        private string $name,
        private string $email,
        private string $password,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function fromArray(array $data): static
    {
        return new UserDTO(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );
    }
}
