<?php

namespace App\UseCases\UpdateContact\DTOs;

final class UpdateContactResponseModel
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $phoneNumber
    ) {
    }
}
