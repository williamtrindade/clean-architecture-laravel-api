<?php

namespace App\UseCases\FindContact\Boundaries;

interface FindContactInputBoundary
{
    public function find(int $id): void;
}
