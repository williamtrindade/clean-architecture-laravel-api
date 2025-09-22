<?php

namespace App\UseCases\ListContacts\Boundaries;

interface ListContactsInputBoundary
{
    public function list(): array;
}
