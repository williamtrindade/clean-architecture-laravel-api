<?php

namespace App\UseCases\ListContacts\DTOs;

final readonly class ListContactsResponseModel
{
    public function __construct(
        public int $id,
        public string $name,
        public string $phoneNumber,
        public string $email
    ) {
    }
}
