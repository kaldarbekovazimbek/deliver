<?php

namespace App\DTO\Restaurant;

class RestaurantDTO
{

    public function __construct(
        private string $name,
        private string $email,
        private string $password,

    )
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public static function fromArray(array $data): static
    {
        return new RestaurantDTO(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );
    }
}
