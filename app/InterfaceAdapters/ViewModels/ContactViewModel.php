<?php

namespace App\InterfaceAdapters\ViewModels;

final class ContactViewModel
{
    public function __construct(
        public int $id,
        public string $name,
        public string $phoneNumber,
        public string $email
    ) {
    }
}
