<?php

namespace App\UseCases\FindContact;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\Exceptions\ResourceNotFoundException;
use App\UseCases\FindContact\Boundaries\FindContactInputBoundary;
use App\UseCases\FindContact\Boundaries\FindContactOutputBoundary;
use App\UseCases\FindContact\DTOs\FindContactResponseModel;

final readonly class FindContactInteractor implements FindContactInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
        private FindContactOutputBoundary $presenter
    ) {
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function find(int $id): FindContactResponseModel
    {
        $contact = $this->contactRepository->findById($id);

        if (!$contact) {
            throw new ResourceNotFoundException('Contato nao encontrado.');
        }

        // Criamos o DTO de resposta
        $responseModel = new FindContactResponseModel(
            id: $contact->getId(),
            name: $contact->getName(),
            phoneNumber: $contact->getPhoneNumber(),
            email: $contact->getEmail()
        );

        // Entregamos ao presenter para setar o ViewModel
        return $this->presenter->present($responseModel);
    }
}
