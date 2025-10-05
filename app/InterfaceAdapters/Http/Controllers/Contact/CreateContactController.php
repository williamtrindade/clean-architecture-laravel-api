<?php

namespace App\InterfaceAdapters\Http\Controllers\Contact;

use App\InterfaceAdapters\Http\Controllers\Controller;
use App\InterfaceAdapters\Presenters\Api\CreateContactApiPresenter;
use App\UseCases\CreateContact\Boundaries\CreateContactInputBoundary;
use App\UseCases\CreateContact\DTOs\CreateContactRequestModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateContactController extends Controller
{
    public function __construct(
        private readonly CreateContactInputBoundary $interactor,
        private readonly CreateContactApiPresenter $presenter
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $requestModel = new CreateContactRequestModel(
            name: $request->get('name'),
            phoneNumber: $request->get('phone_number'),
            email: $request->get('email')
        );

        $this->interactor->create($requestModel);
        $viewModel = $this->presenter->getViewModel();

        return response()->json($viewModel, ResponseAlias::HTTP_CREATED);
    }
}
