<?php

namespace App\UseCases\CreateContact\Boundaries;

// A "porta de saída" para o Presenter.
// O Interactor usará esta interface para entregar o resultado, sem conhecer a implementação.
use App\UseCases\CreateContact\DTOs\CreateContactResponseModel;

interface CreateContactOutputBoundary
{
    public function present(CreateContactResponseModel $responseModel): CreateContactResponseModel;
}
