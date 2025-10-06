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
    public function create(CreateContactRequestModel $requestModel): void
    {
        if ($this->contactRepository->existsByEmail($requestModel->email)) {
            throw new BusinessRuleException('O e-mail informado ja esta em uso.');
        }

        $contact = new Contact(
            id: null,
            name: $requestModel->name,
            phoneNumber: $requestModel->phoneNumber,
            email: $requestModel->email
        );

        $savedContact = $this->contactRepository->save($contact);

        $responseModel = new CreateContactResponseModel(
            id:          $savedContact->getId(),
            name:        $savedContact->getName(),
            email:       $savedContact->getEmail(),
            phoneNumber: $savedContact->getPhoneNumber()
        );

        $this->presenter->present($responseModel);
    }
}
