<?php

namespace App\UseCases\ListContacts\Boundaries;

use App\UseCases\ListContacts\DTOs\ListContactsResponseModel;

interface ListContactsInputBoundary
{
    public function list(): void;
}
