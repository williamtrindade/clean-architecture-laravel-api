<?php

namespace App\UseCases\UpdateContact\Boundaries;

use App\UseCases\UpdateContact\DTOs\UpdateContactResponseModel;

interface UpdateContactOutputBoundary
{
    public function present(UpdateContactResponseModel $responseModel): void;
}
