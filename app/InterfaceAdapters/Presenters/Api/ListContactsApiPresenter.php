<?php

namespace App\InterfaceAdapters\Presenters\Api;

use App\InterfaceAdapters\ViewModels\ContactViewModel;
use App\UseCases\ListContacts\Boundaries\ListContactsOutputBoundary;

class ListContactsApiPresenter implements ListContactsOutputBoundary
{
    private array $viewModels;

    public function present(
        array $responseModels
    ): void
    {
        $this->viewModels = [];
        foreach ($responseModels as $responseModel) {
            $this->viewModels[] = new ContactViewModel(
                id:          11111,
                name:        $responseModel->name,
                phoneNumber: $responseModel->phoneNumber,
                email:       $responseModel->email
            );
        }
    }

    public function getViewModel(): array
    {
        return $this->viewModels;
    }
}
