<?php

namespace App\UseCases\CreateContact\DTOs;

// É um DTO (Data Transfer Object) para carregar os dados de entrada.
final class CreateContactRequestModel
{
    public function __construct(
        public readonly string $name,
        public readonly string $phoneNumber,
        public readonly string $email
    ) {
    }
}
