<?php

namespace App\InterfaceAdapters\Presenters\Api;

use App\InterfaceAdapters\ViewModels\ContactViewModel;
use App\UseCases\FindContact\Boundaries\FindContactOutputBoundary;
use App\UseCases\FindContact\DTOs\FindContactResponseModel;

class FindContactApiPresenter implements FindContactOutputBoundary
{
    private ContactViewModel $viewModel;

    public function present(FindContactResponseModel $responseModel): FindContactResponseModel
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
