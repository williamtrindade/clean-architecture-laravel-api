<?php

namespace App\UseCases\FindContact\Boundaries;

use App\UseCases\FindContact\DTOs\FindContactResponseModel;

interface FindContactOutputBoundary
{
    public function present(FindContactResponseModel $responseModel): FindContactResponseModel;
}
