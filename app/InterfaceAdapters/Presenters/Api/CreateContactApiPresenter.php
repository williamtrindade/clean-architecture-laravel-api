<?php

namespace App\InterfaceAdapters\Presenters\Api;

use App\InterfaceAdapters\ViewModels\ContactViewModel;
use App\UseCases\CreateContact\Boundaries\CreateContactOutputBoundary;
use App\UseCases\CreateContact\DTOs\CreateContactResponseModel;

class CreateContactApiPresenter implements CreateContactOutputBoundary
{
    private ContactViewModel $viewModel;

    public function present(CreateContactResponseModel $responseModel): CreateContactResponseModel
    {
        $this->viewModel = new ContactViewModel(
            id: $responseModel->id,
            name: $responseModel->name,
            phoneNumber: $responseModel->phoneNumber,
            email: $responseModel->email
        );
        return $responseModel;
    }

    public function getViewModel(): ContactViewModel
    {
        return $this->viewModel;
    }
}
