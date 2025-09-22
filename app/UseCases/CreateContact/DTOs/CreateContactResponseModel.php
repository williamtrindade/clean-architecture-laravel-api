<?php

namespace App\UseCases\CreateContact\DTOs;

// É um DTO para carregar os dados de saída do caso de uso.
final class CreateContactResponseModel
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email
    ) {
    }
}
