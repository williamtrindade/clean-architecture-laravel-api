<?php

namespace App\UseCases\FindContact;

use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\FindContact\Boundaries\FindContactInputBoundary;
use App\UseCases\FindContact\Boundaries\FindContactOutputBoundary;
use App\UseCases\FindContact\DTOs\FindContactResponseModel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final readonly class FindContactInteractor implements FindContactInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
        private FindContactOutputBoundary $presenter
    ) {
    }

    public function find(int $id): FindContactResponseModel
    {
        $contact = $this->contactRepository->findById($id);

        if (!$contact) {
            throw new NotFoundHttpException('Contato não encontrado.');
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
