<?php

namespace App\UseCases\ListContacts\Boundaries;

interface ListContactsOutputBoundary
{
    public function present(array $responseModels): array;
}
