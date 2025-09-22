<?php

namespace App\UseCases\FindContact;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\FindContact\Boundaries\FindContactInputBoundary;
use App\UseCases\FindContact\Boundaries\FindContactOutputBoundary;
use App\UseCases\FindContact\DTOs\FindContactResponseModel;
use DomainException;

final class FindContactInteractor implements FindContactInputBoundary
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository,
        private readonly FindContactOutputBoundary $presenter // Injetamos o presenter
    ) {
    }

    // A assinatura do método agora retorna o ResponseModel
    public function find(int $id): FindContactResponseModel
    {
        $contact = $this->contactRepository->findById($id);

        if (!$contact) {
            throw new DomainException('Contato não encontrado.');
        }

        // Criamos o DTO de resposta
        $responseModel = new FindContactResponseModel(
            id: $contact->getId(),
            name: $contact->getName(),
            phoneNumber: $contact->getPhoneNumber(),
            email: $contact->getEmail()
        );

        // Entregamos ao presenter e retornamos o resultado formatado
        return $this->presenter->present($responseModel);
    }
}
