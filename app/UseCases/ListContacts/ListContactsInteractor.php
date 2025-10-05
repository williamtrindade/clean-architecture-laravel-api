<?php

namespace App\UseCases\ListContacts;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\ListContacts\Boundaries\ListContactsInputBoundary;
use App\UseCases\ListContacts\Boundaries\ListContactsOutputBoundary;
use App\UseCases\ListContacts\DTOs\ListContactsResponseModel;

final readonly class ListContactsInteractor implements ListContactsInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
        private ListContactsOutputBoundary $presenter
    ) {
    }

    /**
     * @return array<int, ListContactsResponseModel>
     */
    public function list(): array
    {
        // 1. Pega o array de Entidades do repositorio
        $contactEntities = $this->contactRepository->findAll();

        // 2. Mapeia cada Entidade para o seu DTO de Resposta
        $responseModels = [];
        foreach ($contactEntities as $entity) {
            $responseModels[] = new ListContactsResponseModel(
                id:          $entity->getId(),
                name:        $entity->getName(),
                phoneNumber: $entity->getPhoneNumber(),
                email:       $entity->getEmail()
            );
        }

        // 3. Entregamos ao presenter que seta o ViewModel
        return $this->presenter->present($responseModels);
    }
}
