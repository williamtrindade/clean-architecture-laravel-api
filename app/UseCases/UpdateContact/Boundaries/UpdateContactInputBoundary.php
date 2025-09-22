<?php

namespace App\UseCases\UpdateContact\Boundaries;

use App\UseCases\UpdateContact\DTOs\UpdateContactRequestModel;

interface UpdateContactInputBoundary
{
    public function update(UpdateContactRequestModel $requestModel): array;
}
