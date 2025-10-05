<?php

namespace App\UseCases\CreateContact\DTOs;

final readonly class CreateContactResponseModel
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $phoneNumber
    ) {
    }
}
