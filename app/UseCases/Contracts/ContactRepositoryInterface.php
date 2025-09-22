<?php

namespace App\UseCases\Contracts;

use App\Entities\Contact;

interface ContactRepositoryInterface
{
    public function existsByEmail(string $email): bool;
    public function findById(int $id): ?Contact;
    public function findAll(): array;
    public function save(Contact $contact): Contact;
    public function update(Contact $contact): Contact;
    public function delete(int $id): bool;
}
