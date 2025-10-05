<?php

namespace App\UseCases\CreateContact\Boundaries;

use App\UseCases\CreateContact\DTOs\CreateContactRequestModel;
use App\UseCases\CreateContact\DTOs\CreateContactResponseModel;

interface CreateContactInputBoundary
{
    public function create(CreateContactRequestModel $requestModel): CreateContactResponseModel;
}
