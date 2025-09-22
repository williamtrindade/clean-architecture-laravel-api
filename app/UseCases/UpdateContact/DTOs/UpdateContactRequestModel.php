<?php

namespace App\UseCases\UpdateContact\DTOs;

final class UpdateContactRequestModel
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $phoneNumber,
        public readonly string $email
    ) {
    }
}
