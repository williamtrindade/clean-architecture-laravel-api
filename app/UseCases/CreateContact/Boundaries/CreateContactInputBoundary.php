<?php

namespace App\UseCases\CreateContact\Boundaries;

use App\UseCases\CreateContact\DTOs\CreateContactRequestModel;

interface CreateContactInputBoundary
{
    public function create(CreateContactRequestModel $requestModel): void;
}
