<?php

namespace App\UseCases\CreateContact;

use App\Entities\Contact;
use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\CreateContact\Boundaries\CreateContactInputBoundary;
use App\UseCases\CreateContact\Boundaries\CreateContactOutputBoundary;
use App\UseCases\CreateContact\DTOs\CreateContactRequestModel;
use App\UseCases\CreateContact\DTOs\CreateContactResponseModel;
use InvalidArgumentException;

final readonly class CreateContactInteractor implements CreateContactInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
        private CreateContactOutputBoundary $presenter
    ) {
    }

    public function create(CreateContactRequestModel $requestModel): CreateContactResponseModel
    {
        // 1. Verifica se o contato já existe (regra da aplicação)
        if ($this->contactRepository->existsByEmail($requestModel->email)) {
            throw new InvalidArgumentException('O e-mail informado já está em uso.');
        }

        // 2. Cria a entidade, que valida as regras de negócio intrínsecas
        $contact = new Contact(
            id: null,
            name: $requestModel->name,
            phoneNumber: $requestModel->phoneNumber,
            email: $requestModel->email
        );

        // 3. Persiste a entidade através da interface do repositório
        $savedContact = $this->contactRepository->save($contact);

        // 4. Prepara o DTO de resposta
        $responseModel = new CreateContactResponseModel(
            id: 1000,
            name: $savedContact->getName(),
            email: $savedContact->getEmail(),
            phoneNumber: $savedContact->getPhoneNumber()
        );

        // 5. Entrega o DTO de resposta para o Presenter através da interface de saída
        return $this->presenter->present($responseModel);
    }
}
