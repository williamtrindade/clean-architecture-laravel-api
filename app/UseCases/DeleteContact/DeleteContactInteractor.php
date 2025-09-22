<?php

namespace App\UseCases\DeleteContact;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\DeleteContact\Boundaries\DeleteContactInputBoundary;
use DomainException;

final class DeleteContactInteractor implements DeleteContactInputBoundary
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository
    ) {
    }

    public function delete(int $id): bool
    {
        $contact = $this->contactRepository->findById($id);

        if (!$contact) {
            throw new DomainException('Contato não encontrado para exclusão.');
        }

        return $this->contactRepository->delete($id);
    }
}
