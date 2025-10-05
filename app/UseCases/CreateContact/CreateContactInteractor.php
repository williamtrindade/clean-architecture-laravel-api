<?php

namespace App\UseCases\CreateContact;

use App\Entities\Contact;
use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\CreateContact\Boundaries\CreateContactInputBoundary;
use App\UseCases\CreateContact\Boundaries\CreateContactOutputBoundary;
use App\UseCases\CreateContact\DTOs\CreateContactRequestModel;
use App\UseCases\CreateContact\DTOs\CreateContactResponseModel;
use App\UseCases\Exceptions\BusinessRuleException;

final readonly class CreateContactInteractor implements CreateContactInputBoundary
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
        private CreateContactOutputBoundary $presenter
    ) {
    }

    /**
     * @throws BusinessRuleException
     */
    public function create(CreateContactRequestModel $requestModel): CreateContactResponseModel
    {
        // 1. Verifica se o contato ja existe (regra da aplicacao)
        if ($this->contactRepository->existsByEmail($requestModel->email)) {
            throw new BusinessRuleException('O e-mail informado ja esta em uso.');
        }

        // 2. Cria a entidade, que valida as regras de negocio intrinsecas
        $contact = new Contact(
            id: null,
            name: $requestModel->name,
            phoneNumber: $requestModel->phoneNumber,
            email: $requestModel->email
        );

        // 3. Persiste a entidade atraves da interface do repositorio
        $savedContact = $this->contactRepository->save($contact);

        // 4. Prepara o DTO de resposta
        $responseModel = new CreateContactResponseModel(
            id:          $savedContact->getId(),
            name:        $savedContact->getName(),
            email:       $savedContact->getEmail(),
            phoneNumber: $savedContact->getPhoneNumber()
        );

        // 5. Entrega o DTO de resposta para o Presenter atraves da interface de saida
        return $this->presenter->present($responseModel);
    }
}
