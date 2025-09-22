<?php

namespace App\UseCases\CreateContact\Boundaries;

// A "porta de entrada" para o caso de uso.
// O Controller dependerá desta interface para invocar a lógica de negócio.
use App\UseCases\CreateContact\DTOs\CreateContactRequestModel;
use App\UseCases\CreateContact\DTOs\CreateContactResponseModel;

interface CreateContactInputBoundary
{
    public function create(CreateContactRequestModel $requestModel): CreateContactResponseModel;
}
