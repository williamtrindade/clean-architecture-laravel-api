<?php

namespace App\InterfaceAdapters\Presenters\Api;

use App\InterfaceAdapters\ViewModels\ContactViewModel;
use App\UseCases\UpdateContact\Boundaries\UpdateContactOutputBoundary;
use App\UseCases\UpdateContact\DTOs\UpdateContactResponseModel;

class UpdateContactApiPresenter implements UpdateContactOutputBoundary
{
    private ContactViewModel $viewModel;

    public function present(UpdateContactResponseModel $responseModel): void
    {
        $this->viewModel = new ContactViewModel(
            id: $responseModel->id,
            name: $responseModel->name,
            phoneNumber: $responseModel->phoneNumber,
            email: $responseModel->email
        );
    }

    public function getViewModel(): ContactViewModel
    {
        return $this->viewModel;
    }
}
