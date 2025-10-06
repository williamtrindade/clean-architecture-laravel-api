<?php

namespace App\UseCases\DeleteContact\Boundaries;

interface DeleteContactInputBoundary
{
    public function delete(int $id): void;
}
