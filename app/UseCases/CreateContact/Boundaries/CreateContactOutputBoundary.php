<?php

namespace App\UseCases\CreateContact\Boundaries;

use App\UseCases\CreateContact\DTOs\CreateContactResponseModel;

interface CreateContactOutputBoundary
{
    public function present(CreateContactResponseModel $responseModel): void;
}
