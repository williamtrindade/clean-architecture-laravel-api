<?php

namespace App\UseCases\DeleteContact;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\DeleteContact\Boundaries\DeleteContactInputBoundary;
use App\UseCases\Exceptions\ResourceNotFoundException;

final readonly class DeleteContactInteractor implements DeleteContactInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository
    ) {
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function delete(int $id): void
    {
        $contact = $this->contactRepository->findById($id);

        if (!$contact) {
            throw new ResourceNotFoundException('Contato nao encontrado para exclusao.');
        }

        $this->contactRepository->delete($id);
    }
}
