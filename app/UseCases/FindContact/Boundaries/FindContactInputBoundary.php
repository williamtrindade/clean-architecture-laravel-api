<?php

namespace App\UseCases\FindContact\Boundaries;

use App\UseCases\FindContact\DTOs\FindContactResponseModel;

interface FindContactInputBoundary
{
    // O tipo de retorno agora é o DTO
    public function find(int $id): FindContactResponseModel;
}
