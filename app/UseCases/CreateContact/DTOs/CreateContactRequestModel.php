<?php

namespace App\UseCases\CreateContact\DTOs;

final readonly class CreateContactRequestModel
{
    public function __construct(
        public string $name,
        public string $phoneNumber,
        public string $email
    ) {
    }
}
