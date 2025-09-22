<?php

namespace App\UseCases\FindContact\DTOs;

final class FindContactResponseModel
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $phoneNumber,
        public readonly string $email
    ) {
    }
}
