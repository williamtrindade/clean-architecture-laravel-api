<?php

namespace App\UseCases\ListContacts;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\ListContacts\Boundaries\ListContactsInputBoundary;

final class ListContactsInteractor implements ListContactsInputBoundary
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository
    ) {
    }

    public function list(): array
    {
        return $this->contactRepository->findAll();
    }
}
