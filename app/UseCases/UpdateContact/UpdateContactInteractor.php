<?php

namespace App\UseCases\UpdateContact;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\Exceptions\ResourceNotFoundException;
use App\UseCases\UpdateContact\Boundaries\UpdateContactInputBoundary;
use App\UseCases\UpdateContact\Boundaries\UpdateContactOutputBoundary;
use App\UseCases\UpdateContact\DTOs\UpdateContactRequestModel;
use App\UseCases\UpdateContact\DTOs\UpdateContactResponseModel;

final readonly class UpdateContactInteractor implements UpdateContactInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
        private UpdateContactOutputBoundary $presenter
    ) {
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function update(UpdateContactRequestModel $requestModel): void
    {
        $contact = $this->contactRepository->findById($requestModel->id);

        if (!$contact) {
            throw new ResourceNotFoundException(
                'Contato não encontrado para atualizacao.'
            );
        }

        // Usa os setters da Entidade para aplicar as validações
        $contact->setName($requestModel->name);
        $contact->setPhoneNumber($requestModel->phoneNumber);
        $contact->setEmail($requestModel->email);

        $updatedContact = $this->contactRepository->update($contact);

        $responseModel = new UpdateContactResponseModel(
            id:          $updatedContact->getId(),
            name:        $updatedContact->getName(),
            email:       $updatedContact->getEmail(),
            phoneNumber: $updatedContact->getPhoneNumber()
        );

        $this->presenter->present($responseModel);
    }
}
