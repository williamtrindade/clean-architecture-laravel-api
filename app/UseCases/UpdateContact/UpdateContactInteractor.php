<?php

namespace App\UseCases\UpdateContact;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\Exceptions\ResourceNotFoundException;
use App\UseCases\UpdateContact\Boundaries\UpdateContactInputBoundary;
use App\UseCases\UpdateContact\DTOs\UpdateContactRequestModel;

final readonly class UpdateContactInteractor implements UpdateContactInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository
    ) {
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function update(UpdateContactRequestModel $requestModel): array
    {
        $contact = $this->contactRepository->findById($requestModel->id);

        if (!$contact) {
            throw new ResourceNotFoundException('Contato não encontrado para atualizacao.');
        }

        // Usa os setters da Entidade para aplicar as validações
        $contact->setName($requestModel->name);
        $contact->setPhoneNumber($requestModel->phoneNumber);
        $contact->setEmail($requestModel->email);

        $updatedContact = $this->contactRepository->update($contact);

        return [
            'id' => $updatedContact->getId(),
            'name' => $updatedContact->getName(),
            'email' => $updatedContact->getEmail(),
        ];
    }
}
